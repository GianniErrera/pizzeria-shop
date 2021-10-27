<section style="box-sizing: border-box;-webkit-box-sizing: border-box;display: block;">
    <div class="container" style="box-sizing: border-box;-webkit-box-sizing: border-box;width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;min-width: 992px!important;">
        <div class="d-flex justify-content-center" style="box-sizing: border-box;-webkit-box-sizing: border-box;display: flex!important;-webkit-box-pack: center!important;-ms-flex-pack: center!important;justify-content: center!important;">
            <span style="box-sizing: border-box;-webkit-box-sizing: border-box;">
                <h1 style="box-sizing: border-box;-webkit-box-sizing: border-box;margin-top: 0;margin-bottom: 0.5rem;font-family: inherit;font-weight: 500;line-height: 1.2;color: inherit;font-size: 2.5rem;">Thank you for your order!</h1>
            </span>
        </div>
        <br style="box-sizing: border-box;-webkit-box-sizing: border-box;">
        <hr style="box-sizing: content-box;-webkit-box-sizing: content-box;height: 0;overflow: visible;margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 1px solid rgba(0, 0, 0, 0.1);">
        <div class="m-4" style="box-sizing: border-box;-webkit-box-sizing: border-box;margin: 1.5rem!important;">
            <div style="box-sizing: border-box;-webkit-box-sizing: border-box;">
                <h2 style="box-sizing: border-box;-webkit-box-sizing: border-box;margin-top: 0;margin-bottom: 0.5rem;font-family: inherit;font-weight: 500;line-height: 1.2;color: inherit;font-size: 2rem;orphans: 3;widows: 3;page-break-after: avoid;">Thank you for shopping from us, {{ $order->customer_name }} {{ $order->customer_surname }}!</h2>
            </div>
        </div>
        </div>
            <div class="m-4" style="box-sizing: border-box;-webkit-box-sizing: border-box;margin: 1.5rem!important;">
                <h4 style="box-sizing: border-box;-webkit-box-sizing: border-box;margin-top: 0;margin-bottom: 0.5rem;font-family: inherit;font-weight: 500;line-height: 1.2;color: inherit;font-size: 1.5rem;">
                    You paid €{{ $order->totalPrice() }}
                </h4>
                <br style="box-sizing: border-box;-webkit-box-sizing: border-box;">
                <h5 style="box-sizing: border-box;-webkit-box-sizing: border-box;margin-top: 0;margin-bottom: 0.5rem;font-family: inherit;font-weight: 500;line-height: 1.2;color: inherit;font-size: 1.25rem;">
                    Your order will be delivered to:
                    <br style="box-sizing: border-box;-webkit-box-sizing: border-box;">
                    {{ $order->customer_name }} {{ $order->customer_surname }}
                    <br style="box-sizing: border-box;-webkit-box-sizing: border-box;">
                    {{ $order->address_line_1 }}

                    @if($order->address_line_2)
                        {{ $order->address_line_2 }}
                    @endif
                    <br style="box-sizing: border-box;-webkit-box-sizing: border-box;">
                    {{ $order->city}}
                    <br style="box-sizing: border-box;-webkit-box-sizing: border-box;">
                    @if($order->address_line_2)
                        {{ $order->address_line_2 }}
                    @endif

                </h5>
            </div>
            <div class="d-flex justify-content-center" style="box-sizing: border-box;-webkit-box-sizing: border-box;display: flex!important;-webkit-box-pack: center!important;-ms-flex-pack: center!important;justify-content: center!important;">
                <h2 style="box-sizing: border-box;-webkit-box-sizing: border-box;margin-top: 0;margin-bottom: 0.5rem;font-family: inherit;font-weight: 500;line-height: 1.2;color: inherit;font-size: 2rem;orphans: 3;widows: 3;page-break-after: avoid; margin: 5rem;">We are looking forward to seeing you again!</h2>
            </div>


</section>


<section class="ftco-section" style="box-sizing: border-box;-webkit-box-sizing: border-box;display: block;">
    <div class="container-fluid " id="cart" style="box-sizing: border-box;-webkit-box-sizing: border-box;width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;">
        <h5 style="box-sizing: border-box;-webkit-box-sizing: border-box;margin-top: 0;margin-bottom: 0.5rem;font-family: inherit;font-weight: 500;line-height: 1.2;color: inherit;font-size: 1.25rem; margin-bottom: 1rem;">
            Down below there are the details of your order:
        </h5>
        <!-- Orderlines list -->
        @foreach ($order->orderlines as $orderline)
            <div class="border p-2" style="border-width: thick;box-sizing: border-box;-webkit-box-sizing: border-box;border: 1px solid #dee2e6!important;padding: .5rem!important;">
                <div class="d-fles" style="box-sizing: border-box;-webkit-box-sizing: border-box;">
                    <h4 style="box-sizing: border-box;-webkit-box-sizing: border-box;margin-top: 0;margin-bottom: 0.5rem;font-family: inherit;font-weight: 500;line-height: 1.2;color: inherit;font-size: 1.5rem;">{{ucfirst($orderline->product->category->name)}}</h4>
                </div>
                <div class="d-flex justify-content-between" style="box-sizing: border-box;-webkit-box-sizing: border-box;display: flex!important;-webkit-box-pack: justify!important;-ms-flex-pack: justify!important;justify-content: space-between!important;">

                    <div class="col" style="box-sizing: border-box;-webkit-box-sizing: border-box;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;-ms-flex-preferred-size: 0;flex-basis: 0;-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;max-width: 100%;">
                        <h4 style="box-sizing: border-box;-webkit-box-sizing: border-box;margin-top: 0;margin-bottom: 0.5rem;font-family: inherit;font-weight: 500;line-height: 1.2;color: inherit;font-size: 1.5rem;">{{ $orderline->quantity }} {{ $orderline->product->name }}</h4>
                    </div>
                    <div class="col" style="box-sizing: border-box;-webkit-box-sizing: border-box;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;-ms-flex-preferred-size: 0;flex-basis: 0;-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;max-width: 100%;"> € {{ $orderline->product->price }}</div>
                    <div class="col" style="box-sizing: border-box;-webkit-box-sizing: border-box;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;-ms-flex-preferred-size: 0;flex-basis: 0;-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;max-width: 100%;"> € {{ (int)$orderline->quantity * (float)$orderline->product->price }}
                    </div>

                </div>
                <div style="box-sizing: border-box;-webkit-box-sizing: border-box;">
                    @foreach ($orderline->orderExtras as $extraLine)
                    <div class="d-flex justify-content-between" style="box-sizing: border-box;-webkit-box-sizing: border-box;display: flex!important;-webkit-box-pack: justify!important;-ms-flex-pack: justify!important;justify-content: space-between!important;">
                        <div class="col" style="box-sizing: border-box;-webkit-box-sizing: border-box;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;-ms-flex-preferred-size: 0;flex-basis: 0;-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;max-width: 100%;">-- {{ $orderline->quantity }} {{ $extraLine->extra->name }}</div>
                        <div class="col" style="box-sizing: border-box;-webkit-box-sizing: border-box;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;-ms-flex-preferred-size: 0;flex-basis: 0;-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;max-width: 100%;">€ {{ $extraLine->extra->price }}</div>
                        <div class="col" style="box-sizing: border-box;-webkit-box-sizing: border-box;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;-ms-flex-preferred-size: 0;flex-basis: 0;-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;max-width: 100%;">€ {{$extraLine->extra->price * $orderline->quantity}} </div>
                    </div>
                    @endforeach
                    <hr style="box-sizing: content-box;-webkit-box-sizing: content-box;height: 0;overflow: visible;margin-top: 1rem;margin-bottom: 1rem;border: 0;border-top: 1px solid rgba(0, 0, 0, 0.1);">
                    <div class="d-flex justify-content-between mt-2" style="box-sizing: border-box;-webkit-box-sizing: border-box;display: flex!important;-webkit-box-pack: justify!important;-ms-flex-pack: justify!important;justify-content: space-between!important;margin-top: .5rem!important;">
                        <div class="col" style="box-sizing: border-box;-webkit-box-sizing: border-box;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;-ms-flex-preferred-size: 0;flex-basis: 0;-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;max-width: 100%;">total</div>
                        <div class="col" style="box-sizing: border-box;-webkit-box-sizing: border-box;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;-ms-flex-preferred-size: 0;flex-basis: 0;-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;max-width: 100%;"></div>
                        <div class="col" style="box-sizing: border-box;-webkit-box-sizing: border-box;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;-ms-flex-preferred-size: 0;flex-basis: 0;-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;max-width: 100%;">
                            <h5 style="box-sizing: border-box;-webkit-box-sizing: border-box;margin-top: 0;margin-bottom: 0.5rem;font-family: inherit;font-weight: 500;line-height: 1.2;color: inherit;font-size: 1.25rem;">€ {{ $orderline->totalPrice() }}</h5>
                        </div>
                    </div>
                </div>

            </div>

        @endforeach

        <div class="d-flex justify-content-between my-2" style="box-sizing: border-box;-webkit-box-sizing: border-box;display: flex!important;-webkit-box-pack: justify!important;-ms-flex-pack: justify!important;justify-content: space-between!important;margin-top: .5rem!important;margin-bottom: .5rem!important;">
            <div class="col" style="box-sizing: border-box;-webkit-box-sizing: border-box;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;-ms-flex-preferred-size: 0;flex-basis: 0;-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;max-width: 100%;">
                <h1 style="box-sizing: border-box;-webkit-box-sizing: border-box;margin-top: 0;margin-bottom: 0.5rem;font-family: inherit;font-weight: 500;line-height: 1.2;color: inherit;font-size: 2.5rem;">Total</h1>
            </div>
            <div class="col" style="box-sizing: border-box;-webkit-box-sizing: border-box;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;-ms-flex-preferred-size: 0;flex-basis: 0;-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;max-width: 100%;">
            </div>
            <div class="col" style="box-sizing: border-box;-webkit-box-sizing: border-box;position: relative;width: 100%;min-height: 1px;padding-right: 15px;padding-left: 15px;-ms-flex-preferred-size: 0;flex-basis: 0;-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;max-width: 100%;">

                <h3 style="box-sizing: border-box;-webkit-box-sizing: border-box;margin-top: 0;margin-bottom: 0.5rem;font-family: inherit;font-weight: 500;line-height: 1.2;color: inherit;font-size: 1.75rem;orphans: 3;widows: 3;page-break-after: avoid;">€{{$order->totalPrice()}}</h3>

            </div>
        </div>
    </div>

</section>



