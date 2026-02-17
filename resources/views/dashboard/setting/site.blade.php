@extends('dashboard.master')

@section('title', 'Site Settings')

@section('content')
    {{-- Content Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">Site Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Settings</li>
                        <li class="breadcrumb-item active">Site</li>
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
                            <h3 class="card-title">General Configuration</h3>
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

                            <form action="{{ route('dashboard.settings.site.update') }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                <div class="row">
                                    {{-- Left Column: Identity & Media --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="site_title">Site Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="site_title" name="site_title"
                                                value="{{ old('site_title', $sitesettings->site_title) }}" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="tagline">Tagline</label>
                                            <input type="text" class="form-control" id="tagline" name="tagline"
                                                placeholder="Brief site description"
                                                value="{{ old('tagline', $sitesettings->tagline) }}" />
                                        </div>

                                        <hr class="my-4">

                                        {{-- Logo Dark --}}
                                        <div class="form-group">
                                            <label>Logo Dark (For Dark Backgrounds)</label>
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="bg-dark p-3 rounded mr-3"
                                                    style="width: 150px; height: 80px; display: flex; align-items: center; justify-content: center;">
                                                    <img id="logo_darkpreview"
                                                        src="{{ asset('uploads/logo/' . $sitesettings->logo_dark) }}"
                                                        class="img-fluid" style="max-height: 60px;" />
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="logo_dark"
                                                        name="logo_dark" accept="image/*" />
                                                    <label class="custom-file-label" for="logo_dark">Choose file</label>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Logo Light --}}
                                        <div class="form-group">
                                            <label>Logo Light (For Light Backgrounds)</label>
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="bg-white border p-3 rounded mr-3"
                                                    style="width: 150px; height: 80px; display: flex; align-items: center; justify-content: center;">
                                                    <img id="logo_lightpreview"
                                                        src="{{ asset('uploads/logo/' . $sitesettings->logo_light) }}"
                                                        class="img-fluid" style="max-height: 60px;" />
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="logo_light"
                                                        name="logo_light" accept="image/*" />
                                                    <label class="custom-file-label" for="logo_light">Choose file</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="copyright_text">Copyright Text</label>
                                            <textarea id="copyright_text" name="copyright_text" rows="2" class="form-control">{{ old('copyright_text', $sitesettings->copyright_text) }}</textarea>
                                        </div>
                                    </div>

                                    {{-- Right Column: SEO & Settings --}}
                                    <div class="col-md-6">
                                        <h5 class="text-muted mb-3"><i class="fas fa-search mr-2"></i>SEO Settings</h5>

                                        <div class="form-group">
                                            <label for="description">Meta Description</label>
                                            <textarea id="description" name="description" rows="4" class="form-control"
                                                placeholder="Used for search engine optimization">{{ old('description', $sitesettings->description) }}</textarea>
                                            <small class="text-muted">Recommended length: 50-160 characters.</small>
                                        </div>

                                        <hr class="my-4">

                                        <h5 class="text-muted mb-3"><i class="fas fa-cogs mr-2"></i>Functionality</h5>

                                        <div
                                            class="form-group d-flex justify-content-between align-items-center p-3 bg-light rounded">
                                            <div>
                                                <label class="mb-0 font-weight-bold">Enable Registration</label>
                                                <p class="text-muted mb-0 small">Allow new users to create an account.</p>
                                            </div>
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" name="enable_registration"
                                                    id="enable_registration" value="1"
                                                    {{ old('enable_registration', $sitesettings->enable_registration) ? 'checked' : '' }} />
                                                <label for="enable_registration"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-save mr-1"></i> Save Settings
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
            // Function to read and preview image
            function readURL(input, previewId) {
                if (input.files && input.files[0] && input.files[0].type.includes("image")) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $(previewId).attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);

                    // Update custom file label
                    let fileName = $(input).val().split('\\').pop();
                    $(input).next('.custom-file-label').html(fileName);
                } else {
                    $(input).val('');
                    Swal.fire({
                        icon: "error",
                        text: "Please select a valid image file!"
                    });
                }
            }

            $("#logo_dark").change(function() {
                readURL(this, "#logo_darkpreview");
            });

            $("#logo_light").change(function() {
                readURL(this, "#logo_lightpreview");
            });
        });
    </script>
@endpush
