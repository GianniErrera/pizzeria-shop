@extends('layouts.public-without-navbar-inline')

@section('content')
    <x-confirmation-email  :order="$order" />
@endsection
