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

                        <li class="breadcrumb-item active" aria-current="page">Edit Inventory</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->

            <div class="row mb-4 layout-spacing layout-top-spacing">

                <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

                    <div class="widget-content widget-content-area blog-create-section">

                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <label for="type">Type</label>
                                <input id="type" value="Laptop" type="text" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label for="brand">Brand</label>
                                <input id="brand" value="Dell" type="text" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label for="model">Model</label>
                                <input id="model" value="Latitude E6453" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <label for="name">Name</label>
                                <input id="name" value="AVLT-001" type="text" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label for="ipaddress">IP Address</label>
                                <input id="ipaddress" value="192.168.1.40" type="text" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label for="serial">Serial</label>
                                <input id="serial" value="CD345FE" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <label for="ram">RAM</label>
                                <input id="ram" value="16GB" type="text" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label for="ssd">SSD</label>
                                <input id="ssd" value="512GB" type="text" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label for="hdd">HDD</label>
                                <input id="hdd" value="1TB" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <label for="mac">MAC</label>
                                <input id="mac" value="84:4B:F5:B2:D1" type="text" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label for="processor">Processor</label>
                                <input id="processor" value="Intel Core i5 1232P" type="text" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label for="resolution">Display Resolution</label>
                                <input id="resolution" value="1600X900" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <label for="date">Purchased On</label>
                                <input type="text" class="form-control form-control-sm" id="date" >
                                {{-- <input id="purchasedate" value="15-Feb-2022" type="text" class="form-control"> --}}
                            </div>
                            <div class="col-sm-4">
                                <label for="purchasecost">Purchase Cost</label>
                                <input id="purchasecost" value="50500" type="text" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label>Department Notes</label>
                                <textarea class="form-control" id="invoice-detail-notes" style="height: 88px;"></textarea>
                            </div>

                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <label for="assignedto">
                                    <h4>Assigned to : Paras Kanwal (paras@example.com)
                                    </h4>
                                </label>
                                <a href="{{ route('admin.initiatereturn') }}" class="btn btn-primary w-100">Initiate Return</a>
                                {{-- <input id="assignedto" value="Paras Kanwal (paras@example.com)" type="text" class="form-control" disabled> --}}
                            </div>
                        </div>


                        <div class="row">
                            <label>Asset Images</label>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-4">
                                <a href="../src/assets/img/laptop1.jpeg" class="defaultGlightbox glightbox-content">
                                    <img src="../src/assets/img/laptop1.jpeg" alt="image" class="img-fluid" />
                                </a>
                            </div>

                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-4">
                                <a href="../src/assets/img/laptop2.jpeg" class="defaultGlightbox glightbox-content">
                                    <img src="../src/assets/img/laptop2.jpeg" alt="image" class="img-fluid" />
                                </a>
                            </div>

                        </div>
                    </div>

                    <div class="widget-content widget-content-area blog-create-section mt-4">

                        <h5 class="mb-4">Assignment History</h5>

                        <div class="row mb-4">
                            <div class="col-lg-12">


                                <div class="accordion" id="simple_faq">

                                    <div class="card">
                                        <div class="card-header" id="fqheading1">
                                            <div class="mb-0" data-bs-toggle="collapse" role="navigation"
                                                data-bs-target="#fqcollapse1" aria-expanded="true"
                                                aria-controls="fqcollapse1">
                                                <span class="faq-q-title">25-Oct-2024</span>
                                            </div>
                                        </div>
                                        <div id="fqcollapse1" class="collapse show" aria-labelledby="fqheading1"
                                            data-bs-parent="#simple_faq">
                                            <div class="card-body">
                                                <p>
                                                    <strong>Action:</strong> Assign <br>
                                                    <strong>Affected User:</strong> Paras kanwal <br>
                                                    <strong>Notes:</strong> Laptop handed over to Paras with a broken
                                                    touchpad. will be replaced once the spare is available <br>
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="fqheading2">
                                            <div class="mb-0" data-bs-toggle="collapse" role="navigation"
                                                data-bs-target="#fqcollapse2" aria-expanded="false"
                                                aria-controls="fqcollapse2">
                                                <span class="faq-q-title">15-Feb-2024</span>
                                            </div>
                                        </div>
                                        <div id="fqcollapse2" class="collapse" aria-labelledby="fqheading2"
                                            data-bs-parent="#simple_faq">
                                            <div class="card-body">
                                                <p>
                                                    <strong>Action:</strong> Return <br>
                                                    <strong>Affected User:</strong> Ankit Sharma <br>
                                                    <strong>Notes:</strong> Laptop returned <br>
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="fqheading3">
                                            <div class="mb-0" data-bs-toggle="collapse" role="navigation"
                                                data-bs-target="#fqcollapse3" aria-expanded="false"
                                                aria-controls="fqcollapse3">
                                                <span class="faq-q-title">1-Dec-2023</span>
                                            </div>
                                        </div>
                                        <div id="fqcollapse3" class="collapse" aria-labelledby="fqheading3"
                                            data-bs-parent="#simple_faq">
                                            <div class="card-body">
                                                <p>
                                                    <strong>Action:</strong> Assign <br>
                                                    <strong>Affected User:</strong> Ankit Sharma <br>
                                                    <strong>Notes:</strong> Laptop handed over to Ankit <br>
                                                </p>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>

                </div>

                <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4">
                    <div class="widget-content widget-content-area blog-create-section">

                        <div class="row">
                            {{-- <div class="col-xxl-12 mb-4">
                                <div class="switch form-switch-custom switch-inline form-switch-primary">
                                    <input class="switch-input" type="checkbox" role="switch" id="showPublicly">
                                    <label class="switch-label" for="showPublicly">Consumable</label>
                                </div>
                            </div> --}}

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
                                <button class="btn btn-primary w-100">Update</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
@section('pageleveljs')
    {{-- <script src="../src/plugins/src/editors/quill/quill.js"></script> --}}
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
    <script src="../src/plugins/src/flatpickr/flatpickr.js"></script>
    <script>
        var f1 = flatpickr(document.getElementById('date'), {
  defaultDate: "02-Jan-2022",
});
    </script>
@endsection
