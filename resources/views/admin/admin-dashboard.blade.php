<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
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
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="/menu">
            @csrf
            <div class="form-group">
                <select name="product_type" class="custom-select custom-select-lg mb-2">
                    <option value="pizza" {{ old('product_type') == "pizza" ? "selected" : "" }}>Pizza</option>
                    <option value="topping"  {{ old('product_type') == "topping" ? "selected" : "" }}>Topping</option>
                </select>
            </div>
            <div class="form-group">
              <label for="name">Product name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" aria-describedby="name" placeholder="Product name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" value="{{old('description')}}" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="text" class="form-control" name="price" id="price" value="{{old('price')}}" placeholder="Price">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <input type="checkbox" name="vegetarian" value="true"  {{ old('vegetarian') == true ? "checked" : "" }} aria-label="Vegetarian">
                    <span class="px-2">Vegetarian</span>
                  </div>

                </div>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <input type="checkbox" name="vegan" value="true" {{ old('vegan') == true ? "checked" : "" }} aria-label="Vegan">
                    <span class="px-2">Vegan</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="allergens">Allergens list</label>
                <textarea class="form-control" name="allergens" id="allergens" rows="3"></textarea>
                </div>

            <div class="form-check">

            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

          <br>

          <div class="container mb-4">
              <div class="mb-2">
                <h1 class="mb-2">Pizzas</h1>
                @foreach ($pizzas as $pizza)
                    <div class="row">
                    {{ $pizza->name }} - {{ $pizza->description }} - €{{ $pizza->price }}

                    </div>
                @endforeach
              </div>
              <div class="mb-2">
                <h1 class="mb-2">Toppings</h1>
                @foreach ($toppings as $topping)
                    <div class="row">
                    {{ $topping->name }} - {{ $topping->description }} - €{{ $topping->price }}
                    </div>
                @endforeach
              </div>
          </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
