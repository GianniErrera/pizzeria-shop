@extends('layouts.public')

@section('content')
    <div class="container" id="app">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="/orderlines/{{$orderline->id}}">
            @csrf
            @method("PATCH")
            <div class="d-flex justify-content-between my-2" id="app">
                <div><h2>{{ $orderline->product->name }} - €{{ $orderline->product->price }}</h2></div>
                <div>
                <input name="quantity" value="{{ old('quantity') ? old('quantity') : $orderline->quantity }}"  type="number" min="1" max="100" class="number mx-4" type="text">
                </div>
            </div>
            <hr>
            <div>
                @foreach ($extras as $extra)
                <div class="row ml-2">
                    <div class="mr-2"><h3>{{ $extra->name }} - €{{ $extra->price }}</h3>
                    </div>
                    <input id="{{ $extra->name }}" name="extras[{{ $extra->id }}]"
                    {{ (old('extras[$extra->id]') || in_array($extra->id, $extraline)) ? "checked" : "" }} value="{{ $extra->id }}" type="checkbox">
                </div>
                @endforeach
            </div>
            <button type="submit">Update order</button>
            <button href="{{route('customers-view')}}">Cancel</button>
        </form>
    </div>
@endsection








