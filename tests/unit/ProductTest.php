<?php

use App\Product;

class ProductTest extends PHPUnit_Framework_TestCase
{
    /**
     * Teste basico unitario para checar nome e custo do produto.
     *
     * @return void
     */

    protected $product;

    public function setUp()
    {
        $this->product = new Product('Fallout 4', 59);
    }

    /**
     * @test
     *
     * @return void
     */
    public function a_product_has_name()
    {
        $this->assertEquals('Fallout 4', $this->product->name());
    }

    /**
     * @test
     *
     * @return void
     */
    public function a_product_has_a_cost()
    {
        $this->assertEquals(59, $this->product->cost());
    }
}
