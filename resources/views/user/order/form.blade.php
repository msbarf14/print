@extends('admin._layout.default')
@section('breadcumb')
<h4 class="page-title pull-left">Merchant</h4>
<ul class="breadcrumbs pull-left">
    <li><a href="{{url('/dashboard')}}">Home</a></li>
    <li><span>Order </span></li>
</ul>
@endsection
@section('content')

    {{-- errot --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-body">
                        <form method="POST" action="{{ route('order.store') }}" enctype="multipart/form-data">
                            @csrf
        
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('File Name') }}</label>
        
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        name="name" value="{{ old('nama') }}" required autofocus>
        
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}"
                                        name="user_id" value="{{Auth::user()->id}}" hidden>
                            <input type="text" name="marchant_id" value="{{$order->id}}" hidden>
                            <div class="form-group row">
                                <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Quantiy') }}</label>
        
                                <div class="col-md-6">
                                    <input id="user_id" type="number" class="form-control{{ $errors->has('qty') ? ' is-invalid' : '' }}"
                                        name="qty" value="{{old('qty')}}" required>
                                    @if ($errors->has('qty'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('qty') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
        
                                <div class="col-md-6">
                                   <textarea name="description" id="description" cols="30" rows="10" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">{{old('description')}}</textarea>
                                    @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('qty') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>
        
                                <div class="col-md-6">
                                    <input id="deskripsi" type="file" class="form-controll" name="doc">
                                </div>
                            </div>
        
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
