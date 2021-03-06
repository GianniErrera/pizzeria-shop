<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
        .number {
            width: 3em;
        }
    </style>

    <title>Incoming orders</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Pizzeria da Gianni</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Menu <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Incoming orders</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
    </nav>

    <div id="app" class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @forelse($orders as $order)
            <div class="border">

                <div class="row">


                        <div class="col">{{ $order->customer_name }} {{ $order->customer_surname }}</div>
                        <div class="col">???{{ $order->total_price }}</div>
                        <div class="col">{{ $order->email }}</div>



                </div>

                <div class="row">


                        <div class="col">{{ $order->address_line_1 }} {{ $order->address_line_2 }}</div>
                        <div class="col">{{ $order->address_line_2 }}</div>
                        <div class="col">{{ $order->city }}</div>

                </div>

                <div class="row">


                    <div class="col">{{ $order->city }} {{ $order->address_line_2 }}</div>
                    <div class="col">{{ $order->postal_code ? $order->postal_code : "none" }}</div>
                    <div class="col">{{ $order->delivery_notes ? $order->delivery_notes : "" }}</div>

                </div>

                <br>



                @foreach ($order->orderLines as $orderline)
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div>
                            <div>{{ $orderline->product->name }} {{ $orderline->quantity }}</div>
                        </div>
                    </div>

                    @foreach ($orderline->orderExtras as $orderExtra)
                        <div>
                            {{ $orderExtra->extra->name }}
                        </div>
                    @endforeach
                @endforeach

                <hr>

                <div>
                    <form
                        method="POST"
                        action="{{route('order.dispatched', ['order' => $order->id ])}}">
                        @csrf
                        <button class="btn btn-primary">Order dispatched</button>
                    </form>
                </div>

            </div>
        @empty

        <div>
            <h1>No incoming orders</h1>
            <products-categories categories='categories' />
        </div>

        @endforelse


    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
