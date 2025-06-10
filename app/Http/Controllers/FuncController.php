<?php

namespace App\Http\Controllers;

use App\Models\MaterialType;
use App\Models\ProductType;
use Illuminate\Http\Request;

class FuncController extends Controller
{
    //Метод из 4 задания
    public function method(ProductType $productType, MaterialType $materialType, int $quantity, float $param1, float $param2, float $quantity_storage) {
        try {
            $need = ceil($param1 * $param2 * $productType->coefficient * $quantity / (1 + $materialType->defect));
            $total = $need - $quantity_storage;
            return $total;
        } catch (\Exception $e) {
            return -1;
        }
    }

}
