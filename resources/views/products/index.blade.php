@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class=" card-header">Product Index  <center><a href="/home" class="btn btn-primary">Back To Dashboard</a> <a href="{{url('products/create')}}" class="btn btn-primary">Add product</a></center></div>

                    <table class="table table-bordered table-responsive-sm table-hover">

                        <thead>
                        <tr>

                            <td>Name</td>
                            <td>Category Name</td>
                            <td>Price</td>
                            <td>Size</td>
                            <td>Color</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all_products as $product)
                            <tr>

                                <td>{{$product->name}}</td>
                                <td>{{$product->cat_id}}</td>
                                <td>{{$product->size}}</td>
                                <td>{{$product->size}}</td>
                                <td>{{$product->color}}</td>


                                <td>
                                    <a href="{{url('products/'.$product->id.'/edit')}}" class="btn btn-primary">Edit</a>
                                    <form method="post" action="{{url('products/'.$product->id)}}" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE"/>
                                        <input type="submit" value="delete" class="btn btn-danger"/>
                                    </form>
                                    {{--<a href="{{url('news/destroy/'.$news->id)}}" class="btn btn-danger" role="button">Delete</a>--}}
                                    {{----}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <center>
                    {{$all_products->links()}}
                </center>
            </div>
        </div>
    </div>







@endsection('content')