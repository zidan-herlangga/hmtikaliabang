@extends('dashboard.master')

@section('title', 'New Media')

@section('content')
    {{-- Content Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">New Media</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.media.index') }}">All Media</a></li>
                        <li class="breadcrumb-item active">Upload</li>
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
                            <h3 class="card-title">Upload New Media</h3>
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

                            <form action="{{ route('dashboard.media.store') }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="image">Select Image(s)</label>
                                            <div class="custom-file">
                                                {{-- Added 'multiple' attribute for bulk upload --}}
                                                <input type="file" class="custom-file-input" id="image"
                                                    name="image[]" accept="image/*" multiple required />
                                                <label class="custom-file-label" for="image">Choose file(s)</label>
                                            </div>
                                            <small class="text-muted d-block mt-1">You can select multiple images to upload
                                                at once.</small>
                                        </div>
                                    </div>
                                </div>

                                {{-- Image Preview Area --}}
                                <div class="row mt-3 mb-4" id="preview-container" style="display: none;">
                                    <div class="col-12">
                                        <h5 class="text-muted mb-3">Selected Files Preview:</h5>
                                        <div class="d-flex flex-wrap gap-2" id="image-preview-list">
                                            {{-- Preview images will be injected here by JS --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-cloud-upload-alt mr-1"></i> Upload Images
                                        </button>
                                        <a href="{{ route('dashboard.media.index') }}" class="btn btn-secondary ml-2">
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
            // 1. Update file input label with file names
            $('.custom-file-input').on('change', function() {
                let files = $(this)[0].files;
                let label = $(this).next('.custom-file-label');

                if (files.length > 1) {
                    label.html(files.length + ' files selected');
                } else if (files.length === 1) {
                    label.html(files[0].name);
                } else {
                    label.html('Choose file(s)');
                }
            });

            // 2. Image Preview Logic
            $('#image').on('change', function(e) {
                var files = e.target.files;
                var previewContainer = $('#preview-container');
                var previewList = $('#image-preview-list');

                previewList.empty(); // Clear previous previews

                if (files.length > 0) {
                    previewContainer.show();

                    $.each(files, function(index, file) {
                        if (file.type.match('image.*')) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                var imgWrapper = $(
                                    '<div class="position-relative" style="width: 120px; height: 120px;"></div>'
                                    );
                                var img = $(
                                    '<img class="img-thumbnail" style="width: 100%; height: 100%; object-fit: cover;">'
                                    );
                                img.attr('src', e.target.result);

                                // Optional: Add filename text
                                var fileName = $(
                                    '<small class="d-block text-center text-truncate mt-1" style="max-width: 120px;"></small>'
                                    );
                                fileName.text(file.name);

                                imgWrapper.append(img);
                                imgWrapper.append(fileName);
                                previewList.append(imgWrapper);
                            }

                            reader.readAsDataURL(file);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Invalid File',
                                text: 'File "' + file.name + '" is not a valid image.'
                            });
                            // Reset input (optional, or just skip the file)
                            // $('#image').val('');
                        }
                    });
                } else {
                    previewContainer.hide();
                }
            });
        });
    </script>
@endpush
