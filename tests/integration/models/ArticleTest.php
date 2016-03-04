<?php

use App\Article;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ArticleTest extends TestCase
{

    /**
    * Teste Eloquent - testando salvamento e banco de dados,
    * pegando os 3 artigos mais lidos com o metodo trending(),
    * verificando o mais popular e verificando se existe apenas 3
    */

    use DatabaseTransactions;

    /**
     * @test
     *
     */
    public function it_fetches_trending_articles()
    {
        // Given
        factory(Article::class, 2)->create();
        factory(Article::class)->create(['reads' => 10]);
        $mostPopular = factory(Article::class)->create(['reads' => 20]);

        // When
        $articles = Article::trending()->get();

        // Then
        $this->assertEquals($mostPopular->id, $articles->first()->id);
        $this->assertCount(3, $articles);
    }
}
