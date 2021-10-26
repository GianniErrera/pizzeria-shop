<section>
    <div class="container">
        <div class="d-flex justify-content-center">
            <span>
                <h1>Thank you for your order!</h1>
            </span>
        </div>
        <br>
        <hr>
        <div class="m-4">
            <div>
                <h2>Thank you for shopping from us, {{ $order->customer_name }} {{ $order->customer_surname }}!</h2>
            </div>
        </div>
        </div>
            <div class="m-4">
                <h4>
                    You paid €{{ $order->totalPrice() }}
                </h4>
                <br>
                <h5>
                    Your order will be delivered to:
                    <br>
                    {{ $order->customer_name }} {{ $order->customer_surname }}
                    <br>
                    {{ $order->address_line_1 }}

                    @if($order->address_line_2)
                        {{ $order->address_line_2 }}
                    @endif
                    <br>
                    {{ $order->city}}
                    <br>
                    @if($order->address_line_2)
                        {{ $order->address_line_2 }}
                    @endif

                </h5>
            </div>
            <div class="d-flex justify-content-center">
                <h2>We are looking forward to seeing you again!</h2>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section">
    <div class="container-fluid " id="cart">
        <h5>
            Down below there are the details of your order:
        </h5>
        <!-- Orderlines list -->
        @foreach ($order->orderlines as $orderline)
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

            </div>

        @endforeach

        <div class ="d-flex justify-content-between my-2">
            <div class="col">
                <h1>Total</h1>
            </div>
            <div class="col">
            </div>
            <div class="col">

                <h3>€{{$order->totalPrice()}}</h3>

            </div>
        </div>
    </div>

</section>



