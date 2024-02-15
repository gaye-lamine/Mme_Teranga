<?php

namespace App\UseCases;

use App\Models\Product;

class CreateProductUseCase{
    public function execute(array $products)
    {
        return Product::create($products);
    }
}