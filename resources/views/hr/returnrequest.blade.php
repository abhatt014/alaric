@extends('layout.hrapp')
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
                        <li class="breadcrumb-item"><a href="#">HR</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Process Return</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->
            {{-- {{ route('admin.process',$assetReturnRequest->id) }} --}}
            <form enctype="multipart/form-data" action="{{ route('hr.processreturn', $assetReturnRequest->id) }}"
                method="post">
                @csrf
                <div class="row mb-4 layout-spacing layout-top-spacing">

                    <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

                        <div class="widget-content widget-content-area blog-create-section">

                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <label for="type">Assigned to</label>
                                    @foreach ($users as $user)
                                        <input id="type" type="text" name="assigned_to" class="form-control"
                                            value="{{ $user->first_name }} {{ $user->last_name }}" readonly>
                                    @endforeach


                                </div>
                                <div class="col-sm-4">
                                    <label for="type">Type</label>
                                    @foreach ($assets as $asset)
                                        <input id="type" type="text" name="asset_type" class="form-control"
                                            value="{{ $asset->assetType->type_name }}" readonly>
                                    @endforeach


                                </div>
                                <div class="col-sm-4">
                                    <label for="brand">Brand</label>
                                    @foreach ($assets as $asset)
                                        <input id="brand" type="text" name="asset_brand" class="form-control"
                                            value="{{ $asset->asset_brand }}" readonly>
                                    @endforeach

                                </div>

                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <label for="model">Model</label>
                                    @foreach ($assets as $asset)
                                        <input id="model" type="text" name="asset_model" class="form-control"
                                            value="{{ $asset->asset_model }}" readonly>
                                    @endforeach


                                </div>
                                <div class="col-sm-4">
                                    <label for="name">Name</label>
                                    @foreach ($assets as $asset)
                                        <input id="name" type="text" name="asset_name" class="form-control"
                                            value="{{ $asset->asset_name }}" readonly>
                                    @endforeach

                                </div>

                                <div class="col-sm-4">
                                    <label for="serial">Serial</label>
                                    @foreach ($assets as $asset)
                                        <input id="serial" type="text" name="asset_serial" class="form-control"
                                            value="{{ $asset->asset_serial }}" readonly>
                                    @endforeach

                                </div>


                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <label for="condition">Condition</label>


                                    <input id="condition" type="text" name="condition" class="form-control"
                                        value="{{ $assetReturnRequest->condition }}" readonly>


                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-4">
                                    <label>Department Notes</label>
                                    <textarea class="form-control" id="invoice-detail-notes" name="return_notes" style="height: 88px;" value=""></textarea>
                                </div>


                            </div>




                        </div>



                    </div>

                    <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0 mt-4">
                        <div class="widget-content widget-content-area blog-create-section">

                            <div class="row">


                                <div class="col-xxl-12 col-md-12 mb-4">

                                    <label for="asset-images">Upload Images</label>
                                    <input type="file" name="image_path[]" id="asset-images" multiple=""
                                        class="form-control " required="">


                                </div>

                                <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-warning w-100">Back</a>

                                    <div class="separator"><br></div>
                                    <button class="btn btn-secondary w-100">Accept Return</button>
            </form>


            <div class="separator"><br></div>
            <a href=" {{ route('admin.cancelreturn', $assetReturnRequest->id) }}" class="btn btn-danger w-100">Reject
                Return</a>

        </div>

    </div>
    </div>
    </div>

    </div>


    </div>
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
                                                    data-bs-target="#fqcollapse{{ $activity->id }}" aria-expanded="false"
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
                                                                    width="15%" height="15%" target="_blank">
                                                            @endforeach
                                                        @endif
                                                    </p>


                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


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
