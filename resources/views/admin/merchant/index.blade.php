@extends('admin._layout.default')

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
                            <input id="name" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"
                                name="nama" value="{{ old('nama') }}" required autofocus>

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
                            <input id="tlp" type="text" class="form-control{{ $errors->has('tlp') ? ' is-invalid' : '' }}"
                                name="tlp" value="{{ old('tlp') }}" required>

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
                            <input id="alamat" type="text" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}"
                                name="alamat" required>

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
                            <input id="deskripsi" type="text" class="form-control {{ $errors->has('deskripsi') ? ' is-invalid' : '' }}"
                                name="deskripsi" required>
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
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Print Store <button class="btn btn-sm"  data-toggle="modal" data-target="#exampleModal">tambah</button></h4>
            <div class="data-tables datatable-primary">
                <table id="dataTable2" class="text-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>No.Hp</th>
                            <th>Alamat</th>
                            <th>Deskripsi</th>
                            <th>Action</th>

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
                               
                                <form action="{{ route('merchant.destroy', $item->id) }}" method="post" onSubmit="return confirm('Are You Sure To Delete 
                                                    This Item? #{{ $item->name }} ')">
                                    @csrf
                                    @method("DELETE")
                                    <a href="{{url('merchant/'.$item->id.'/edit')}}" class="btn btn-sm btn-primary"><i class="ti-pencil"></i></a>
                                    <button class="btn btn-sm float-right"><i class="ti-trash"></i></button>
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
@endsection
@section('script')
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
@endsection
