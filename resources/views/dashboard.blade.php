@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="container-fluid">
            <div class="row">
                <div class="col-3 col-sm-2 col-md-2 col-lg-1 col-xl-1">
                    <nav class="nav navbar-light navbar-toggleable-sm">
                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarWEX" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="navbar-collapse collapse flex-column mt-md-0 mt-4 pt-md-0 pt-4" id="navbarWEX">
                            <a class="nav-link navbar-brand active" href="~/Views/Forms/ControlPanel.cshtml"><span class="fa fa-home"></span></a>
                            <a href="/category/index" class="nav-link">Categories</a>
                            <a href="/products/index" class="nav-link">Products</a>
                            <a href="" class="nav-link">Linnk</a>
                        </div>
                    </nav>
                </div>
                <div class="col-9 col-sm-10 col-md-10 col-lg-11 col-xl-11">
                    <h2>Dashboard</h2>
                </div>
            </div>
        </div>


    </div>
</div>

    @endsection