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
    <div class="container" id="app">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="/orderlines/{{$orderline->id}}">
            @csrf
            @method("PATCH")
            <div class="d-flex justify-content-between" id="app">
                <div>{{ $orderline->product->name }} - €{{ $orderline->product->price }}</div>
                <div>
                <input name="quantity" value="{{ old('quantity') ? old('quantity') : $orderline->quantity }}"  type="number" min="1" max="100" class="number mx-4" type="text">
                </div>
            </div>
            <div>
                @foreach ($extras as $extra)
                <div class="row">
                    <div>{{ $extra->name }}
                    </div>
                    <input id="{{ $extra->name }}" name="extras[{{ $extra->id }}]"
                    {{ (old('extras[$extra->id]') || in_array($extra->id, $extraline)) ? "checked" : "" }} value="{{ $extra->id }}" type="checkbox">
                </div>
                @endforeach
            </div>
            <button type="submit">Update order</button>
        </form>

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
