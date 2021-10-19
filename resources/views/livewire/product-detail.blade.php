<div class="container" id="{{ $product->id }}">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ ucfirst($product->category->name) }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <div class="m-2">
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
                    <form method="POST" wire:submit.prevent="addToCart">
                        @csrf
                        <div class="d-flex justify-content-between my-2">
                            <div class="text-capitalize"><h2>{{ $product->name }} - €{{ $product->price }}</h2></div>
                            <div>
                        </div>
                        <div class="d-flex justify-content-between my-2">
                            <div class="align-middle">
                                <button wire:click.prevent="add"><img src="images/plus_button.png" alt="" width="40px"></button>
                                <button wire:click.prevent="subtract"><img src="images/minus_button.png" alt="" width="40px"></button>
                            </div>
                            <input class="form-control form-control-lg"
                                wire:model="quantity"
                                name="quantity"
                                min="1" max="100"
                                class="number mx-4"
                                value={{$quantity}}
                                type="text"
                                style="width: 3em">
                            </div>
                        </div>
                        <hr>
                        @if($product->category->hasExtra) // some categories don't need any extra options
                            <div class="mb-4 ml-4">
                                @forelse ($extras as $extra)
                                    <div class="row">
                                        <div class="col">
                                            <h4>{{ $extra->name }} - €{{ $extra->price }}</h4>
                                        </div>
                                        <div class="col align-middle">
                                            <h4>
                                                <input wire:model="productExtras.{{$extra->id}}" id="{{ $extra->name }}" name="extras[{{ $extra->id }}]" {{ old("extras[$extra->id]") == true ? "checked" : "" }} value="{{ $extra->id }}" type="checkbox">
                                            </h4>
                                        </div>
                                        <div></div>
                                    </div>
                                @empty
                                @endforelse
                                <hr>
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
                        @endif
                        <div class="modal-footer">
                            <button type="button" id="close-modal-{{$product->id}}" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add to cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </form>

</div>
