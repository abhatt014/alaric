@extends('layout.userapp')
@section('pagelevelcss')
    <link rel="stylesheet" href="{{ asset('src/plugins/src/filepond/filepond.min.css') }}">
    <link rel="stylesheet" href="{{ asset('src/plugins/src/filepond/FilePondPluginImagePreview.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/light/forms/switches.css') }}">
    <link href="{{ asset('src/plugins/css/light/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/dark/forms/switches.css') }}">
    <link href="{{ asset('src/plugins/css/dark/filepond/custom-filepond.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('src/assets/css/light/apps/blog-create.css') }}">
    <link rel="stylesheet" href="{{ asset('src/assets/css/dark/apps/blog-create.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/src/glightbox/glightbox.min.css') }}">
    <link href="{{ asset('src/assets/css/light/pages/faq.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/pages/faq.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/light/pages/faq.css') }}" rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('src/assets/css/dark/pages/faq.css') }}" rel="stylesheet" type="text/css" /> 
@endsection
@section('returnasset-active')
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

                        <li class="breadcrumb-item active" aria-current="page">View Return Request</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
            {{-- {{ route('admin.process',$assetReturnRequest->id) }} --}}
            
                @csrf
                <div class="row mb-4 layout-spacing layout-top-spacing">

                    <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

                        <div class="widget-content widget-content-area blog-create-section">

                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <label for="type">Assigned to</label>
                                    
                                        <input id="type" type="text" name="assigned_to" class="form-control"
                                            value="{{ $assetReturnRequest->assetAssignment->user->first_name }} {{ $assetReturnRequest->assetAssignment->user->last_name }}" readonly>
                                  


                                </div>
                                <div class="col-sm-4">
                                    <label for="type">Type</label>
                                   
                                        <input id="type" type="text" name="asset_type" class="form-control"
                                            value="{{  $assetReturnRequest->asset->assetType->type_name}}" readonly>
                                   


                                </div>
                                <div class="col-sm-4">
                                    <label for="brand">Brand</label>
                                    
                                        <input id="brand" type="text" name="asset_brand" class="form-control"
                                            value="{{ $assetReturnRequest->asset->asset_brand }}" readonly>
                                   

                                </div>

                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <label for="model">Model</label>
                                    
                                        <input id="model" type="text" name="asset_model" class="form-control"
                                            value="{{ $assetReturnRequest->asset->asset_model }}" readonly>
                                   


                                </div>
                                <div class="col-sm-4">
                                    <label for="name">Name</label>
                                    
                                        <input id="name" type="text" name="asset_name" class="form-control"
                                            value="{{ $assetReturnRequest->asset->asset_name }}" readonly>
                                   

                                </div>

                                <div class="col-sm-4">
                                    <label for="serial">Serial</label>
                                   
                                        <input id="serial" type="text" name="asset_serial" class="form-control"
                                            value="{{ $assetReturnRequest->asset->asset_serial }}" readonly>
                                 

                                </div>

                            </div>

                      




                        </div>



                    </div>
                    <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4">
                        <div class="widget-content widget-content-area blog-create-section">

                            <div class="row">




                                <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                    <a href="{{ route('user.dashboard') }}" class="btn btn-secondary w-100">Back</a>
                                    <div class="separator"><br></div>
                                    {{-- {{ do not show form if request is rejected or request is user-cancelled  }} --}}
                                    
                                    {{-- {{ var_dump($assetReturnRequest->status) }} --}}
                                    @if (!in_array($assetReturnRequest->status,['rejected','user-cancelled','hr-pending']))
                                    <form action="{{ route('user.return-request.cancel', $assetReturnRequest->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-danger w-100">Cancel Request</button>
                                    </form>    
                                    @endif

                                    

                                    
                                </div>

                            </div>
                        </div>
                    </div>

                    

                </div>
          

        </div>
        
    </div>
@endsection
@section('pageleveljs')
    <script src="{{ asset('src/plugins/src/editors/quill/quill.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImagePreview.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageCrop.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageResize.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageTransform.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/filepondPluginFileValidateSize.min.js') }}"></script>
    <script src="{{ asset('src/assets/js/apps/blog-create.js') }}"></script>
    <script src="{{ asset('src/plugins/src/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/glightbox/custom-glightbox.min.js') }}"></script>
    <script>
        var simpleFaq = document.querySelectorAll('#activity .collapse')

        for (let index = 0; index < simpleFaq.length; index++) {
            simpleFaq[index].addEventListener('show.bs.collapse', function() {
                this.parentNode.classList.add('show');
            })
            simpleFaq[index].addEventListener('hide.bs.collapse', function() {
                this.parentNode.classList.remove('show');
            })
        }
    </script>
@endsection
