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
    <link rel="stylesheet" type="text/css" href="../src/plugins/src/glightbox/glightbox.min.css">
    <link href="../src/assets/css/light/pages/faq.css" rel="stylesheet" type="text/css" />
    <link href="../src/assets/css/dark/pages/faq.css" rel="stylesheet" type="text/css" />
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

                        <li class="breadcrumb-item active" aria-current="page">Initiate Return</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->

            <div class="row mb-4 layout-spacing layout-top-spacing">

                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

                    <div class="widget-content widget-content-area blog-create-section">

                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <label for="type">Assigned to</label>
                                <input id="type" type="text" class="form-control" value="Paras Kanwal" disabled>
                                
                            </div>
                            <div class="col-sm-4">
                                <label for="type">Type</label>
                                <input id="type" type="text" class="form-control" value="Laptop" disabled>
                                
                            </div>
                            <div class="col-sm-4">
                                <label for="brand">Brand</label>
                                <input id="brand" type="text" class="form-control" value="Dell" disabled>
                            </div>
                          
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <label for="model">Model</label>
                                <input id="model"  type="text" class="form-control" value="Latitude E6453" disabled>
                            </div>
                            <div class="col-sm-4">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control" value="AVLT-001" disabled>
                            </div>
                           
                            <div class="col-sm-4">
                                <label for="serial">Serial</label>
                                <input id="serial"  type="text" class="form-control" value="CD345FE" disabled>
                            </div>
                           
                        </div>
                     
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <label>Department Notes</label>
                                <textarea class="form-control" id="invoice-detail-notes" style="height: 88px;" value="">
                                    
                                </textarea>
                            </div>
                           

                        </div>


                
                        
                    </div>

                    

                </div>

                <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4">
                    <div class="widget-content widget-content-area blog-create-section">

                        <div class="row">
                           

                            <div class="col-xxl-12 col-md-12 mb-4">

                                <label for="product-images">Upload Images</label>
                                <div class="multiple-file-upload">
                                    <input type="file" class="filepond file-upload-multiple" name="filepond"
                                        id="product-images" multiple data-allow-reorder="true" data-max-file-size="3MB"
                                        data-max-files="5">
                                </div>

                            </div>

                            <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                <button class="btn btn-light-danger w-100">Cancel</button>
                                <div class="separator"><br></div>
                                <button class="btn btn-secondary w-100">Initiate Return</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
@section('pageleveljs')
    <script src="../src/plugins/src/editors/quill/quill.js"></script>
    <script src="../src/plugins/src/filepond/filepond.min.js"></script>
    <script src="../src/plugins/src/filepond/FilePondPluginFileValidateType.min.js"></script>
    <script src="../src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js"></script>
    <script src="../src/plugins/src/filepond/FilePondPluginImagePreview.min.js"></script>
    <script src="../src/plugins/src/filepond/FilePondPluginImageCrop.min.js"></script>
    <script src="../src/plugins/src/filepond/FilePondPluginImageResize.min.js"></script>
    <script src="../src/plugins/src/filepond/FilePondPluginImageTransform.min.js"></script>
    <script src="../src/plugins/src/filepond/filepondPluginFileValidateSize.min.js"></script>
    <script src="../src/assets/js/apps/blog-create.js"></script>
    <script src="../src/plugins/src/glightbox/glightbox.min.js"></script>
    <script src="../src/plugins/src/glightbox/custom-glightbox.min.js"></script>
    <script src="../src/assets/js/pages/faq.js"></script>
@endsection
