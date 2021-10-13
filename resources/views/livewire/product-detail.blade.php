<div class="container" id="{{ $product->id }}">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" wire:submit.prevent="addToCart">{{$totalExtrasPrice}}
        @csrf
        <div class="d-flex justify-content-between my-2">
            <div class="text-capitalize"><h2>{{ $product->name }} - €{{ $product->price }}</h2></div>
            <div>
            <div>
                <button wire:click.prevent="add">+</button>
                <button wire:click.prevent="subtract">-</button>
            </div>
            <input class="form-control" wire:model="quantity" name="quantity" type="number" min="1" max="100" class="number mx-4" value={{$quantity}} type="text">
            </div>
            <div><button
                type="button"
                class="btn-close m-4"
                data-mdb-dismiss="modal"
                aria-label="Close"
              >x</button></div>
        </div>
        <hr>
        <div class="mb-4 ml-4">
            @foreach ($extras as $extra)
                <div class="d-flex justify-content-between">
                    <div><h4>{{ $extra->name }} - €{{ $extra->price }}</h4>
                    </div>
                    <div class="ml-2 align-middle">
                        <h4>
                            <input wire:model="productExtras.{{$extra->id}}" id="{{ $extra->name }}" name="extras[{{ $extra->id }}]" {{ old("extras[$extra->id]") == true ? "checked" : "" }} value="{{ $extra->id }}" type="checkbox">
                        </h4>
                    </div>
                    <div>
{{--                         @if({{$productExtras[$extra->id]}})
                            <h4>
                                € {{ $extra->price * $quantity }}
                            </h4>
                        @endif --}}
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-between">
                <div>
                    <h4>
                        Total € {{ $product->price + $totalExtrasPrice}}
                    </h4>
                </div>
                <div>
                    <h4>
                        qty {{ $quantity }} - € {{ ( $product->price + $totalExtrasPrice ) * $quantity }}
                    </h4>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Add to cart</button>
    </form>

</div>
