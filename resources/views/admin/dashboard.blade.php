@extends('layouts.admin')


@section('content')
<div id="class" class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="/menu">
        @csrf
        <div class="form-group">
            <select name="category_id" class="custom-select custom-select-lg mb-2">
                <option value="0" {{ old('category_id') == "0" ? "selected" : "" }}>Extra</option>
                @forelse ($categories as $category)
                    <option value="{{$category->id }}" {{ old('category_id') ? "selected" : "" }}>{{ ucfirst($category->name) }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Product name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" aria-describedby="name" placeholder="Product name">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3">{{old('description')}}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" name="price" id="price" value="{{old('price')}}" placeholder="Price">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                <input type="checkbox" name="vegetarian" value="1"  {{ old('vegetarian') == true ? "checked" : "" }} aria-label="Vegetarian">
                <span class="px-2">Vegetarian</span>
                </div>

            </div>
            </div>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <div class="input-group-text">
                <input type="checkbox" name="vegan" value="1" {{ old('vegan') == true ? "checked" : "" }} aria-label="Vegan">
                <span class="px-2">Vegan</span>
                </div>
            </div>
            </div>
            <div class="form-group">
            <label for="allergens">Allergens list</label>
            <textarea class="form-control" name="allergens" id="allergens" rows="3">{{old('allergens')}}</textarea>
            </div>

        <div class="form-check">

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <br>

    <div class="container mb-4">
        <div class="mb-2">
        <h1 class="mb-2">Pizzas</h1>
        @foreach ($products as $product)
            @if($product->category_id == "1")
                <div class="row flex justify-content-between">
                    <div>{{ $product->name }}</div>
                    <div class="row flex justify-content-between">
                        <div> {{ $product->description ? $product->description : "no description" }}</div>

                            <div class="mx-2">€</div>
                            <div class="number">{{ $product->price }}</div>

                    </div>
                </div>
            @endif
        @endforeach
        </div>
        <div class="mb-2">
        <h1 class="mb-2">Extras</h1>
        @foreach ($extras as $extra)
            <div class="flex justify-content-between">
            {{ $extra->name }}  {{ $extra->description ?  "- " . $extra->description  : "" }} - €{{ $extra->price }}
            </div>
        @endforeach
        </div>
    </div>
</div>

@endsection
