<?php

namespace App\UseCases;

use App\Models\Product;

class GetAllProductsUseCases
{
    public function execute()
    {
        return Product::all();
    }
}
