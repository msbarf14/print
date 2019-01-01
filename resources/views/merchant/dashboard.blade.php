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
                <div class="col-md-12">
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="data-tables datatable-primary">
                                <table id="dataTable2" class="text-center">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $item)
                                            @if ($item->marchant_id == Auth::user()->id)
                                                <tr>
                                                    <td>{{$item->name}}</td>
                                                    <td>{!! link_to( route('getFile', $item->doc) . '/' . $item->doc, $item->doc) !!} </td>
                                                </tr>
                                            @else
                                                
                                            @endif
            
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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

