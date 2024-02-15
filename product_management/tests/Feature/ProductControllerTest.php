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

    public function test_store_method_product()
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

    public function test_index_method_products()
    {
        $response = $this->getJson("api/product");
        $response->assertStatus(200)
            ->assertJson(
                [
                    'status' => 'success'
                ]
            );
    }

    public function test_show_method_product()
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

public function test_delete_method_removes_product()
{
    $product = Product::create([
        'title' => 'Produit à supprimer',
        'description' => 'Description du produit à supprimer',
        'price' => 1000,
        'quantity' => 5
    ]);

    $response = $this->deleteJson('/api/product/'.$product->id);

    $response->assertStatus(202)
             ->assertJson([
                 'status' => 'success'
             ]);
    $this->assertDatabaseMissing('products', [
        'id' => $product->id
    ]);
}

public function test_update_method_updates_product()
{
    $product = Product::create([
        'title' => 'Produit à mettre à jour',
        'description' => 'Description du produit à mettre à jour',
        'price' => 1000,
        'quantity' => 5
    ]);

    $newData = [
        'title' => 'Nouveau titre',
        'description' => 'Nouvelle description',
        'price' => 1500,
        'quantity' => 10
    ];

    $response = $this->patchJson('/api/product/' . $product->id, $newData);
    $response->assertStatus(202)
             ->assertJson([
                 'status' => 'success'
             ]);
    $this->assertDatabaseHas('products', $newData);
}


}
