@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title">{{$product->name}}
                        </h2>
                </div>


                <div class="panel-body">


                    <h2>
                        Size:{{$product->size}} - Color: {{$product->color}}
                    </h2>
                    </br>
                    <h3>
                        Price: {{$product->price}}
                    </h3>
                    <img src="{{url('/images/'.$product->image)}}"  height="250px" width="200px" />

                    <a class="pull-right" href="/userview" class="btn btn-link">Back</a>
                    <form method ="post" action="/User/add_to_cart/{{$product->id}}">

                         @csrf
                       <div class="col-sm-2">Quantity
                       <input type="number" class="form-control" name="quantity"/>

                       <input type="submit" class="btn btn-success" value="Add To Cart"/>
                       </div>

                   </form>


                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection