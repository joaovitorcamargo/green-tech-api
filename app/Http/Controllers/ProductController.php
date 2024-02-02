<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\{
    CreateProductRequest,
    UpdateProductRequest
};
use App\Models\Product;
use App\Services\ProductService;
use Exception;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function get() {
        try {
            $products = $this->productService->getProducts();

            return response()->json([
                'products' => $products
            ], 200);

        }catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function create(CreateProductRequest $request) {
        try {
            $data = $request->validated();

            $this->productService->createProduct($data);

            return response()->json([
                'message' => 'Product created successfully',
                'status' => '200',
            ]);

        }catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function update(Product $product, UpdateProductRequest $request) {
        try {
            $data = $request->validated();
            $this->productService->updateProduct($product, $data);

            return response()->json([
                'message' => 'Product updated successfully',
                'status' => '200',
            ]);

        }catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function delete(Product $product) {
        try {
            $this->productService->deleteProduct($product);

            return response()->json([
                'message' => 'Product deleted successfully',
                'status' => '200',
            ]);

        }catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }
}
