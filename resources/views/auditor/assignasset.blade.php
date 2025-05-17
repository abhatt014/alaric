@extends('layout.app')
@section('pagelevelcss')

<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/tomSelect/tom-select.default.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/light/tomSelect/custom-tomSelect.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/css/dark/tomSelect/custom-tomSelect.css')}}"> 

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
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Assign Asset</li>
                </ol>
            </nav>
        </div>
        <!-- /BREADCRUMB -->
        {{-- {{ route('admin.storenewasset') }} --}}
        <span><p class="text-danger"> @error('image_path[]'){{ $message }}</p>@enderror</span>
        
        <form enctype="multipart/form-data" action="{{ route('admin.assignasset') }}" method="post">
            @csrf
            <div class="row mb-4 layout-spacing layout-top-spacing">

                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

                    <div class="widget-content widget-content-area blog-create-section">


                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <label for="select-user">Select User<span style="color: red">*</span></label>
                                <p class="text-danger">@error('user_id'){{ $message }} @enderror</p>
                                <select id="select-user" name="user_id" placeholder="Select a user..." autocomplete="off">
                                    <option value="">Select a user...</option>
                                    @foreach ($users as $user )
                                    @if ($user->role != 'admin')
                                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}  ( {{ $user->email }} )</option>    
                                    @endif
                                        
                                    @endforeach
                                    
                                    

                                </select>

                            </div>
                        
                            
                        </div>
                        <div class="row mb-4">
                           
                            <div class="col-sm-12">

                                <label for="select-asset">Select Asset<span style="color: red">*</span></label>
                                <p class="text-danger">@error('asset_id'){{ $message }} @enderror</p>
                             
                                <select id="select-asset" name="asset_id"  placeholder="Select Assets..." autocomplete="off">
                                    <option value="">Select Assets...</option>
                                    @foreach ($unassignedAssets as $asset )
                                    <option value="{{ $asset->id }}"> {{ $asset->asset_name }} ({{ $asset->asset_serial }}) </option>    
                                    @endforeach
                                   
                                        
                                   
                                </select>

                            </div>
                            
                        </div>  
                    




                    </div>



                </div>

                <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4">
                    <div class="widget-content widget-content-area blog-create-section">

                        <div class="row">
                            

                            <div class="col-xxl-12 col-md-12 mb-4">

                                <label for="asset-images">Upload Images / files</label>
                                <div class="multiple-file-upload">
                                    <input type="file" name="image_path[]" id="asset-images" multiple
                                        class="form-control " required>
                                   
                                </div>
                                {{-- <input type="file" name="images[]" id="asset-images"
                                        class="filepond file-upload-multiple" data-allow-reorder="true"
                                        data-max-file-size="10MB" data-max-files="5" multiple> --}}
                            </div>

                        </div>

                        <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-light-danger w-100">Cancel</a>
                            <div class="separator"><br></div>
                            <button class="btn btn-secondary w-100">Assign</button>
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
<script src="../src/plugins/src/filepond/filepond.min.js"></script>
<script src="../src/plugins/src/filepond/FilePondPluginFileValidateType.min.js"></script>
<script src="../src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js"></script>
<script src="../src/plugins/src/filepond/FilePondPluginImagePreview.min.js"></script>
<script src="../src/plugins/src/filepond/FilePondPluginImageCrop.min.js"></script>
<script src="../src/plugins/src/filepond/FilePondPluginImageResize.min.js"></script>
<script src="../src/plugins/src/filepond/FilePondPluginImageTransform.min.js"></script>
<script src="../src/plugins/src/filepond/filepondPluginFileValidateSize.min.js"></script>

<script src="{{ asset('src/plugins/src/tomSelect/tom-select.base.js')}}"></script>
<script src="{{ asset('src/plugins/src/tomSelect/custom-tom-select.js')}}"></script>
<script src="{{ asset('src/assets/js/apps/blog-create.js')}}"></script>
<script>
    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginImageExifOrientation,
        FilePondPluginFileValidateSize,
    );

    // Select the file input and use 
    // create() to turn it into a pond
    var ecommerce = FilePond.create(
        document.querySelector('.file-upload-multiple')
    );
</script>

@endsection

@section('mandate')

@endsection
