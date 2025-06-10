@extends('layouts.layout')
@section('title', 'Материалы продукта')

@section('content')
    <a class="btn" href="{{ route('products.index') }}">Назад</a>
    <h1>Материалы продукта: {{ $product->name }}</h1>
    @if(count($productMaterials) != 0 )
    <table class="materials">
        <thead>
        <tr>
            <th>Наименование материала</th>
            <th>Количество</th>
        </tr>
        </thead>
        <tbody>

        @foreach($productMaterials as $productMaterial)
            <tr>
                <td>{{ $productMaterial->material->name }}</td>
                <td>{{ $productMaterial->need_quantity }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @else
        <div style="text-align: center">Нет матерьялов</div>
    @endif
@endsection
