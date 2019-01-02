@extends('admin._layout.default')

@section('breadcumb')
<h4 class="page-title pull-left">Dashboard</h4>

@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="jumbotron text-center">
                <h1 class="display-4">Hello, {{Auth::user()->name}}</h1>
                <br>
                <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling
                    extra attention to featured content or information.</p>
            </div>
        </div>
      
    </div>
</div>
@endsection
