<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\UseCases\CreateProductUseCase;
use App\UseCases\DeleteProductUseCase;
use App\UseCases\GetAllProductsUseCases;
use App\UseCases\ShowProductUseCase;
use App\UseCases\UpdateProductUseCase;
use App\Utils\ApiResponse;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetAllProductsUseCases $getAllProductsUseCases)
    {
        $products = $getAllProductsUseCases->execute();
        return ApiResponse::success($products,"list products",200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request, CreateProductUseCase $createProductUseCase)
    {
        $productsData = $request->validated();
        $product = $createProductUseCase->execute($productsData);
        return ApiResponse::success($product, 'Product created successfully',201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id,ShowProductUseCase $showProductUseCase)
    {
        $product = $showProductUseCase->execute($id);
       if (empty($product)) {
         return ApiResponse::error(null,"Product not found",404);
       }

        return ApiResponse::success($product, 'the product',200);
        


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id, UpdateProductUseCase $updateTodoUseCase)
    {
        $todoData = $request->validated(); 
        $updatedTodo = $updateTodoUseCase->execute($todoData,$id);

        if ($updatedTodo) {
            return ApiResponse::success($updatedTodo, 'Product updated successfully',202);
        } else {
            return ApiResponse::error(null,'Product not found',404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id,DeleteProductUseCase $deleteProductUseCase)
    {
        $product = $deleteProductUseCase->execute($id);
        return $product;

        
    }
}
