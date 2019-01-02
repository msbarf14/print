@extends('admin._layout.default')

@section('breadcumb')
<h4 class="page-title pull-left">Merchant</h4>

@endsection
@section('content')
<div class="container">
    <div class="row">
        @foreach ($merchant as $item)
        <div class="col-md-4 mt-5 mb-3">
                <div class="card">
                    <div class="seo-fact sbg1">
                        <div class="p-4 d-flex justify-content-between align-items-center">
                            <div class="seofct-icon"><i class="ti-briefcase"></i> {{$item->nama}}</div>
                            <h2><a href="{{url('orderUser/'.$item->id)}}" style="color:white;"><i class="ti-arrow-circle-right"></i></a></h2>
                        </div>
    
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
</div>
@endsection
