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
    <div class="app container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{route('order.confirm', ['order' => $order->id ])}}">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="customer_name" id="name" value="{{old('name')}}" aria-describedby="name" placeholder="Name" required>
            </div>
            <div class="form-group">
              <label for="surname">Surname</label>
              <input type="text" class="form-control" name="customer_surname" id="surname" value="{{old('surname')}}" placeholder="Surname" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Email" required>
              </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" class="form-control" name="address_line_1" id="address_line_1" value="{{old('address_line_1')}}" aria-describedby="address_line_1" placeholder="Address" required>
            </div>
            <div class="form-group">
                <label for="address_line_2">Address line 2</label>
                <input type="text" class="form-control" name="address_line_2" id="address_line_2" value="{{old('address_line_2')}}" placeholder="">
            </div>
            <div class="form-group">
                <label for="delivery_notes">Delivery notes</label>
                <textarea class="form-control" name="delivery_notes" id="delivery_notes" aria-describedby="delivery_notes">{{old('delivery_notes')}}</textarea>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" name="city" id="city" value="{{old('city')}}" placeholder="City" required>
            </div>
            <div class="my-2 d-flex justify-content-between">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember_me">
                <label class="form-check-label" for="remember_me">Remember details</label>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
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
