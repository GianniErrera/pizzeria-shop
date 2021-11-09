@extends('layouts.admin')


@section('content')
    <div id="class" class="container">
        <div>
            @if (session()->has('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{route('product-extra.store')}}" enctype="multipart/form-data">
            @csrf
            @isset($product)
                <div class="form-group">
                    <label for="category_id">Product category</label>
                    <select name="category_id" class="custom-select custom-select-lg mb-2">
                        @forelse ($categories as $category)
                            <option value="{{$category->id }}" @if(old('category') == $category->id) {{"selected"}} @elseif($product->category_id == $category->id) {{"selected"}} @endif>{{ ucfirst($category->name) }}</option>
                        @endforeach
                    </select>
                </div>
            @endisset
            <div class="form-group">
                <label for="name">@isset($product){{"Product name"}}@else{{"Extra name"}}@endisset</label>
                @isset($product)
                <input type="text" class="form-control" id="name" name="name" value="@if(old('name')) {{old('name')}} @else {{$product->name}} @endif" aria-describedby="name" placeholder="Product name">
                @else<input type="text" class="form-control" id="name" name="name" value="@if(old('name')) {{old('name')}} @else {{$extra->name}} @endif" aria-describedby="name" placeholder="Extra name">
                @endisset
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                @isset($product)
                <textarea class="form-control" name="description" id="description" rows="3">@if(old('description')){{old('description')}}@else{{$product->description}}@endif</textarea>
                @else<textarea class="form-control" name="description" id="description" rows="3">@if(old('description')){{old('description')}}@else{{$extra->description}}@endif</textarea>
                @endisset
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                @isset($product)
                <input type="text" class="form-control" name="price" id="price" value="@if(old('price')) {{old('price')}} @else {{$product->price}} @endif" placeholder="Price">
                @else
                <input type="text" class="form-control" name="price" id="price" value="@if(old('price')) {{old('price')}} @else {{$extra->price}} @endif" placeholder="Price">
                @endisset
            </div>
            @isset($product)
                <div class="form-group">
                    <div class="mb-3">
                        <label for="image" class="form-label">Product image</label>
                        <input class="form-control" type="file" name="image" id="image" value="@if(old('image')) {{old('image')}} @else {{$product->image}} @endif">

                    </div>
                </div>
            @endisset
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    @isset($product)
                    <input type="checkbox" name="vegetarian" value="1"  @if(old('vegetarian') == true) {{"checked"}} @elseif($product->vegetarian) {{"checked"}} @endif}} aria-label="Vegetarian">
                    @else
                    <input type="checkbox" name="vegetarian" value="1"  @if(old('vegetarian') == true) {{"checked"}} @elseif($extra->vegetarian) {{"checked"}} @endif}} aria-label="Vegetarian">
                    @endisset
                    <span class="px-2">Vegetarian</span>
                    </div>

                </div>
                </div>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    @isset($product)
                    <input type="checkbox" name="vegan" value="1" @if(old('vegan') == true) {{"checked"}} @elseif($product->vegan) {{"checked"}} @endif }} aria-label="Vegan">
                    @else
                    <input type="checkbox" name="vegan" value="1" @if(old('vegan') == true) {{"checked"}} @elseif($extra->vegan) {{"checked"}} @endif }} aria-label="Vegan">
                    @endisset
                    <span class="px-2">Vegan</span>
                    </div>
                </div>
                </div>
                <div class="form-group">
                <label for="allergens">Allergens list</label>
                @isset($product)
                <textarea class="form-control" name="allergens" id="allergens" rows="3">@if(old('allergens')){{old('allergens')}}@else{{$product->allergens}}@endif</textarea>
                @else
                <textarea class="form-control" name="allergens" id="allergens" rows="3">@if(old('allergens')){{old('allergens')}}@else{{$extra->allergens}}@endif</textarea>
                @endisset
                </div>

            <div class="form-check">

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
