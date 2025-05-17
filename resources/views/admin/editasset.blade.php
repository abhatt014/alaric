@extends('layout.app')
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
    <link href="{{ asset('src/plugins/css/dark/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/plugins/css/light/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('src/plugins/src/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/light/elements/alert.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('src/assets/css/dark/elements/alert.css') }}">
    <link href="{{ asset('src/assets/css/light/pages/faq.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/pages/faq.css') }}" rel="stylesheet" type="text/css" />
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
            {{-- {{ route('admin.storenewasset') }} --}}
            <form enctype="multipart/form-data" id="editAssetForm" action="{{ route('admin.assets.update', $asset->id) }}"
                method="post">

                @csrf
                @method('PUT')
                <div class="row mb-4 layout-spacing layout-top-spacing">

                    <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

                        <div class="widget-content widget-content-area blog-create-section">

                            <div class="row mb-4">
                                <div class="col-sm-12">
                                    <div class="alert alert-light-warning alert-dismissible fade show border-1 mb-4"
                                        role="alert">

                                        <strong>Serial Number update is not allowed!</strong> Delete Asset and add it again
                                        with updated Serial</button>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <label for="type">Type<span style="color: red">*</span></label>

                                    <select name="asset_type" id="asset_type" class="form-control">
                                        @foreach ($assetTypes as $type)
                                            <option value="{{ $type->id }}"
                                                {{ $asset->asset_type == $type->id ? 'selected' : '' }}>
                                                {{ $type->type_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-sm-4">

                                    <label for="brand">Brand<span style="color: red">*</span></label>

                                    <input id="brand" type="text" class="form-control"
                                        value="{{ $asset->asset_brand }}" name="asset_brand">
                                    @error('asset_brand')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="col-sm-4">
                                    <label for="model">Model<span style="color: red">*</span></label>
                                    <input id="model" type="text" class="form-control"
                                        value="{{ $asset->asset_model }}" name="asset_model">
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
                                        value="{{ $asset->asset_name }}" name="asset_name">
                                    @error('asset_name')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="ipaddress">IP Address</label>
                                    <input id="ipaddress" type="text" class="form-control"
                                        value="{{ $asset->asset_ipaddress }}" name="asset_ipaddress">
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
                                        value="{{ $asset->asset_ram }}" name="asset_ram">
                                    @error('asset_ram')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="ssd">SSD (GB)</label>
                                    <input id="ssd" type="text" class="form-control"
                                        value="{{ $asset->asset_ssd }}" name="asset_ssd">
                                    @error('asset_ssd')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="hdd">HDD (GB)</label>
                                    <input id="hdd" type="text" class="form-control"
                                        value="{{ $asset->asset_hdd }}" name="asset_hdd">
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
                                        value="{{ $asset->asset_mac }}" name="asset_mac">
                                    @error('asset_mac')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="processor">Processor</label>
                                    <input id="processor" type="text" class="form-control"
                                        value="{{ $asset->asset_processor }}" name="asset_processor">
                                    @error('asset_processor')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="resolution">Display Resolution</label>
                                    <input id="resolution" type="text" class="form-control"
                                        value="{{ $asset->asset_resolution }}" name="asset_resolution">
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
                                        name="purchase_date">
                                    {{-- <input id="purchasedate" value="15-Feb-2022" type="text" class="form-control"> --}}
                                </div>
                                <div class="col-sm-4">
                                    <label for="purchasecost">Purchase Cost (inr)<span style="color: red">*</span></label>
                                    <input id="purchasecost" type="text" class="form-control"
                                        value="{{ $asset->purchase_cost }}" name="purchase_cost">
                                    @error('purchase_cost')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-sm-4">
                                    <label for="notes">Department Notes</label>
                                    <textarea class="form-control" id="notes" style="height: 88px;" name="notes">{{ $asset->notes }}</textarea>
                                    @error('notes')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-12">

                                    @if ($asset->asset_status == 'assigned')
                                        <button type="button" class="btn mb-2 me-4 w-25 btn-light-danger">Assigned to:
                                            {{ $asset->currentAssignment->user->first_name }}
                                            {{ $asset->currentAssignment->user->last_name }}</button>
                                    @endif
                                    @if ($asset->asset_status == 'unassigned')
                                        <button type="button" class="btn mb-2 me-4 w-25 btn-primary">Assignment Status:
                                            Unassigned </button>
                                    @endif


                                </div>

                                <div class="col-sm-12">
                                    @if ($asset->currentAssignment == null)
                                        <a href="{{ route('admin.assign') }}" class="btn btn-secondary w-25">Assign
                                            Asset</a>
                                    @endif

                                    @if ($asset->currentAssignment != null)
                                        @if (
                                            $asset->asset_status == 'assigned' and
                                                $asset->currentAssignment->return_requested == false and
                                                $asset->currentAssignment->returned_at == null)
                                            <a href="{{ route('admin.return', ['asset' => $asset->id, 'user' => $asset->currentAssignment->user_id]) }}"
                                                class="btn btn-primary w-25">Initiate Return</a>
                                        @endif
                                        @if ($asset->currentAssignment->return_requested == true and $asset->currentAssignment->returned_at == null)
                                            <a class="btn btn-light-danger w-25">Return Requested</a>
                                        @endif
                                    @endif



                                </div>



                            </div>
                            <div class="row mb-4">
                                @if ($asset->asset_status == 'unassigned')
                                    <div class="col-sm-6">

                                        <label for="asset_status">Asset Status</label>

                                        <select name="asset_status" id="asset_status" class="form-control">
                                            <option value="" selected> Choose Option</option>
                                            <option value="faulty">Faulty</option>
                                            <option value="disposed">Disposed</option>
                                            <option value="sold">Sold</option>
                                        </select>


                                    </div>
                                @endif
                            </div>
                            <div class="row mb-4">

                                <label>Images (At the time of Asset Add)</label>

                                @foreach ($asset->images as $image)
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-4">
                                        <a href="{{ asset('uploads/assets/' . $image) }}"
                                            class="defaultGlightbox glightbox-content">
                                            <img src="{{ asset('uploads/assets/' . $image) }}" alt="image"
                                                class="img-fluid" />
                                        </a>
                                    </div>
                                @endforeach



                            </div>
                            <div class="row mb-4">

                                <label>Invoice (At the time of Asset Add)</label>

                                @foreach ($asset->invoice as $invoice)
                                    <div class="mb-4">

                                        <a href="{{ asset('uploads/assets/' . $invoice) }}" class="btn btn-light-primary"
                                            target="_blank">View Invoice - {{ $invoice }}</a>
                                    </div>
                                @endforeach



                            </div>




                        </div>



                    </div>

                    <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4">
                        <div class="widget-content widget-content-area blog-create-section">

                            <div class="row">
                                

                                <div class="col-xxl-12 col-md-12 mb-4">

                                    <label for="asset-images">Upload Images / Files</label>
                                    <div class="multiple-file-upload">
                                        <input type="file" name="image_path[]" id="asset-images" multiple
                                            class="form-control ">
                                        @error('image_path')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- <input type="file" name="images[]" id="asset-images"
                                            class="filepond file-upload-multiple" data-allow-reorder="true"
                                            data-max-file-size="10MB" data-max-files="5" multiple> --}}
                                </div>

                            </div>

                            <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                <a href="{{ route('admin.assets') }}" class="btn btn-light-danger w-100">Cancel</a>
                                <div class="separator"><br></div>
                                <button id="submitButton" class="btn btn-primary w-100" disabled>Update</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>

            <div class="faq">

                <div class="faq-layouting layout-spacing">

                    <div class="fq-tab-section">
                        <div class="row">
                            <div class="col-md-12">

                                <h2 class="align-left">Activity Timeline</h2>

                                <div class="row">

                                    <div class="col-lg-12">

                                        <div class="accordion" id="activity">

                                            @foreach ($activityTimeline as $activity)
                                                <div class="card">
                                                    <div class="card-header" id="fqheading{{ $activity->id }}">
                                                        <div class="mb-0" data-bs-toggle="collapse" role="navigation"
                                                            data-bs-target="#fqcollapse{{ $activity->id }}"
                                                            aria-expanded="false"
                                                            aria-controls="fqcollapse{{ $activity->id }}">
                                                            <span
                                                                class="faq-q-title">{{ Carbon\Carbon::parse($activity->action_date)->diffForHumans() }}
                                                                <span class="badge badge-light-secondary"> Asset
                                                                    {{ $activity->action }} </span>
                                                                ({{ Carbon\Carbon::parse($activity->action_date)->format('d-M-Y h:i A') }})
                                                            </span>
                                                            <div class="icons"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-chevron-down">
                                                                    <polyline points="6 9 12 15 18 9"></polyline>
                                                                </svg></div>
                                                        </div>
                                                    </div>
                                                    <div id="fqcollapse{{ $activity->id }}" class="collapse"
                                                        aria-labelledby="fqheading{{ $activity->id }}"
                                                        data-bs-parent="#activity">
                                                        <div class="card-body">
                                                            <p>Details: {{ $activity->notes }}</p>
                                                            <p>Images:
                                                                @if ($activity->images)
                                                                    @foreach (json_decode($activity->images) as $image)
                                                                        <img src="{{ asset('uploads/assets/' . $image) }}"
                                                                            width="15%" height="15%"
                                                                            target="_blank">
                                                                    @endforeach
                                                                @endif
                                                            </p>


                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                            {{-- <div class="card">
                                                <div class="card-header" id="fqheadingThree">
                                                    <div class="mb-0" data-bs-toggle="collapse" role="navigation"
                                                        data-bs-target="#fqcollapseThree" aria-expanded="false"
                                                        aria-controls="fqcollapseThree">
                                                        <span class="faq-q-title">Sidebar not rendering CSS</span>
                                                        <div class="icons"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-chevron-down">
                                                                <polyline points="6 9 12 15 18 9"></polyline>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                                <div id="fqcollapseThree" class="collapse"
                                                    aria-labelledby="fqheadingThree" data-bs-parent="#activity">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                                            non cupidatat skateboard dolor brunch. Food truck quinoa
                                                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                            put a bird on it squid single-origin coffee nulla assumenda
                                                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                                            excepteur butcher vice lomo. Leggings occaecat craft beer
                                                            farm-to-table, raw denim aesthetic synth nesciunt you probably
                                                            haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header" id="fqheadingFour">
                                                    <div class="mb-0" data-bs-toggle="collapse" role="navigation"
                                                        data-bs-target="#fqcollapseFour" aria-expanded="false"
                                                        aria-controls="fqcollapseFour">
                                                        <span class="faq-q-title">Production Level Built</span>
                                                        <div class="icons"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-chevron-down">
                                                                <polyline points="6 9 12 15 18 9"></polyline>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                                <div id="fqcollapseFour" class="collapse" aria-labelledby="fqheadingFour"
                                                    data-bs-parent="#activity">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                                            non cupidatat skateboard dolor brunch. Food truck quinoa
                                                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                            put a bird on it squid single-origin coffee nulla assumenda
                                                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                                            excepteur butcher vice lomo. Leggings occaecat craft beer
                                                            farm-to-table, raw denim aesthetic synth nesciunt you probably
                                                            haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header" id="fqheadingFive">
                                                    <div class="mb-0" data-bs-toggle="collapse" role="navigation"
                                                        data-bs-target="#fqcollapseFive" aria-expanded="false"
                                                        aria-controls="fqcollapseFive">
                                                        <span class="faq-q-title">Compilation Issue</span>
                                                        <div class="icons"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-chevron-down">
                                                                <polyline points="6 9 12 15 18 9"></polyline>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                                <div id="fqcollapseFive" class="collapse" aria-labelledby="fqheadingFive"
                                                    data-bs-parent="#activity">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                                            non cupidatat skateboard dolor brunch. Food truck quinoa
                                                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                            put a bird on it squid single-origin coffee nulla assumenda
                                                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                                            excepteur butcher vice lomo. Leggings occaecat craft beer
                                                            farm-to-table, raw denim aesthetic synth nesciunt you probably
                                                            haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <div class="card-header" id="fqheadingSix">
                                                    <div class="mb-0" data-bs-toggle="collapse" role="navigation"
                                                        data-bs-target="#fqcollapseSix" aria-expanded="false"
                                                        aria-controls="fqcollapseSix">
                                                        <span class="faq-q-title">Getting started with starter kits</span>
                                                        <div class="icons"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-chevron-down">
                                                                <polyline points="6 9 12 15 18 9"></polyline>
                                                            </svg></div>
                                                    </div>
                                                </div>
                                                <div id="fqcollapseSix" class="collapse" aria-labelledby="fqheadingSix"
                                                    data-bs-parent="#activity">
                                                    <div class="card-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                            accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                                            non cupidatat skateboard dolor brunch. Food truck quinoa
                                                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua
                                                            put a bird on it squid single-origin coffee nulla assumenda
                                                            shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan
                                                            excepteur butcher vice lomo. Leggings occaecat craft beer
                                                            farm-to-table, raw denim aesthetic synth nesciunt you probably
                                                            haven't heard of them accusamus labore sustainable VHS.</p>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>



                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>



    </div>
@endsection
@section('pageleveljs')
    <script src="{{ asset('src/plugins/src/global/vendors.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginFileValidateType.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImagePreview.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageCrop.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageResize.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/FilePondPluginImageTransform.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/filepond/filepondPluginFileValidateSize.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ asset('src/plugins/src/glightbox/custom-glightbox.min.js') }}"></script>
    <script src="{{ asset('src/assets/js/apps/blog-create.js') }}"></script>
    <script src="{{ asset('src/plugins/src/flatpickr/flatpickr.js') }}"></script>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('editAssetForm');
            const submitButton = document.getElementById('submitButton');
            const originalValues = new FormData(form);

            form.addEventListener('input', function() {
                let modified = false;
                const currentValues = new FormData(form);

                for (let [key, value] of originalValues.entries()) {
                    if (currentValues.get(key) !== value) {
                        modified = true;
                        break;
                    }
                }

                submitButton.disabled = !modified;
            });
        });
    </script>
@endsection
