@extends('layout.hrapp')
@section('pagelevelcss')
    <link rel="stylesheet" href="{{ asset('src/plugins/src/filepond/filepond.min.css')}}">
    <link rel="stylesheet" href="{{ asset('src/plugins/src/filepond/FilePondPluginImagePreview.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/light/forms/switches.css')}}">
    <link href="{{ asset('src/plugins/css/light/filepond/custom-filepond.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/dark/forms/switches.css')}}">
    <link href="{{ asset('src/plugins/css/dark/filepond/custom-filepond.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('src/assets/css/light/apps/blog-create.css')}}">
    <link rel="stylesheet" href="{{ asset('src/assets/css/dark/apps/blog-create.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/glightbox/glightbox.min.css')}}">
    <link href="{{ asset('src/plugins/css/dark/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/plugins/css/light/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/plugins/src/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/light/elements/alert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/dark/elements/alert.css')}}">
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
                        <li class="breadcrumb-item"><a href="#">User</a></li>

                        <li class="breadcrumb-item active" aria-current="page">View Inventory</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
               

            
                <div class="row mb-4 layout-spacing layout-top-spacing">

                    <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

                        <div class="widget-content widget-content-area blog-create-section">

                            <div class="row mb-4">
                                <div class="col-sm-12">
                                  
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <label for="type">Type<span style="color: red">*</span></label>

                                    <select name="asset_type" id="asset_type" class="form-control" disabled>
                                        @foreach($assetTypes as $type)
                                            <option value="{{ $type->id }}" {{ $asset->asset_type == $type->id ? 'selected' : '' }}>
                                                {{ $type->type_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-sm-4">

                                    <label for="brand">Brand<span style="color: red">*</span></label>

                                    <input id="brand" type="text" class="form-control"
                                        value="{{ $asset->asset_brand }}" name="asset_brand" disabled>
                                    @error('asset_brand')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="col-sm-4">
                                    <label for="model">Model<span style="color: red">*</span></label>
                                    <input id="model" type="text" class="form-control"
                                        value="{{ $asset->asset_model }}" name="asset_model" disabled>
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
                                        value="{{ $asset->asset_name }}" name="asset_name" disabled>
                                    @error('asset_name')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="ipaddress">IP Address</label>
                                    <input id="ipaddress" type="text" class="form-control"
                                        value="{{ $asset->asset_ipaddress }}" name="asset_ipaddress" disabled>
                                    @error('asset_ipaddress')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="serial">Serial</label>
                                    <input id="serial" type="text" class="form-control"
                                        value="{{ $asset->asset_serial }}" name="asset_serial" disabled>
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
                                        value="{{ $asset->asset_ram }}" name="asset_ram" disabled>
                                    @error('asset_ram')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="ssd">SSD (GB)</label>
                                    <input id="ssd" type="text" class="form-control"
                                        value="{{ $asset->asset_ssd }}" name="asset_ssd" disabled>
                                    @error('asset_ssd')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="hdd">HDD (GB)</label>
                                    <input id="hdd" type="text" class="form-control"
                                        value="{{ $asset->asset_hdd }}" name="asset_hdd" disabled>
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
                                        value="{{ $asset->asset_mac }}" name="asset_mac" disabled>
                                    @error('asset_mac')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="processor">Processor</label>
                                    <input id="processor" type="text" class="form-control"
                                        value="{{ $asset->asset_processor }}" name="asset_processor" disabled>
                                    @error('asset_processor')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="resolution">Display Resolution</label>
                                    <input id="resolution" type="text" class="form-control"
                                        value="{{ $asset->asset_resolution }}" name="asset_resolution" disabled>
                                    @error('asset_resolution')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <label for="date">Purchase Date<span style="color: red">*</span></label>
                                    <input type="text" class="form-control form-control-sm" id="date"
                                        name="purchase_date" disabled>
                                    {{-- <input id="purchasedate" value="15-Feb-2022" type="text" class="form-control"> --}}
                                </div>
                           
                                <div class="col-sm-4">
                                    <label for="notes">Department Notes</label>
                                    <textarea class="form-control" id="notes" style="height: 88px;" name="notes" disabled>{{ $asset->notes }}</textarea>
                                    @error('notes')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="row mb-4">
                                
                            
                                
                             
                             
                            </div>
                          
                            <div class="row mb-4">
                              
                                <label>Asset Images </label>
                              
                                @foreach ( $images as $image )
                                 
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-4">
                                    <a href="{{ asset('uploads/assets/'.$image) }}" class="defaultGlightbox glightbox-content">
                                        <img src="{{ asset('uploads/assets/'.$image) }}" alt="image" class="img-fluid" />
                                    </a>
                                </div>    
                                @endforeach  
                                
    
                               
                            </div>




                        </div>



                    </div>

                    <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4">
                        <div class="widget-content widget-content-area blog-create-section">

                            <div class="row">
                               

                              

                            </div>
                            
                            <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                <a href="{{ route('user.assets') }}" class="btn btn-light-danger w-100">Back to Home</a>
                                <div class="separator"><br></div>
                                <a href="{{ route('user.return')}}" class="btn btn-secondary w-100">Initiate Return</a>
                            </div>

                        </div>
                    </div>
                </div>

        </div>
       
    </div>

    </div>
@endsection
@section('pageleveljs')
    <script src="{{ asset('src/plugins/src/global/vendors.min.js')}}"></script>
    <script src="{{ asset('src/plugins/src/filepond/filepond.min.js')}}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginFileValidateType.min.js')}}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js')}}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImagePreview.min.js')}}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageCrop.min.js')}}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageResize.min.js')}}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageTransform.min.js')}}"></script>
    <script src="{{ asset('src/plugins/src/filepond/filepondPluginFileValidateSize.min.js')}}"></script>
    <script src="{{ asset('src/plugins/src/glightbox/glightbox.min.js')}}"></script>
    <script src="{{ asset('src/plugins/src/glightbox/custom-glightbox.min.js')}}"></script>
    <script src="{{ asset('src/assets/js/apps/blog-create.js')}}"></script>
    <script src="{{ asset('src/plugins/src/flatpickr/flatpickr.js')}}"></script>
    <script>
        var f1 = flatpickr(document.getElementById('date'), {
            defaultDate: "{{ $asset->purchase_date }}",
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
