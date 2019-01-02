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
                                            <th>File</th>
                                            <th>Progress</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order as $item)
                                        @if ($item->user_id == Auth::user()->id)
                                        <tr>
                                            <td>{{$item->user_label}}</td>
                                            <td>{{$item->name}}</td>
                                            
                                            <td>
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-bar 
                                                    @if ($item->status == 0)
                                                        bg-danger
                                                    @elseif($item->status == 1)
                                                        bg-warning
                                                    @elseif($item->status == 2)
                                                        bg-primary
                                                    @elseif($item->status == 3)
                                                        bg-success
                                                    @else
                                                    
                                                    @endif" role="progressbar" 

                                                    @if ($item->status == 0)
                                                        style="width: 5%;"
                                                    @elseif($item->status == 1)
                                                        style="width: 40%;"
                                                    @elseif($item->status == 2)
                                                        style="width: 70%;"
                                                    @elseif($item->status == 3)
                                                        style="width: 100%;"
                                                    @else
                                                        style="width: 0%;"
                                                    @endif
                                                        
                                                    ></div>
                                                </div>
                                            </td>
                                            <td>
                                                
                                                <span class="status-p 
                                                @if ($item->status == 0)
                                                    bg-danger
                                                @elseif($item->status == 1)
                                                    bg-warning
                                                @elseif($item->status == 2)
                                                    bg-primary
                                                @elseif($item->status == 3)
                                                    bg-success
                                                @else
                                                
                                                @endif">
                                                    @if ($item->status == 0)
                                                        New Order
                                                    @elseif($item->status == 1)
                                                        Listing
                                                    @elseif($item->status == 2)
                                                        Proccess
                                                    @elseif($item->status == 3)
                                                        Finish
                                                    @else
                                                    
                                                    @endif
                                                </span>
                                            </td>
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

