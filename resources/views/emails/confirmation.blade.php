@extends('layouts.public')

@section('content')
    <x-confirmation-email  :order="$order" />
@endsection
