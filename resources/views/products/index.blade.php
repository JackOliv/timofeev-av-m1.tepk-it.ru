@extends('layouts.layout')
@section('title', 'Продукты')

@section('content')
 <a href="{{route('products.create')}}" class="btn" >Создать</a>
    @foreach($products as $product)
        <a href="{{route('products.edit', $product->id)}}" class="link-edit">
        <div class="products">
            <div>
                <div class="bigger">{{$product->productType->name}} | {{$product->name}}</div>
                <div>Артикул: {{$product->article}}</div>
                <div>Минимальная стоимость для партнера: {{$product->min_price}} (р)</div>
                <div>Ширина: {{$product->width}} (м)</div>
            </div>
            <div>
                <div class="bigger">Стоимость: {{$product->cost}} (р)</div>
            </div>
        </div>
        </a>
        <a class="btn btn-material" href="{{route('products.material', $product->id)}}">Матерьялы</a>
    @endforeach

@endsection
