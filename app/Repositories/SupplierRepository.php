<?php

namespace App\Repositories;

use App\Models\Supplier;
use App\Models\User;
use App\Repositories\Interfaces\InterfacesUserRepository;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SupplierRepository
{
    public function getSupplier() {
        $supplier = Supplier::with('products')->get();
        return $supplier;
    }

    public function createSupplier(array $data) {
        $supplier = Supplier::create($data);

        if (!$supplier) {
            return false;
        }

        return $supplier;
    }

    public function updateSupplier(Supplier $supplier , array $data) {
        if (!isset($supplier->id)) {
            return false;
        }

        if (isset($data['products'])) {
            $supplier->products()->sync($data['products']);
        }
        $supplier->update($data);

        return true;
    }

    public function deleteSupplier(Supplier $supplier) {
        $supplier->products()->detach();
        $supplier->delete();
        return true;
    }
}
