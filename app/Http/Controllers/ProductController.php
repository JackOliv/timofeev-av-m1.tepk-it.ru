<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        // Рассчитываем стоимость суммируя стоимость всех используемых материалов
        $products = Product::with(['productType', 'productMaterial.material'])->get()->map(function ($product) {
                $cost = $product->productMaterial->sum(function ($productMaterial) {
                    return  $productMaterial->material->price * $productMaterial->need_quantity;
                });
                $product->cost = round($cost, 2);
                return $product;
            });

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $productTypes = ProductType::all();
        return view('products.create', compact('productTypes'));
    }

    public function store(ProductRequest $request) {
        $product = Product::create($request->validated());
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $productTypes = ProductType::all();
        return view('products.edit', compact('product', 'productTypes'));
    }

    public function update(ProductRequest $request, Product $product) {
        $product->update($request->validated());
        return redirect()->route('products.index');
    }
    public function material(Product $product) {
        $productMaterials = $product->productMaterial()->with('material')->get();
        return view('products.material',  compact('product', 'productMaterials'));
    }

}
