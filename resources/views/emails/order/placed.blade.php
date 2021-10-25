@component('mail::message')
# Introduction

Thank you for your order!

You're paying €{{ $order->totalPrice() }}.

Your order will be delivered at {{$order->address_line_1}} - {{$order->city}}

@component('mail::button', ['url' => "http://pizzeria-shop.test/index"])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
