<?php
namespace App\UseCases;
use App\Models\Product;
use App\Utils\ApiResponse;

class DeleteProductUseCase
{
    public function execute($id)
    {
        $productExit  = Product::where('id', $id)->first();
        if (empty($productExit)) {

            return ApiResponse::error(null,"Product not found",404);
            
        }

        else{

            $productExit->delete();
            return ApiResponse::success($productExit,"product deleted successfully",202);
        }


    }
}
