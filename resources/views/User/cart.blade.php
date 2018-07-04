
@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class=" card-header">Your Cart  <center></center></div>

                    <table class="table table-bordered table-responsive-sm table-hover">

                        <thead>
                        <tr>

                            <td>Product Name</td>
                            <td>Quantity</td>
                            <td>Price</td>
                            <td>total</td>
                            <td>Date</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carts as $cart)
                            <tr>

                                <td>{{$cart->product_id}}</td>
                                <td>{{$cart->quantity}}</td>
                                <td>{{$cart->price}}</td>
                                <td>{{$cart->total_price}}</td>
                                <td>{{$cart->updated_at}}</td>

                            </tr>
                        @endforeach
                        </tbody>

                </table>
                    <div>
                    <button><a href="/userview" class="btn btn-primary">Continue Shopping</a></button>
                    <button><a href="/payment" class="btn btn-success">Checkout</a></button>
                    </div>

                </div>
        </div>
    </div>
    </div>







@endsection('content')