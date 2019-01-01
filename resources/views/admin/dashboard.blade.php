@extends('admin._layout.default')

@section('breadcumb')
<h4 class="page-title pull-left">Dashboard</h4>

@endsection
@section('content')
<div class="container">
    <div class="row">
        <!-- seo fact area start -->
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-4 mt-5 mb-3">
                    <div class="card">
                        <div class="seo-fact sbg1">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="ti-briefcase"></i> Merchant</div>
                                <h2>{{$merchant}}</h2>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-md-5 mb-3">
                    <div class="card">
                        <div class="seo-fact sbg2">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="ti-user"></i> User</div>
                                <h2>{{$costumer}}</h2>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-md-5 mb-3">
                    <div class="card">
                        <div class="seo-fact sbg4">
                            <div class="p-4 d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="ti-stats-down"></i> Task</div>
                                <h2>{{$order}}</h2>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="jumbotron">
                        <h1 class="display-4">Hello, {{Auth::user()->name}}</h1>
                        <br>
                        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling
                            extra attention to featured content or information.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
