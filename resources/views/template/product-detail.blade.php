@extends('layouts.public')

@section('content')
    @livewire('add-to-cart', ['product' => $product])
@endsection

