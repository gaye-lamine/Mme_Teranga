<?php

namespace App\UseCases;

use App\Models\Product;

class UpdateProductUseCase
{
    public function execute(array $data, string $id)
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }
}
