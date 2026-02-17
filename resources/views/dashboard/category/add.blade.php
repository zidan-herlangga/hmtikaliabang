@extends('dashboard.master')

@section('title', 'New Category - ' . config('app.name'))

@section('content')
    {{-- Content Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">Kategori Baru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">Semua Kategori</a>
                        </li>
                        <li class="breadcrumb-item active">Kategori Baru</li>
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
                            <h3 class="card-title">Detail Kategori</h3>
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
                                    <h5><i class="icon fas fa-check"></i> Sukses!</h5>
                                    <p class="m-0">{{ session('success') }}</p>
                                </div>
                            @endif

                            <form action="{{ route('dashboard.categories.store') }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                <div class="row">
                                    {{-- Left Column: Details --}}
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="title">Judul <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                placeholder="Masukkan judul kategori" value="{{ old('title') }}"
                                                required />
                                        </div>
                                        <div class="form-group">
                                            <label for="slug">Slug <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="slug" name="slug"
                                                placeholder="Otomatis-generate slug" value="{{ old('slug') }}" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Deskripsi</label>
                                            <textarea id="description" name="description" placeholder="Masukkan deskripsi kategori" class="form-control"
                                                rows="4">{{ old('description') }}</textarea>
                                        </div>
                                    </div>

                                    {{-- Right Column: Media & Settings --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="image">Gambar</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image"
                                                    name="image" accept="image/*" />
                                                <label class="custom-file-label" for="image">Pilih file</label>
                                            </div>
                                            {{-- Image Preview --}}
                                            <div class="mt-3 text-center">
                                                <img id="imagepreview" class="img-fluid img-thumbnail d-none"
                                                    style="max-height: 200px;" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Aktif
                                                </option>
                                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Tidak
                                                    Aktif
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-save mr-1"></i> Buat Kategori
                                        </button>
                                        <a href="{{ route('dashboard.categories.index') }}" class="btn btn-secondary ml-2">
                                            Batal
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
    {{-- Plugins Libraries --}}
    <script src="{{ asset('assets/dashboard/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/speakingurl/speakingurl.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/slugify/slugify.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Auto-generate slug from title
            $('#title').on("input", function() {
                $('#slug').val($.slugify($('#title').val()));
            });

            // Image Preview Function
            function readURL(input) {
                if (input.files && input.files[0] && input.files[0].type.includes("image")) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagepreview').removeClass("d-none");
                        $('#imagepreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $("#image").val(''); // Reset input
                    $('#imagepreview').addClass("d-none");
                    Swal.fire({
                        icon: "error",
                        text: "Please select a valid image file!"
                    });
                }
            }

            $("#image").change(function() {
                readURL(this);
            });

            // Update file input label with filename
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });
        });
    </script>
@endpush
