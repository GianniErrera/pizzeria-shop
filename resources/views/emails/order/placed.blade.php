@component('mail::message')
# Order confirmation





Thank you for your order!

You're paying €{{ $order->totalPrice() }}.

Your order will be delivered to {{$order->customer_name}} {{$order->customer_surname}} at {{ $order->address_line_1 }} - {{ $order->city }}






@component('mail::table')

| Product        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  | quantity | price  |
| ------------------------------------------- |:--------:| ------:|
@foreach ($order->orderLines as $orderline)
    |  | |
    | {{ $orderline->product->name }}      | {{ $orderline->quantity }}   | €{{ $orderline->totalPrice() }}      |





@endforeach
@endcomponent

                                                                                    €{{ $order->totalPrice() }}



@component('mail::button', ['url' => "http://pizzeria-shop.test/index"])
Visit website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
