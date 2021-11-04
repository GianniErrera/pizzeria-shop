@extends('layouts.public')

@section('content')

    <section class="home-slider owl-carousel img" style="background-image: url(images/bg_1.jpg);">

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Our Menu</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index">Home</a></span> <span>Menu</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Our pizzas</h2>
            <p>These are some of our most popular pizzas</p>
          </div>
        </div>
        </div>
        <div class="container-wrap">
            <div class="row no-gutters d-flex">
                @forelse($pizzas as $pizza)
                    <div class="col-lg-4 d-flex ftco-animate">
                        <div class="services-wrap d-flex">
                            <!-- big screens layout display 3 pizzas in a row, and each rows has image aligned to left or right alternatively to form a checkboard pattern -->
                             <a href="#"
                                class="img {{ $loop->index  % 6 <= 2  ? ' order-lg-last' : '' }}"
                                @if($pizza->image)
                                      style="background-image: url({{asset('storage/' . $pizza->image)}});"
                                @else
                                      style="background-image: url(https://picsum.photos/1000/900);"
                                @endif
                                ></a>
                            <div class="text p-4">
                                <h3>{{$pizza->name}}</h3>
                                <p>{{ $pizza->description }} </p>
                                <p class="price"><span>€{{ $pizza->price }}</span> <a href="{{route("product.show", ['product' => $pizza])}}" class="ml-2 btn btn-white btn-outline-white">Order</a></p>
                            </div>
                        </div>
                    </div>
                @empty
                <h2>No pizzas found</h2>
                @endforelse
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Our Menu Pricing</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row">
            <!-- first we divide all record in two columns, then we create two columns to display the pizzas -->
            @php
            $number_pizzas_per_row = intdiv(count($pizzas), 2)
            @endphp

                @forelse($pizzas as $pizza)
                    @if($loop->first || $loop->index == $number_pizzas_per_row + 1) <!-- this line checks if element is the first in its column so div may be opened -->
                        <div class="col-md-6"> <!-- <- this opens the div tag -->
                            <div class="pricing-entry d-flex ftco-animate">
                                <div class="img"
                                    @if($pizza->image)
                                        style="background-image: url({{asset('storage/' . $pizza->image)}});"
                                    @else
                                        style="background-image: url(https://picsum.photos/1000/900);"
                                    @endif
                                ></div>
                                <div class="desc pl-3">
                                    <div class="d-flex text align-items-center">
                                        <h3><span>{{ $pizza->name }}</span></h3>
                                        <span class="price">€{{ $pizza->price }}</span>
                                    </div>
                                    <div class="d-block">
                                        <p>{{ $pizza->description }}</p>
                                    </div>
                                </div>
                            </div>
                    @elseif($loop->last || $loop->index == $number_pizzas_per_row) <!-- this line checks if element is the last in its column so div may be closed -->
                            <div class="pricing-entry d-flex ftco-animate">
                                <div class="img"
                                    @if($pizza->image)
                                        style="background-image: url({{asset('storage/' . $pizza->image)}});"
                                    @else
                                        style="background-image: url(https://picsum.photos/1000/900);"
                                    @endif
                                ></div>
                                <div class="desc pl-3">
                                    <div class="d-flex text align-items-center">
                                        <h3><span>{{ $pizza->name }}</span></h3>
                                        <span class="price">€{{ $pizza->price }}</span>
                                    </div>
                                    <div class="d-block">
                                        <p>{{ $pizza->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>  <!-- <- this closes the div tag -->
                    @else($loop->last || $loop->index == $number_pizzas_per_row) <!-- this line checks if element is the last in its column so div may be closed -->
                        <div class="pricing-entry d-flex ftco-animate">
                            <div class="img"
                                @if($pizza->image)
                                    style="background-image: url({{asset('storage/' . $pizza->image)}});"
                                @else
                                    style="background-image: url(https://picsum.photos/1000/900);"
                                @endif
                            ></div>
                            <div class="desc pl-3">
                                <div class="d-flex text align-items-center">
                                    <h3><span>{{ $pizza->name }}</span></h3>
                                    <span class="price">€{{ $pizza->price }}</span>
                                </div>
                                <div class="d-block">
                                    <p>{{ $pizza->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                <h2>No pizzas found</h2>
                @endforelse
            </div>


          </div>
        </div>
    </section>

    <section class="ftco-menu mb-4">
        <div class="container-fluid">
            <div class="row d-md-flex">
                <div class="col-lg-4 ftco-animate img f-menu-img mb-5 mb-md-0" style="background-image: url(images/about.jpg);">
                </div>
                <div class="col-lg-8 ftco-animate p-md-5">
                    <div class="row">
                        <div class="col-md-12 nav-link-wrap mb-5">
                            <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                @forelse($categories as $category)
                                    <a class="nav-link {{$loop->first ? 'active' : '' }} "
                                        id="v-pills-{{$loop->index + 1}}-tab"
                                        data-toggle="pill"
                                        href="#v-pills-{{$loop->index + 1}}"
                                        role="tab"
                                        aria-controls="v-pills-{{$loop->index + 1}}"
                                        aria-selected="{{$loop->index == 0 ? 'true' : 'false' }}">

                                        {{ucfirst($category->name)}}
                                    </a>
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <div class="col-md-12 d-flex align-items-center">
                            <div class="tab-content ftco-animate" id="v-pills-tabContent">

                                @forelse ($categories as $category)
                                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" style="overflow-x:hidden" id="v-pills-{{$loop->index + 1}}" role="tabpanel" aria-labelledby="v-pills-{{$loop->index + 1}}-tab">
                                        <div class="row">
                                            @forelse ($category->products as $product)
                                                <div class="col-md-4 text-center">
                                                    <div class="menu-wrap">
                                                        <a href="{{route("product.show", ['product' => $product])}}" class="menu-img img mb-4"
                                                        @if($product->image)
                                                        style="background-image: url({{asset('storage/' . $product->image)}});"
                                                        @else style="background-image: url(https://picsum.photos/200/300);"
                                                        @endif
                                                        ></a>
                                                        <div class="text">
                                                            <h3><a href="#">{{ $product->name }}</a></h3>
                                                            <div class="container-fluid" style="height:5rem; overflow:hidden">
                                                            <p>{{ str_pad($product->description, 120, " ")}}</p>
                                                            </div>

                                                            <p class="price"><span>€{{$product->price}}</span></p>
                                                            <p><a href="{{route("product.show", ['product' => $product])}}" class="btn btn-white btn-outline-white">Add to cart</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="p-4">
                                                    <h5>No products in this category</h5>
                                                </div>
                                            @endforelse

                                        </div>
                                    </div>

                                @empty

                                @endforelse

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <footer class="ftco-footer ftco-section img">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
             <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Cooked</a></li>
                <li><a href="#" class="py-2 d-block">Deliver</a></li>
                <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
                <li><a href="#" class="py-2 d-block">Mixed</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>



  @endsection
