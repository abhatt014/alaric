@extends('layout.userapp')
@section('pagelevelcss')
<link href="{{ asset('src/plugins/src/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('src/assets/css/light/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('src/assets/css/dark/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/light/elements/alert.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/dark/elements/alert.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/table/datatable/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/table/datatable/dt-global_style.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css')}}">
@endsection
@section('home-active')
active
@endsection
@section('maincontent')
<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <!-- BREADCRUMB -->
        <div class="page-meta">
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
        <!-- /BREADCRUMB -->

        <div class="row layout-top-spacing">

            @if (Session::has('success'))
                    <div class="row col-md-12 text-center align-self-center">
                        <div class="alert alert-light-success alert-dismissible fade show border-0 mb-4" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            </button>
                            <strong>{{ Session::get('success') }} </strong> </button>
                        </div>
                    </div>
                @endif

      

       
            <div class="col-xl-3 col-lg-6 col-md-6  mb-4">
                <div class="card bg-dark">
                    <div class="card-body pt-3">
                        {{-- {{ $totalMonitors }} --}}
                        <h3 class="card-title mb-3">{{ $totalAssets }}</h3>
                        <h4 class="card-text">Total Assets</h4>
                    </div>
                    <div class="card-footer px-4 pt-0 border-0">
                        <a href="{{ route('user.assets') }}" target="_blank">View</a>
                    </div>
                </div>
            </div>


       
          
                    
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h2 class="pt-4 ">My Return Requests</h2>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <table id="html5-extension" class="table dt-table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Inventory Type</th>
                                        <th>Inventory Name</th>
                                        <th>Return initiated On</th>
                                        <th>Request Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- display all return requests by the authenticated user --}}
                                    @if ($returnRequests->isEmpty())
                                        
                                    @else
                                    @foreach ($returnRequests as $myReturnRequest)
                                    <tr>
                                        <td>{{ $myReturnRequest->asset->assetType->type_name??'' }}</td>
                                        <td>{{ $myReturnRequest->asset->asset_name??'' }}</td>
                                        {{-- display date when the return request was created by the authenticated user --}}
                                        <td>{{ \Carbon\Carbon::parse($myReturnRequest->created_at)->format('d-M-Y') }}</td>
                                        <td><span class="badge badge-warning">{{ $myReturnRequest->status??'' }}</span></td>
                                        <td>        
                                            <a class="btn btn-primary" href="{{ route('user.return-request.show', $myReturnRequest->id) }}">View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                                         
                               

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            

        </div>

    </div>

</div>
@section('mandate')
<script src="{{ asset('src/plugins/src/global/vendors.min.js')}}"></script>
@endsection
@endsection
@section('pageleveljs')

<script src="{{ asset('src/plugins/src/table/datatable/datatables.js')}}"></script>
<script src="{{ asset('src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('src/plugins/src/table/datatable/button-ext/jszip.min.js')}}"></script>    
<script src="{{ asset('src/plugins/src/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
<script src="{{ asset('src/plugins/src/table/datatable/button-ext/buttons.print.min.js')}}"></script>
<script src="{{ asset('src/plugins/src/table/datatable/custom_miscellaneous.js')}}"></script>

@endsection
