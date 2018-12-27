@extends('layouts.app')

@section('content')
 
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('merchant.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Store') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>

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
                        <input id="tlp" type="text" class="form-control{{ $errors->has('tlp') ? ' is-invalid' : '' }}" name="tlp" value="{{ old('tlp') }}" required>

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
                        <input id="alamat" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" required>

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
                        <input id="deskripsi" type="text" class="form-control {{ $errors->has('deskripsi') ? ' is-invalid' : '' }}" name="deskripsi" required>
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
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">PrintStore </div>
                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="border-radius:0px;">TAMBAH STORE</button>
                <div class="card-body">
                    <table id="example" class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>No.Hp</th>
                                <th>Alamat</th>
                                <th>Deskripsi</th>
                                <th>:</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($merchant as $item)
                                <tr>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->tlp}}</td>
                                    <td>{{$item->alamat}}</td>
                                    <td>{{$item->deskripsi}}</td>
                                    <td>
                                        <a href="{{url('merchant/'.$item->id.'/edit')}}">edit</a>
                                        <form action="{{ route('merchant.destroy', $item->id) }}" method="post" onSubmit="return confirm('Are You Sure To Delete 
                                            This Item? #{{ $item->name }} ')">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection