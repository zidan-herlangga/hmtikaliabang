@extends('dashboard.master')

@section('title', 'Edit Category - ' . config('app.name'))

@push('styles')
    {{-- Select2 CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/select2/css/select2.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" />
@endpush

@section('content')
    {{-- Content Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">Edit Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">All Categories</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Category</li>
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
                            <h3 class="card-title">Update Category Details</h3>
                        </div>

                        <div class="card-body">
                            {{-- Alert Error --}}
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

                            {{-- Alert Success --}}
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                                    <p class="m-0">{{ session('success') }}</p>
                                </div>
                            @endif

                            <form action="{{ route('dashboard.categories.update', $category->id) }}"
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    {{-- Left Column --}}
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                placeholder="Enter title" value="{{ old('title', $category->title) }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Slug</label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                placeholder="Enter slug" value="{{ old('slug', $category->slug) }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" name="description" placeholder="Enter description" class="form-control" rows="4">{{ old('description', $category->description) }}</textarea>
                                        </div>
                                    </div>

                                    {{-- Right Column --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image"
                                                    name="image" accept="image/*" />
                                                <label class="custom-file-label" for="image">Choose new file</label>
                                            </div>
                                            {{-- Preview Image --}}
                                            <div class="mt-3 text-center">
                                                <img id="imagepreview" class="img-fluid img-thumbnail"
                                                    style="max-height: 200px;"
                                                    src="{{ asset('uploads/category/' . ($category->image ?? 'default.webp')) }}"
                                                    alt="Current Image" />
                                            </div>
                                            <small class="text-muted d-block mt-1">Leave empty to keep current
                                                image.</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="1"
                                                    {{ old('status', $category->status) == 1 ? 'selected' : '' }}>Active
                                                </option>
                                                <option value="0"
                                                    {{ old('status', $category->status) == 0 ? 'selected' : '' }}>Inactive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-save mr-1"></i> Update Category
                                        </button>
                                        <a href="{{ route('dashboard.categories.index') }}" class="btn btn-secondary ml-2">
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
    {{-- Plugin Libraries --}}
    <script src="{{ asset('assets/dashboard/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/speakingurl/speakingurl.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/slugify/slugify.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Initialize Select2 (if used)
            $('.select2').select2({
                theme: 'bootstrap4'
            });

            // Auto-generate slug from title
            $('#title').on("input", function() {
                $('#slug').val($.slugify($('#title').val()));
            });

            // Image Preview Function
            function readURL(input) {
                if (input.files && input.files[0] && input.files[0].type.includes("image")) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        // Update the preview src
                        $('#imagepreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else if (input.files && input.files[0]) {
                    // If file selected but not image
                    $("#image").val('');
                    Swal.fire({
                        icon: "error",
                        text: "Select a valid image file!"
                    });
                }
            }

            $("#image").change(function() {
                readURL(this);
                // Update label
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').html(fileName ? fileName : 'Choose new file');
            });
        });
    </script>
@endpush
