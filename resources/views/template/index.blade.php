@extends('layouts.public')

@section('content')
    <x-restaurant-frontend :pizzas="$pizzas" :categories="$categories" />
@endsection
