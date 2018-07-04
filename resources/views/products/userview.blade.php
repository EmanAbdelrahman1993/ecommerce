@extends('layouts.app')
@section('content')


    <div class="content">
        <div class="container">

            <h1>Products</h1>


                <div class="row container">

                    @foreach($all_products as $product)

                        <div class="col-sm-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h2 class="panel-title">{{$product->name}}</h2>
                                </div>
                                <div class="panel-body">

                                    <h2>
                                        <img src="{{url('/images/'.$product->image)}}" height="150px" width="150px" />

                                    </h2>
                                    <span class="label label-warning">{{$product->price}}</span>
                                    <a class="pull-right" href="/products/{{$product->id}}" class="btn btn-link">More</a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
                <center>
                    {{$all_products->links()}}
                </center>
        </div>
    </div>




@endsection('content')