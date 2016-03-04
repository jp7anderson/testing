<?php

use App\Team;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TeamTest extends TestCase
{
    /**
     *  Testes do Model Team - interação com Time e Usuario
     *  Verificar o nome do time, verificar se o time consegue salvar um usuario
     *  Verificar o maximo de usuarios que o time pode salvar
     *  Verificar se salva multiplos usuarios por collection
     */

    use DatabaseTransactions;

    /**
     * @test.
     *
     */
    public function a_team_has_a_name()
    {
        $team = new Team(['name' => 'Acme']);
        $this->assertEquals('Acme', $team->name);
    }

    /**
     * @test.
     *
     */
    public function a_team_can_add_members()
    {
        $team = factory(Team::class)->create();

        $user = factory(User::class)->create();
        $userTwo = factory(User::class)->create();

        $team->add($user);
        $team->add($userTwo);

        $this->assertEquals(2, $team->count());
    }

    /**
     * @test.
     *
     */
    public function a_team_has_a_maximum_size()
    {
        $team = factory(Team::class)->create(['size' => 2]);

        $userOne = factory(User::class)->create();
        $userTwo = factory(User::class)->create();

        $team->add($userOne);
        $team->add($userTwo);

        $this->assertEquals(2, $team->count());

        $this->setExpectedException('Exception');

        $userThree = factory(User::class)->create();
        $team->add($userThree);
    }

    /**
     * @test.
     *
     */
    public function a_team_can_add_multiple_members_at_once()
    {
        $team = factory(Team::class)->create();

        $users = factory(User::class, 2)->create();

        $team->add($users);

        $this->assertEquals(2, $team->count());
    }
}
