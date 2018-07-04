@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">News</div>
                    <div class="panel-body">
                        <a href="{{url('category')}}" class="btn btn-primary for pull-right">Back</a>
                        </br>
                        <form class="form-control" method="post" action="{{url('category')}}">
                            @csrf

                            {{--{{old('title')}}--}}
                            <div class="form-control">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}"/>
                            </div>

                            <div class="form-control">
                                <label>Select Parent</label>
                                <select name="parent_id">
                                    <option>No Parent</option>
                                    @foreach($all_cats as $cat)

                                    <option>{{$cat->id}}</option>
                                   @endforeach
                                </select>

                            </div>



                            <div class="form-control">
                                <label>Description</label>
                                <input type="text"  class="form-control" name="description" value="{{old('description')}}"/>
                            </div>



                            <input type="submit" class="btn btn-success form-control" value="Add" />



                        </form>

                    </div>
    </div>
    </div>
    </div>
    </div>






@endsection('content')


