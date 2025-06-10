@extends('layouts.layout')
@section('title', 'Редактирование продукта')

@section('content')
    <a class="btn" href="{{ route('products.index') }}">Назад</a>

    <h1>Редактирование продукта: {{$product->name}}</h1>
    <form method="POST" class="form" action="{{ route('products.update', $product->id) }}" enctype="application/x-www-form-urlencoded">
        <div>

        @csrf
        @if($errors->any())
            <script>
                alert("Ошибка валидации. Изучите ошибки и исправьте данные.")
            </script>
        @endif
            <label>Артикул</label>
            <input type="text" name="article" value="{{$product->article}}" required>
            @error('article')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Тип</label>
            <select name="product_type_id" required>
                @foreach($productTypes as $productType)
                    <option value="{{ $productType->id }}" @if($productType->id === $product->productType->id) selected @endif>{{ $productType->name }}</option>
                @endforeach
            </select>
            @error('product_type_id')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Наименование продукта</label>
            <input type="text" name="name" value="{{$product->name}}" required>
            @error('name')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Минимальная стоимость для партнера (р)</label>
            <input type="number" name="min_price" min="0.01" step="0.01" max="100000000.00" value="{{$product->min_price}}" required>
            @error('min_price')
            <p class="warning">{{ $message }}</p>
            @enderror
            <label>Ширина (м)</label>
            <input type="number" name="width" min="0.01" step="0.01" max="1000.00" value="{{$product->width}}" required>
            @error('width')
            <p class="warning">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn">Редактировать</button>
    </form>
@endsection
