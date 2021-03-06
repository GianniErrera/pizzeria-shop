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
            <div class="form-group">
                <div class="mb-3">
                    <label for="image" class="form-label">Product image</label>
                    <input class="form-control" type="file" name="image" id="image">
                </div>
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
                <table class="table">
                    @forelse ($categories as $category)
                    <tr>
                        <td colspan="4"><h1 class="mb-2">{{ucfirst($category->name)}}</h1></td>
                    </tr>

                            @forelse ($category->products as $product)
                                <tr>
                                        <td class="">{{ $product->name }}</td>
                                        <td> {{ $product->description ? $product->description : "no description" }}</td>
                                        <td class="number">???{{ $product->price }}
                                        </td>
                                        <td class="row">
                                                <a class="btn btn-primary mr-1" href="{{route("product.edit", ["product" => $product])}}">Edit
                                                </a>
                                            <form
                                                action="{{route('product.delete', ['product' => $product])}}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete
                                                </button>
                                            </form>
                                        </td>
                                </tr>
                            @empty
                            <tr>
                                <td colpsan="">
                                    No products found in this category
                                </td>
                            </tr>

                            @endforelse
                    @empty
                        No categories found
                    @endforelse

                    <tr>
                        <td colspan="4"><h1 class="mb-2">{{ucfirst("extra")}}</h1></td>
                    </tr>

                    @forelse ($extras as $extra)
                    <tr>
                        <td>{{ $extra->name }} </td>
                        <td> {{ $extra->description ?  $extra->description  : "" }}</td>
                        <td>???{{ $extra->price }}</td>
                        <td class="row">
                                <a class="btn btn-primary mr-1" href="{{route("extra.edit", ["extra" => $extra])}}">Edit
                                </a>
                            <form
                            action="{{route('extra.delete', ['extra' => $extra])}}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete
                            </button>
                            </form>

                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                No extras found
                            </td>
                        </tr>
                    @endforelse
                </table>
            </div>

        </div>
    </div>

@endsection
