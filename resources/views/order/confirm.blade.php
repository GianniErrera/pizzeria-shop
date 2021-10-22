@extends('layouts.public')

@section('content')
    <div class="app container my-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-4">
            <form
                method="POST"
                action="{{route('order.confirm', ['order' => $order->id ])}}"
                id="confirm-order-form"
            >
                @csrf
                <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="customer_name" id="name" value="{{old('name')}}" aria-describedby="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="customer_surname" id="surname" value="{{old('surname')}}" placeholder="Surname" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-lg" name="email" id="email" value="{{old('email')}}" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="address_line_1" id="address_line_1" value="{{old('address_line_1')}}" aria-describedby="address_line_1" placeholder="Address" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="address_line_2" id="address_line_2" value="{{old('address_line_2')}}" placeholder="">
                </div>
                <div class="form-group">
                    <textarea class="form-control form-control-lg" name="delivery_notes" id="delivery_notes" placeholder="Delivery notes" aria-describedby="delivery_notes">{{old('delivery_notes')}}</textarea>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="city" id="city" value="{{old('city')}}" placeholder="City" required>
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

    </div>

@endsection

