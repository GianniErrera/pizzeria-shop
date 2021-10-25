<div class="container" id="{{ $product->id }}">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ ucfirst($product->category->name) }}</h5>
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
                <form method="POST" wire:submit.prevent="updateOrderline">
                    @csrf
                    <div class="d-flex justify-content-between my-2">
                        <div class="text-capitalize"><h2>{{ $product->name }} - €{{ $product->price }}</h2></div>
                        <div>
                    </div>
                    <div class="d-flex justify-content-between my-2">
                        <div class="align-middle">
                            <button wire:click.prevent="add"><img src="/images/plus_button.png" alt="" width="40px"></button>
                            <button wire:click.prevent="subtract"><img src="/images/minus_button.png" alt="" width="40px"></button>
                        </div>
                        <input class="form-control form-control-lg ml-4"
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
                    @if($product->category->hasExtras) <!-- some categories don't need any extra options and we don't want to show these checkboxes when ordering them -->
                        <div class="mb-4 ml-4">
                            @forelse ($extras as $extra)                                 <div class="row">
                                    <div class="col">
                                        <h4>{{ $extra->name }} - €{{ $extra->price }} </h4>
                                    </div>
                                    <div class="col align-middle">
                                        <h4>
                                            <input wire:model="checkedExtras.{{$extra->id}}"
                                                id="{{ $extra->name }}"
                                                name="checkedExtras[{{ $extra->id }}]"
                                                {{in_array($extra->id, $extralines)}} ? 'checked' : '' }}
                                                value="{{ $extra->id }}"
                                                type="checkbox">
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
                        <a href="{{route("customers-view").'#cart'}}" class="btn btn-secondary" data-dismiss="modal">Back to homepage</a>
                        <button type="submit" class="btn btn-primary">Modify order</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


</div>

