<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <style>
        .number {
            width: 3em;
        }
    </style>
    <title>Pizzeria da Gianni!</title>
  </head>
  <body>
    <div class="container">
        <div>
            <h1>Pizzas</h1>

                @foreach ($products as $product)
                    @if($product->category == "1")
                        <form method="POST" action="/orders/{{$product->id}}">
                            @csrf
                            <div>
                                <div class="d-flex justify-content-between">
                                    <div><a href="{{route('product.show', ['product_id' => $product->id])}}">{{ $product->name }}</a> - €{{ $product->price }}</div>
                                    <div>
                                    <input name="quantity" type="number" min="1" max="100" class="number mx-4" type="text">
                                    </div>

                                    <button type="submit">Add to cart</button>
                                </div>
                                <div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Launch demo modal
                                    </button>

                                </div>
                            </div>

                        </form>
                    @endif
                @endforeach

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



            @foreach ($orderlines as $orderline)
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
                        <div class="col"> €{{ $orderline->product->price }}</div>
                        <div class="col"> €{{ (int)$orderline->quantity * (float)$orderline->product->price }}
                        </div>

                    </div>
                    <div>
                        @foreach ($orderline->orderExtras as $extraLine)
                        <div class="d-flex justify-content-between">
                            <div class="col">{{ $orderline->quantity }} {{ $extraLine->extra->name }}</div>
                            <div class="col">€{{ $extraLine->extra->price }}</div>
                            <div class="col">€{{$extraLine->extra->price * $orderline->quantity}} </div>
                        </div>
                        @endforeach
                        <div class="d-flex justify-content-between">
                            <div class="col">total</div>
                            <div class="col"></div>
                            <div class="col">€{{ (int)$orderline->quantity * (float)$orderline->product->price + $total_extras }}</div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <form action="/orderlines/{{$orderline->id}}">
                            <button>Modify order</button>
                        </form>
                        <form action="">
                            <button>Cancel order</button>
                        </form>
                    </div>
                </div>



            @endforeach



        </div>



    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>
