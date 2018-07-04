@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Products</div>
                    <div class="panel-body">
                        <a href="{{url('products')}}" class="btn btn-primary for pull-right">Back</a>
                        </br>
                        <form class="form-control" method="post" action="{{url('products')}}" enctype="multipart/form-data">
                            @csrf

                            {{--{{old('title')}}--}}
                            <div class="form-control">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}" required/>
                            </div>

                            <div class="form-control">
                                <label>Price</label>
                                <input type="number" class="form-control" name="price" value="{{old('price')}}" required/>
                            </div>

                            <div class="form-control">
                                <label>Size</label>
                                <input type="text" class="form-control" name="size" value="{{old('size')}}" required/>
                            </div>


                            <div class="form-control">
                                <label>Color</label>
                                <input type="text" class="form-control" name="color" value="{{old('color')}}" required/>
                            </div>

                            <div class="form-control">
                                <label>File</label>
                                <input type="file" class="form-control" name="file" required/>
                            </div>

                            <div class="form-control">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image" required/>
                            </div>



                            <div class="form-control">
                                <label>Select Parent</label>
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


