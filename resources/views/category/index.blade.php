@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">

                    <div class=" card-header">Category Index  <center><a href="/home" class="btn btn-primary">Back To Dashboard</a>  <a href="{{url('category/create')}}" class="btn btn-primary">Add Category</a></center></div>

                    <table class="table table-bordered table-responsive-sm table-hover">

                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Add By</td>
                            <td>Parent</td>
                            <td>Description</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all_cats as $cat)
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->name}}</td>
                                <td>{{$username}}</td>


                                <td>{{$cat->parent_id}}</td>
                                <td>{{$cat->description}}</td>

                                <td>
                                    <a href="{{url('category/'.$cat->id.'/edit')}}" class="btn btn-primary">Edit</a>
                                    <form method="post" action="{{url('category/'.$cat->id)}}" style="display: inline;">
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
                    {{$all_cats->links()}}
                </center>
            </div>
        </div>
    </div>







@endsection('content')