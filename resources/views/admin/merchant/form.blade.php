@extends('admin._layout.default')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-body">
                            <form method="POST" action="{{ url('/merchant', $merchant->id) }}">
                                    @csrf
                    
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Store') }}</label>
                    
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ $merchant->nama }}" required autofocus>
                    
                                            @if ($errors->has('nama'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('nama') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                    
                                    <div class="form-group row">
                                        <label for="tlp" class="col-md-4 col-form-label text-md-right">{{ __('No. Tlp') }}</label>
                    
                                        <div class="col-md-6">
                                            <input id="tlp" type="text" class="form-control{{ $errors->has('tlp') ? ' is-invalid' : '' }}" name="tlp" value="{{ $merchant->tlp }}" required>
                    
                                            @if ($errors->has('tlp'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('tlp') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                    
                                    <div class="form-group row">
                                        <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
                    
                                        <div class="col-md-6">
                                            <input id="alamat" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}"value="{{ $merchant->alamat }}" name="alamat" required>
                    
                                            @if ($errors->has('alamat'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('alamat') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                    
                                    <div class="form-group row">
                                        <label for="deskripsi" class="col-md-4 col-form-label text-md-right">{{ __('Deskripsi') }}</label>
                    
                                        <div class="col-md-6">
                                            <input id="deskripsi" type="text" class="form-control {{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" value="{{ $merchant->deskripsi }}" name="deskripsi" required>
                                            @if ($errors->has('deskripsi'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('deskripsi') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                    </div>
                    
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Update') }}
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