<?php

namespace App\Http\Controllers;

use App\Http\Requests\Supplier\{
    CreateSupplierRequest,
    DetachProductRequest,
    UpdateSupplierRequest
};
use App\Models\Supplier;
use App\Services\SupplierService;
use Exception;

class SupplierController extends Controller
{
    private SupplierService $supplierService;

    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function get() {
        try {
            $suppliers = $this->supplierService->getSupplier();

            return response()->json([
                'suppliers' => $suppliers
            ], 200);

        }catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function getCurrentUser(Supplier $supplier) {
        try {
            return response()->json([
                'supplier' => $supplier->with('products')->find($supplier->id)
            ], 200);

        }catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function detachProduct(DetachProductRequest $request) {
        try {
            $data = $request->validated();

            $this->supplierService->detachProduct($data);

            return response()->json([
                'message' => 'Supplier created successfully',
                'status' => '200',
            ]);

        }catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function update(Supplier $supplier, UpdateSupplierRequest $request) {
        try {
            $data = $request->validated();
            $this->supplierService->updateSupplier($supplier, $data);

            return response()->json([
                'message' => 'Supplier updated successfully',
                'status' => '200',
            ]);

        }catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function delete(Supplier $supplier) {
        try {
            $this->supplierService->deleteSupplier($supplier);

            return response()->json([
                'message' => 'Supplier deleted successfully',
                'status' => '200',
            ]);

        }catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }
}
