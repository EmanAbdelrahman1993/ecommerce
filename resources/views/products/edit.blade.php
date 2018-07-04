@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Product Update</div>
                    <div class="panel-body">
                        <a href="{{url('products')}}" class="btn btn-primary for pull-right">Back</a>
                        </br>
                        <form class="form-control" method="post" action="{{url('products/'.$product->id)}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PUT"/>


                            {{--{{old('title')}}--}}
                            <div class="form-control">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{$product->name}}"/>
                            </div>


                            <div class="form-control">
                                <label>Price</label>
                                <input type="number" class="form-control" name="price" value="{{$product->price}}"/>
                            </div>

                            <div class="form-control">
                                <label>Size</label>
                                <input type="text" class="form-control" name="size" value="{{$product->size}}"/>
                            </div>


                            <div class="form-control">
                                <label>Color</label>
                                <input type="text" class="form-control" name="color" value="{{$product->color}}"/>
                            </div>

                            <div class="form-control">
                                <label>File:</label>
                                <div>{{$product->file}}</div>
                                <input type="file" class="form-control" name="file" value="{{$product->file}}"/>
                            </div>

                            <div class="form-control">
                                <label>Image</label>


                                <img src="{{url('/images/'.$product->image)}}" />
                                    <input type="file" class="form-control" name="image" />
                            </div>

                            <div class="form-control">
                                <label>Select Category</label>
                                <select name="cat_id">

                                    @foreach($all_cats as $cat)

                                        <option>{{$cat->id}}</option>
                                    @endforeach
                                </select>

                            </div>


                            <input type="submit" class="btn btn-success form-control" value="Add" />



                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection('content')


