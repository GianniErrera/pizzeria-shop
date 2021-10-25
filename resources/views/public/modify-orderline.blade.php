@extends('layouts.public')

@section('content')
    @livewire('modify-orderline', [
        'orderline' => $orderline,
        'extralines' => $extralines,
        'extras' => $extras
    ])
@endsection








