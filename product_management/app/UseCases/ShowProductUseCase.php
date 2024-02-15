<?php
namespace App\UseCases;

use App\Models\Product;

class ShowProductUseCase{

    public function execute(string $id)
    {
        return Product::where('id', $id)->first();
    }

}