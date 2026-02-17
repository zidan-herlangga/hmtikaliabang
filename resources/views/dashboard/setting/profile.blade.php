@extends('dashboard.master')

@section('title', 'Profile Settings')

@section('content')
    {{-- Content Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">Profile Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Settings</li>
                        <li class="breadcrumb-item active">Profile</li>
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
                            <h3 class="card-title">Update Your Information</h3>
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

                            <form action="{{ route('dashboard.settings.profile.update') }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                <div class="row">
                                    {{-- Left Column: Basic Info & Photo --}}
                                    <div class="col-md-6">
                                        {{-- Profile Photo --}}
                                        <div class="form-group text-center">
                                            <img id="profilepreview"
                                                src="{{ asset('uploads/author/' . ($user->profile ?? 'default.webp')) }}"
                                                alt="Profile Photo" class="img-thumbnail rounded-circle mb-3"
                                                style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.1);" />

                                            <div class="custom-file mx-auto" style="max-width: 300px;">
                                                <input type="file" class="custom-file-input" id="profile"
                                                    name="profile" accept="image/*" />
                                                <label class="custom-file-label" for="profile">Change Photo</label>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                            class="fas fa-user"></i></span></div>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ old('name', $user->name) }}" required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                            class="fas fa-at"></i></span></div>
                                                <input type="text" class="form-control" id="username" name="username"
                                                    value="{{ old('username', $user->username) }}" required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                            class="fas fa-envelope"></i></span></div>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="{{ old('email', $user->email) }}" required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="about">About Me</label>
                                            <textarea class="form-control" id="about" name="about" rows="4" placeholder="Write a short bio...">{{ old('about', $user->about) }}</textarea>
                                        </div>
                                    </div>

                                    {{-- Right Column: Social Links --}}
                                    <div class="col-md-6">
                                        <h5 class="text-muted mb-3 mt-2"><i class="fas fa-share-alt mr-2"></i>Social Media
                                            Profiles</h5>

                                        <div class="form-group">
                                            <label for="facebook">Facebook</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span
                                                        class="input-group-text bg-primary text-white"><i
                                                            class="fab fa-facebook-f"></i></span></div>
                                                <input type="url" class="form-control" id="facebook"
                                                    name="facebook" placeholder="https://facebook.com/username"
                                                    value="{{ old('facebook', $user->facebook) }}" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="twitter">Twitter</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span
                                                        class="input-group-text bg-info text-white"><i
                                                            class="fab fa-twitter"></i></span></div>
                                                <input type="url" class="form-control" id="twitter" name="twitter"
                                                    placeholder="https://twitter.com/username"
                                                    value="{{ old('twitter', $user->twitter) }}" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="instagram">Instagram</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span
                                                        class="input-group-text bg-danger text-white"><i
                                                            class="fab fa-instagram"></i></span></div>
                                                <input type="url" class="form-control" id="instagram"
                                                    name="instagram" placeholder="https://instagram.com/username"
                                                    value="{{ old('instagram', $user->instagram) }}" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="linkedin">LinkedIn</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span
                                                        class="input-group-text bg-primary text-white"
                                                        style="background-color: #007bb5 !important;"><i
                                                            class="fab fa-linkedin-in"></i></span></div>
                                                {{-- Fixed Bug: Value was pointing to $user->instagram --}}
                                                <input type="url" class="form-control" id="linkedin"
                                                    name="linkedin" placeholder="https://linkedin.com/in/username"
                                                    value="{{ old('linkedin', $user->linkedin) }}" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="youtube">YouTube</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span
                                                        class="input-group-text bg-danger text-white"><i
                                                            class="fab fa-youtube"></i></span></div>
                                                <input type="url" class="form-control" id="youtube" name="youtube"
                                                    placeholder="https://youtube.com/c/channel"
                                                    value="{{ old('youtube', $user->youtube) }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-save mr-1"></i> Save Changes
                                        </button>
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
                        $('#profilepreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $("#profile").val('');
                    Swal.fire({
                        icon: "error",
                        text: "Please select a valid image file!"
                    });
                }
            }

            $("#profile").change(function() {
                readURL(this);
                // Update file input label
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').html(fileName ? fileName : 'Change Photo');
            });
        });
    </script>
@endpush
