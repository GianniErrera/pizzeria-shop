<div class="container-fluid " id="cart">
    <!-- Orderlines list -->
    @forelse ($orderlines as $orderline)
        <div class="border p-2" style="border-width:thick">
            <div class="d-fles">
                <h4>{{ucfirst($orderline->product->category->name)}}</h4>
            </div>
            <div class="d-flex justify-content-between">

                <div class="col">
                    <h4>{{ $orderline->quantity }} {{ $orderline->product->name }}</h4>
                </div>
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
                <hr>
                <div class="d-flex justify-content-between mt-2">
                    <div class="col">total</div>
                    <div class="col"></div>
                    <div class="col">
                        <h5>€ {{ $orderline->totalPrice() }}</h5>
                    </div>
                </div>
            </div>
            <!-- Buttons -->
            <div class="d-flex justify-content-end my-2">

                    <form action="/orderlines/{{$orderline->id}}">
                        <button class="btn btn-primary">Modify order</button>
                    </form>
                    <!-- Empry div used for spacing two buttons -->
                    <div class="mx-1">
                    </div>

                    <form
                        action="orderlines/{{$orderline->id}}"
                        method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger ml-1" onclick="return confirm('Are you sure?')">Cancel order</button>
                    </form>

            </div>
            <!-- End buttons -->
        </div>

    @empty

        <div class="mb-5 d-flex justify-content-center">
            <span>
                    <i>
                        <h1 style="color:#fac564" class="ml-5 heading-section span">
                            Your cart is empty
                        </h1>
                    </i>
            </span>
        </div>

    @endforelse
