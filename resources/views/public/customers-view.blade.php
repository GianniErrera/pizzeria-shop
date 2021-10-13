@extends('layouts.guest')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div>
            <h1 class="mb-2">Pizzas</h1>
            <div class="mx-2">
                @foreach ($products as $product)
                    @if($product->category_id == "1")
                        <div class="d-flex m-2">
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-lg-{{$product->id}}">Order</button>

                            <div id="{{$product->id}}" class="modal fade modal-lg-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="m-4">
                                            @livewire('product-detail', ['product' => $product, 'extras' => $extras])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <i><h2><div class="text-xl text-decoration-none" href="{{route('product.show', ['product_id' => $product->id])}}">
                                    {{ $product->name }}
                                </div></h2></i>
                            </div>
                            <div class="ml-2 col">
                                <i><h2>€ {{ $product->price }}</h2></i>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    ...
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                </div>
            </div>
        </div>



        <hr>



        @forelse ($orderlines as $orderline)
            <div class="border">
                <div class="d-flex justify-content-between">
                    @php
                        $total_extras = 0;
                    @endphp
                    @foreach ($orderline->orderExtras as $extraLine)
                        @php
                        $total_extras += $extraLine->extra->price * $orderline->quantity;
                        @endphp
                    @endforeach

                    <div class="col">{{ $orderline->quantity}} {{ $orderline->product->name }}</div>
                    <div class="col"> € {{ $orderline->product->price }}</div>
                    <div class="col"> € {{ (int)$orderline->quantity * (float)$orderline->product->price }}
                    </div>

                </div>
                <div>
                    @foreach ($orderline->orderExtras as $extraLine)
                    <div class="d-flex justify-content-between">
                        <div class="col">-- {{ $orderline->quantity }} {{ $extraLine->extra->name }}</div>
                        <div class="col">€ {{ $extraLine->extra->price }}</div>
                        <div class="col">€ {{$extraLine->extra->price * $orderline->quantity}} </div>
                    </div>
                    @endforeach
                    <div class="d-flex justify-content-between">
                        <div class="col">total</div>
                        <div class="col"></div>
                        <div class="col">€ {{ $orderline->totalPrice() }}</div>
                    </div>
                </div>
                <div class="d-flex my-1">

                        <form action="/orderlines/{{$orderline->id}}">
                            <button class="btn btn-primary">Modify order</button>
                        </form>
                        <div class="mx-1"></div>

                        <form
                            action="orderlines/{{$orderline->id}}"
                            method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger ml-1" onclick="return confirm('Are you sure?')">Cancel order</button>
                        </form>

                </div>
            </div>

        @empty

            <div>
                <i>
                    <h2>
                        Cart is empty
                    </h2>
                </i>
            </div>

        @endforelse

        @if($orderlines)
            <div class ="d-flex justify-content-between mt-2">
                <div class="col">
                    <div class="row">
                        @if($order)
                            <form
                                action="orders/{{session('order_id')}}"
                                method="POST">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger ml-1" onclick="return confirm('Are you sure?')">Clear shopping cart</button>
                            </form>
                            <div class="mx-1"></div>
                                <a class="btn btn-primary"
                                    href="{{route('user.form', ['order' => $order->id ])}}"> <!-- user is prompted to fill in a form -->
                                    Place order
                                </a>
                            </div>
                        @endif

                </div>
                <div class="col"></div>
                <div class="col">
                    @if($order)
                        €{{$order->totalPrice()}}
                    @endif
                </div>
            </div>
        @endif


    </div>


@endsection
