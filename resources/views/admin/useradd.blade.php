@extends('layout.app')
@section('pagelevelcss')
    <link href="{{ asset('src/assets/css/light/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('src/assets/css/dark/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('usermanagement-active')
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
                        <li class="breadcrumb-item active" aria-current="page">Add New User</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->

            <div class="account-settings-container layout-top-spacing">

                <div class="account-content">

                    <div class="tab-content" id="animateLineContent-4">
                        <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel"
                            aria-labelledby="animated-underline-home-tab">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form action="{{ route('admin.user.store') }}" method="POST" class="section general-info">
                                        @csrf
                                        <div class="info">
                                            <h6 class="">Add New User</h6>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                     
                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="first_name">First Name</label>
                                                                            <input type="text"
                                                                                class="form-control mb-3" name="first_name" id="first_name"
                                                                                placeholder="First Name" required>
                                                                                
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="last_name">Last Name</label>
                                                                            <input type="text"
                                                                                class="form-control mb-3" id="last_name" name="last_name"
                                                                                placeholder="Last Name" required
                                                                                >
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="role">Role</label>
                                                                            <select class="form-select mb-3" name="role"
                                                                                id="role" required>
                                                                                
                                                                                <option selected>user</option>
                                                                                <option>admin</option>
                                                                                <option>hr</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="email">Email Id</label>
                                                                            <input type="email"
                                                                                class="form-control mb-3" id="email" name="email"
                                                                                placeholder="Email ID" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="password">Password</label>
                                                                            <input type="text"
                                                                                class="form-control mb-3" id="password" name="password"
                                                                                placeholder="password" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="password_confirmation">Confirm Password</label>
                                                                            <input type="text"
                                                                                class="form-control mb-3" id="password_confirmation" name="password_confirmation"
                                                                                placeholder="Confirm password" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="employee_id">Employee ID</label>
                                                                            <input type="text"
                                                                                class="form-control mb-3" id="employee_id" name="employee_id"
                                                                                placeholder="abc@example.com" required>
                                                                        </div>
                                                                    </div>
                                                                  
                                                                  
                                                                   


                                                                    <div class="col-md-12 mt-1">
                                                                        <div class="form-group text-end">
                                                                            <button class="btn btn-secondary w-25">Save</button>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
    <script src="{{ asset('src/assets/js/users/account-settings.js') }}"></script>
@endsection
