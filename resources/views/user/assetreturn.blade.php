@extends('layout.userapp')
@section('pagelevelcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/tomSelect/tom-select.default.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/tomSelect/custom-tomSelect.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/tomSelect/custom-tomSelect.css') }}">

    <link rel="stylesheet" href="../src/assets/css/light/apps/blog-create.css">
    <link rel="stylesheet" href="../src/assets/css/dark/apps/blog-create.css">
@endsection

@section('assignasset-active')
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

                        <li class="breadcrumb-item active" aria-current="page">Return Assets</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
            {{-- {{ route('admin.storenewasset') }} --}}

            <form action="{{ route('user.returnasset') }}" method="post">
                @csrf
                <div class="row mb-4 layout-spacing layout-top-spacing">

                    <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

                        <div class="widget-content widget-content-area blog-create-section">


                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <label for="select-user">User<span style="color: red">*</span></label>

                                    <select id="select-user" name="user" placeholder="Select a user..."
                                        autocomplete="off" readonly>

                                        <option value="{{ Auth::guard('web')->user()->id }}">
                                            {{ Auth::guard('web')->user()->first_name }}
                                            {{ Auth::guard('web')->user()->last_name }} (
                                            {{ Auth::guard('web')->user()->email }} )
                                        </option>



                                    </select>

                                </div>


                            </div>
                            <div class="row mb-4">

                                <div class="col-sm-12">

                                    <label for="select-asset">Select Assets to Return<span
                                            style="color: red">*</span></label>


                                    <select id="select-asset" name="asset"  placeholder="Select Assets..."
                                        autocomplete="off" required>
                                        <option value="">Select Assets...</option>

                                        @foreach ($asset as $asset)
                                            <option value="{{ $asset->id }}"> {{ $asset->asset_name }}
                                                ({{ $asset->asset_serial }}) </option>
                                        @endforeach





                                    </select>

                                </div>
                              
                                

                            </div>
                            <div class="row mb-4">

                            
                            <div class="col-sm-12">

                                <label for="notes">Return Notes<span style="color: red">*</span></label>
                                <p class="text-danger">@error('notes'){{ $message }} @enderror</p>
                                <textarea class="form-control" name="notes" id="notes" cols="10" rows="3" required></textarea>  
                               

                            </div>
                        </div>





                        </div>



                    </div>

                    <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4">
                        <div class="widget-content widget-content-area blog-create-section">

                            <div class="row">




                            </div>

                            <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                <a href="{{ route('user.dashboard') }}" class="btn btn-light-danger w-100">Cancel</a>
                                <div class="separator"><br></div>

                                <button class="btn btn-secondary w-100">Return</button>
                            </div>

                        </div>
                    </div>
                </div>

        </div>
        </form>
    </div>
@endsection

@section('pageleveljs')
    <script src="../src/plugins/src/global/vendors.min.js"></script>
    

    <script src="{{ asset('src/plugins/src/tomSelect/tom-select.base.js') }}"></script>
    <script src="{{ asset('src/plugins/src/tomSelect/custom-tom-select.js') }}"></script>
    <script src="../src/assets/js/apps/blog-create.js"></script>
 
@endsection

@section('mandate')
@endsection
