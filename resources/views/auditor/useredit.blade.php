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
                        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
                                    <form id="editUserForm" action="{{ route('admin.user.update', $user->id) }}"
                                        method="POST" class="section general-info">
                                        @csrf
                                        @method('PUT')

                                        <div class="info">
                                            <h6 class="">Edit User</h6>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">

                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="first_name">First Name</label>
                                                                            <input type="text" class="form-control mb-3"
                                                                                name="first_name" id="first_name"
                                                                                placeholder="First Name"
                                                                                value="{{ $user->first_name }}">
                                                                            @error('first_name')
                                                                                {{ $message }}
                                                                            @enderror

                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="last_name">Last Name</label>
                                                                            <input type="text" class="form-control mb-3"
                                                                                id="last_name" name="last_name"
                                                                                placeholder="Last Name"
                                                                                value="{{ $user->last_name }}">
                                                                                @error('last_name')
                                                                                {{ $message }}
                                                                            @enderror
                                                                            
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="role">Role</label>
                                                                            <select class="form-select mb-3" name="role"
                                                                                id="role" required>

                                                                                <option value="user"
                                                                                    @if ($user->role == 'user') selected @endif>
                                                                                    user</option>
                                                                                <option value="admin"
                                                                                    @if ($user->role == 'admin') selected @endif>
                                                                                    admin</option>
                                                                            </select>
                                                                            @error('role')
                                                                                {{ $message }}
                                                                            @enderror
                                                                           
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="email">Email Id</label>
                                                                            <input type="email" class="form-control mb-3"
                                                                                id="email" name="email"
                                                                                placeholder="Email ID"
                                                                                value="{{ $user->email }}">
                                                                                @error('email')
                                                                                {{ $message }}
                                                                            @enderror
                                                                           
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="employee_id">Employee ID</label>
                                                                            <input type="text" class="form-control mb-3"
                                                                                id="employee_id" name="employee_id"
                                                                                placeholder="abc@example.com"
                                                                                value="{{ $user->employee_id }}">
                                                                              
                                                                            @error('employee_id')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="password">Password</label>
                                                                            <input type="password" class="form-control mb-3"
                                                                                id="password" name="password"
                                                                                placeholder="*********">
                                                                                @error('password')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </div>
                                                                    </div>





                                                                    <div class="col-md-12 mt-1">
                                                                        <div class="form-group text-end">
                                                                            <a href="{{ route('admin.users') }}"
                                                                                class="btn btn-danger w-25">Cancel</a>
                                                                            <button id="submitButton"
                                                                                class="btn btn-secondary w-25">Update</button>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('editUserForm');
            const submitButton = document.getElementById('submitButton');

            // Capture original values of the form fields
            const originalValues = Array.from(new FormData(form).entries())
                .reduce((acc, [key, value]) => ({
                    ...acc,
                    [key]: value
                }), {});

            // Disable the button initially
            submitButton.disabled = true;

            // Function to check if form values have changed
            function isFormModified() {
                const currentValues = new FormData(form);
                for (let [key, value] of currentValues.entries()) {
                    if (originalValues[key] !== value) {
                        return true; // A change is detected
                    }
                }
                return false;
            }

            // Listen for changes to the form
            form.addEventListener('input', function() {
                submitButton.disabled = !isFormModified();
            });

            form.addEventListener('change', function() {
                submitButton.disabled = !isFormModified();
            });
        });
    </script>
@endsection
