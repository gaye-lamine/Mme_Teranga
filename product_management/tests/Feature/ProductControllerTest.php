<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function test_store_method_adds_new_product()
    {
        $productData = [
            'title' => 'title 1',
            'description' => 'description 1',
            'price' => 1200,
            'quantity' => 1
        ];

        $response = $this->postJson('api/product', $productData);
        $response->assertStatus(201)
            ->assertJson([
                'status' => 'success'
            ]);

        $this->assertDatabaseHas('products', [
            'title' => 'title 1',
            'description' => 'description 1',
            'price' => 1200,
            'quantity' => 1
        ]);
    }

    public function test_index_method_get_all_products()
    {
        $response = $this->getJson("api/product");
        $response->assertStatus(200)
            ->assertJson(
                [
                    'status' => 'success'
                ]
            );
    }

    public function test_show_method_show_product()
{
    $product = Product::create([
        'title' => 'title 1',
        'description' => 'description 1',
        'price' => 1200,
        'quantity' => 1
    ]);

    $response = $this->getJson('/api/product/' . $product->id, []);

    $response->assertStatus(200)
             ->assertJson([
                 'status' => 'success'
             ]);

    $response->assertJsonFragment([
        'title' => 'title 1',
        'description' => 'description 1',
        'price' => 1200,
        'quantity' => 1
    ]);
}

}
