@extends('layout.app')
@section('pagelevelcss')
    <link rel="stylesheet" href="../src/plugins/src/filepond/filepond.min.css">
    <link rel="stylesheet" href="../src/plugins/src/filepond/FilePondPluginImagePreview.min.css">
    <link rel="stylesheet" type="text/css" href="../src/assets/css/light/forms/switches.css">
    <link href="../src/plugins/css/light/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../src/assets/css/dark/forms/switches.css">
    <link href="../src/plugins/css/dark/filepond/custom-filepond.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../src/assets/css/light/apps/blog-create.css">
    <link rel="stylesheet" href="../src/assets/css/dark/apps/blog-create.css">

    <link href="../src/plugins/css/dark/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <link href="../src/plugins/css/light/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <link href="../src/plugins/src/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
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

                        <li class="breadcrumb-item active" aria-current="page">Add New Asset</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
            {{-- {{ route('admin.storenewasset') }} --}}
            <form enctype="multipart/form-data" action="{{ route('admin.storenewasset') }}" method="post">
                @csrf
                <div class="row mb-4 layout-spacing layout-top-spacing">

                    <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

                        <div class="widget-content widget-content-area blog-create-section">


                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <label for="type">Type<span style="color: red">*</span></label>

                                    <select class="form-select" id="type" name="asset_type">

                                        @foreach ($assetTypes as $type)
                                            <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                        @endforeach

                                    </select>

                                </div>
                                <div class="col-sm-4">

                                    <label for="brand">Brand<span style="color: red">*</span></label>

                                    <input id="brand" type="text" class="form-control"
                                        value="{{ old('asset_brand') }}" name="asset_brand" required>
                                    @error('asset_brand')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="col-sm-4">
                                    <label for="model">Model<span style="color: red">*</span></label>
                                    <input id="model" type="text" class="form-control"
                                        value="{{ old('asset_model') }}" name="asset_model" required>
                                    @error('asset_model')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <label for="name">Name<span style="color: red">*</span></label>
                                    <input id="name" type="text" class="form-control"
                                        value="{{ old('asset_name') }}" name="asset_name" required>
                                    @error('asset_name')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="ipaddress">IP Address</label>
                                    <input id="ipaddress" type="text" class="form-control"
                                        value="{{ old('asset_ipaddress') }}" name="asset_ipaddress">
                                    @error('asset_ipaddress')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="serial">Serial<span style="color: red">*</span></label>
                                    <input id="serial" type="text" class="form-control"
                                        value="{{ old('asset_serial') }}" name="asset_serial" required>
                                    @error('asset_serial')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <label for="ram">RAM (GB)</label>
                                    <input id="ram" type="text" class="form-control"
                                        value="{{ old('asset_ram') }}" name="asset_ram">
                                    @error('asset_ram')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="ssd">SSD (GB)</label>
                                    <input id="ssd" type="text" class="form-control"
                                        value="{{ old('asset_ssd') }}" name="asset_ssd">
                                    @error('asset_ssd')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="hdd">HDD (GB)</label>
                                    <input id="hdd" type="text" class="form-control"
                                        value="{{ old('asset_hdd') }}" name="asset_hdd">
                                    @error('asset_hdd')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                
                                <div class="col-sm-4">
                                    <label for="mac">MAC</label>
                                    <input id="mac" type="text" class="form-control"
                                        value="{{ old('asset_mac') }}" name="asset_mac" >
                                    @error('asset_mac')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="processor">Processor</label>
                                    <input id="processor" type="text" class="form-control"
                                        value="{{ old('asset_processor') }}" name="asset_processor">
                                    @error('asset_processor')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="resolution">Display Resolution</label>
                                    <input id="resolution" type="text" class="form-control"
                                        value="{{ old('asset_resolution') }}" name="asset_resolution">
                                    @error('asset_resolution')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            
                            





                        </div>



                    </div>
                    

                    <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4">
                        <div class="widget-content widget-content-area blog-create-section">

                            <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                <a href="#" class="btn btn-light-danger w-100">Cancel</a>
                                <div class="separator"><br></div>
                                <button class="btn btn-secondary w-100">Save</button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row mb-4 layout-spacing ">
                    <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

                        <div class="widget-content widget-content-area blog-create-section">
                            {{-- add purchase details --}}
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <label for="date">Purchase Date<span style="color: red">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="date"
                                        name="purchase_date" required>
                                    {{-- <input id="purchasedate" value="15-Feb-2022" type="text" class="form-control"> --}}
                                </div>
                                <div class="col-sm-4">
                                    <label for="purchasecost">Purchase Cost (inr)<span style="color: red">*</span></label>
                                    <input id="purchasecost" type="text" class="form-control"
                                        value="{{ old('purchase_cost') }}" name="purchase_cost" required>
                                    @error('purchase_cost')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="notes">Department Notes<span style="color: red">*</span></label>
                                    <textarea class="form-control" id="notes" style="height: 88px;" name="notes" required>{{ old('notes') }}</textarea>
                                    @error('notes')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>

                        </div>



                    </div>
                </div>
                <div class="row mb-4 layout-spacing ">
                    <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

                        <div class="widget-content widget-content-area blog-create-section">


                           
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <label for="asset-images">Upload Images<span style="color: red">*</span></label>
                                    <div class="multiple-file-upload">
                                        <input type="file" name="image_path[]" id="asset-images" multiple
                                            class="form-control " required>
                                            @error('image_path')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="invoice">Upload Invoice<span style="color: red">*</span></label>
                                    <div class="multiple-file-upload">
                                        <input type="file" name="invoice[]" id="invoice" multiple
                                            class="form-control " required>
                                            @error('invoice')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
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

    <script src="../src/assets/js/apps/blog-create.js"></script>
    <script src="../src/plugins/src/flatpickr/flatpickr.js"></script>
    <script>
        var f1 = flatpickr(document.getElementById('date'), {
            defaultDate: "",
        });
    </script>
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
