@extends('admin._layout.default')

@section('breadcumb')
<h4 class="page-title pull-left">Order</h4>
<ul class="breadcrumbs pull-left">
    <li><a href="{{url('/dashboard')}}">Home</a></li>
    <li><span>order</span></li>
</ul>
@endsection
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

                    <div class="form-group row">
                        <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('User') }}</label>

                        <div class="col-md-6">
                            <input id="user_id" type="text" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}"
                                name="user_id" value="{{Auth::user()->id}}" required>
                            @if ($errors->has('user_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('user_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Merchant Store') }}</label>

                        <div class="col-md-6">
                            <select name="marchant_id" id="marchant_id" class="form-control">
                                @foreach ($merchant as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('marchant_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('marchant_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
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
<br>

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
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Print Store <button class="btn btn-sm" data-toggle="modal" data-target="#exampleModal">tambah</button></h4>
            <div class="data-tables datatable-primary">
                <table id="dataTable2" class="text-center">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>No.Hp</th>
                            <th>Marchant</th>
                            <th>Doc</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->user_label}}</td>
                            <td>{{$item->marchant_label}}</td>
                            <td> <a href="{{$item->doc}}"><i class=" ti-zoom-in "></i></a></td>
                            <td>
                                <form action="{{ route('order.destroy', $item->id) }}" method="post" onSubmit="return confirm('Are You Sure To Delete 
                                                    This Item? #{{ $item->name }} ')">
                                    @csrf
                                    @method("DELETE")
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

<!-- Modal form Upload   -->
<div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(array('route' => 'order.import','method'=>'POST','files'=>'true')) !!}
            @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
            @elseif (Session::has('warnning'))
            <div class="alert alert-warnning">{{ Session::get('warnning') }}</div>
            @endif
            <br>
            <div class="form-group row">
                <div class="col-sm-2">

                </div>
                <div class="col-sm-6">
                    {!! Form::label('sample_file','Select File to Import:') !!}
                    {!! Form::file('order', array('class' => 'form-control')) !!}
                    {!! $errors->first('order', '<p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Import',['class'=>'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
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
