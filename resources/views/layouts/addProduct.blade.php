@extends('layouts.main')

@section('content')

    <div class="col-lg-10 col-sm-12 m-5">
        <div class="container">
            <div class="row">
                <h3 class="text-center">Добавление нового товара</h3>
                 @if(session('success'))
                    <div class="row justify-content-center ml-2">
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                        </div>
                    </div>
                @endif
                <form action="{{ route('Product.store') }}" method="post" enctype="multipart/form-data" multiple="">
                    @csrf
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Название товара</label>
                        <input type="text" class="form-control" name="categoryName" id="categoryName" placeholder="Название товара">
                    </div>
                    <label for="brand" class="form-label">Бренд</label>
                    <select class="form-select" name="brand" aria-label=".form-select-sm example">
                        <option selected disabled>Выбрать бренд</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                        @endforeach
                    </select>
                    <div class="mb-3">
                        <label for="weight" class="form-label">Вес/количество</label>
                        <input type="text" class="form-control" name="weight" id="weight" placeholder="Вес/количество">
                    </div>
                    <label for="taste" class="form-label">Вкус</label><br />
                        @foreach($tastes as $taste)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="taste[]" id="taste{{ $taste->id }}" value="{{ $taste->id }}">
                                <label class="form-check-label" for="{{ $taste->id }}">{{ $taste->taste }}</label>
                            </div>
                            @endforeach
                    <div class="mb-3">
                        <label for="priceStore" class="form-label">Цена на складе</label>
                        <input type="number" class="form-control" name="priceStore" id="priceStore" placeholder="Цена на складе">
                    </div>
                    <div class="mb-3">
                        <label for="priceShop" class="form-label">Цена в магазине</label>
                        <input type="number" class="form-control" name="priceShop" id="priceShop" placeholder="Цена в магазине">
                    </div>
                    <div class="mb-3">
                        <label for="priceSale" class="form-label">Цена со скидкой</label>
                        <input type="number" class="form-control" name="priceSale" id="priceSale" placeholder="Цена со скидкой">
                    </div>
                    <label for="categoryNutrition" class="form-label">Категория</label>
                    <select class="form-select" name="categoryNutrition" aria-label=".form-select-sm example">
                        <option selected disabled>Выбрать категорию</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                    <label for="purpose" class="form-label">Цель</label>
                    <select class="form-select" name="purpose" aria-label=".form-select-sm example">
                        <option selected disabled>Выбрать цель</option>
                        @foreach($purposes as $purpose)
                            <option value="{{ $purpose->id }}">{{ $purpose->purpose }}</option>
                        @endforeach
                    </select>
                    <div class="mb-3">
                        <label for="description" class="form-label">Описание</label>
                        <textarea class="form-control" name="description" id="description" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="available" class="form-label">Сколько в наличии</label>
                        <input type="number" class="form-control" name="available" id="available" placeholder="В наличии...">
                    </div>
                    <div class="form-file form-file-sm mb-3">
                        <label for="pictures" class="form-label">Фотографии для описания</label>
                        <input type="file" class="form-file-input" name="pictures[]" id="pictures" multiple="multiple">
                    </div>
                    <div class="form-file form-file-sm mb-3">
                        <label for="avatar" class="form-label">Фотографии для карточки товара</label>
                        <input type="file" class="form-file-input" name="avatar" id="avatar">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-sm btn-success" type="submit">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('customJs')
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endsection