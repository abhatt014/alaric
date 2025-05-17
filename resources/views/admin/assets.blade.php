@extends('layout.app')
@section('pagelevelcss')
    <link href="{{ asset('src/plugins/src/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/assets/css/light/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/light/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/dark/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/table/datatable/custom_dt_miscellaneous.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/table/datatable/custom_dt_miscellaneous.css') }}">
@endsection
@section('allinventory-active')
    active
@endsection
@section('maincontent')
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page">All Assets</li>
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


                   
             
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                    <div class="statbox widget box box-shadow">

                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h2 class="pt-4">All Assets</h2>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area table-responsive">
                            <table id="html5-extension" class="table dt-table-hover " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Asset Type</th>
                                        <th>Asset Name</th>
                                        <th>Assigned to User</th>
                                        <th>Assigned to Email ID</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($assets->isNotEmpty())
                                        @foreach ($assets as $asset)
                                            <tr>
                                                <td>{{ $asset->assetType->type_name ?? '' }} </td>
                                                <td>{{ $asset->asset_name }}</td>
                                                <td>
                                                 
                                                    @if ($asset->currentAssignment && $asset->currentAssignment->user)  
                                                    {{ $asset->currentAssignment->user->first_name }} {{ $asset->currentAssignment->user->last_name }}
                                                    @else
                                                        Unassigned
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($asset->currentAssignment && $asset->currentAssignment->user)
                                                        {{ $asset->currentAssignment->user->email}}
                                                    @else
                                                        Unassigned
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary"
                                                    {{-- {{ route('admin.assetedit', $asset->id) }} --}}
                                                        href="{{ route('admin.assets.edit',$asset->id) }}">Edit / view</a>

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
@endsection
@section('mandate')
    <script src="{{ asset('src/plugins/src/global/vendors.min.js') }}"></script>
@endsection
@section('pageleveljs')
    <script src="{{ asset('src/plugins/src/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('src/plugins/src/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/table/datatable/button-ext/jszip.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/table/datatable/button-ext/buttons.print.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/table/datatable/custom_miscellaneous.js') }}"></script>
@endsection
