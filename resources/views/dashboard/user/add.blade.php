@extends('dashboard.master')

@section('title', 'New User')

@section('content')
    {{-- Content Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">New User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.users.index') }}">All Users</a></li>
                        <li class="breadcrumb-item active">New User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title">Create User Account</h3>
                        </div>

                        <div class="card-body">
                            {{-- Alerts --}}
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-ban"></i> Error!</h5>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                                    <p class="m-0">{{ session('success') }}</p>
                                </div>
                            @endif

                            <form action="{{ route('dashboard.users.store') }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                <div class="row">
                                    {{-- Left Column: Main Details --}}
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="name">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter full name" value="{{ old('name') }}" required />
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="username">Username <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="username"
                                                        name="username" placeholder="Enter username"
                                                        value="{{ old('username') }}" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="Enter email" value="{{ old('email') }}" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Password <span
                                                            class="text-danger">*</span></label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="password" placeholder="Enter password" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password-confirm">Confirm Password</label>
                                                    <input type="password" class="form-control" id="password-confirm"
                                                        name="password_confirmation" placeholder="Confirm password" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="about">About</label>
                                            <textarea id="about" name="about" placeholder="Short bio..." class="form-control" rows="4">{{ old('about') }}</textarea>
                                        </div>
                                    </div>

                                    {{-- Right Column: Settings & Profile --}}
                                    <div class="col-md-4">
                                        {{-- Profile Image --}}
                                        <div class="form-group">
                                            <label for="image">Profile Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image"
                                                    name="profile" accept="image/*" />
                                                <label class="custom-file-label" for="image">Choose file</label>
                                            </div>
                                            <div class="mt-3 text-center">
                                                <img id="imagepreview" class="img-fluid img-thumbnail d-none"
                                                    style="max-height: 200px; width: 200px; border-radius: 50%; object-fit: cover;" />
                                            </div>
                                        </div>

                                        <hr>

                                        {{-- Role --}}
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <select class="form-control" name="role" id="role">
                                                <option value="1" {{ old('role') == 1 ? 'selected' : '' }}>Visitor
                                                </option>
                                                <option value="2" {{ old('role') == 2 ? 'selected' : '' }}>Author
                                                </option>
                                                <option value="3" {{ old('role') == 3 ? 'selected' : '' }}>Admin
                                                </option>
                                            </select>
                                        </div>

                                        {{-- Status --}}
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0" {{ old('status', 0) == 0 ? 'selected' : '' }}>
                                                    Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-user-plus mr-1"></i> Create User
                                        </button>
                                        <a href="{{ route('dashboard.users.index') }}" class="btn btn-secondary ml-2">
                                            Cancel
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('assets/dashboard/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
    <script>
        $(document).ready(function() {
            // 1. Image Preview
            function readURL(input) {
                if (input.files && input.files[0] && input.files[0].type.includes("image")) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagepreview').removeClass("d-none");
                        $('#imagepreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $("#image").val('');
                    $('#imagepreview').addClass("d-none");
                    Swal.fire({
                        icon: "error",
                        text: "Please select a valid image file!"
                    });
                }
            }

            $("#image").change(function() {
                readURL(this);
                // Update file input label
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').html(fileName ? fileName : 'Choose file');
            });
        });
    </script>
@endpush
