@extends('dashboard.master')

@section('title', 'New Post')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/select2/css/select2.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" />

    {{-- QUILL CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

    <style>
        /* Penting: Agar Toolbar Quill tidak tertimpa elemen lain (misal header admin) */
        .ql-toolbar {
            z-index: 100 !important;
            position: relative;
            /* Warna gelap */
            /* border-color: #6c757d; */
        }

        /* Style Editor Area */
        #quill-editor {
            min-height: 300px;
            font-size: 16px;
            background-color: #1e1e2e;
            /* Dark background */
            border-color: #6c757d;
            border-bottom-left-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }

        /* Warna teks putih di dalam editor */
        #quill-editor .ql-editor {
            color: #ffffff;
        }

        /* Placeholder */
        #quill-editor .ql-editor.ql-blank::before {
            color: rgba(255, 255, 255, 0.4);
            font-style: normal;
        }

        /* Style Heading Saat Ngetik (Agar kelihatan beda) */
        #quill-editor h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #fff;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        #quill-editor h2 {
            font-size: 2rem;
            font-weight: bold;
            color: #f3f4f6;
            margin-bottom: 0.8rem;
        }

        #quill-editor h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #e5e7eb;
            margin-bottom: 0.6rem;
        }

        #quill-editor p {
            color: #d1d5db;
            margin-bottom: 1rem;
        }

        /* Agar dropdown Quill kelihatan */
        .ql-picker-options {
            z-index: 101 !important;
        }

        .ql-picker-item:hover,
        .ql-picker-label:hover {
            color: #fff;
        }
    </style>
@endpush

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">New Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.posts.index') }}">All Posts</a></li>
                        <li class="breadcrumb-item active">New Post</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title">Create New Post</h3>
                        </div>

                        <div class="card-body">
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

                            <form action="{{ route('dashboard.posts.store') }}" enctype="multipart/form-data" method="POST"
                                id="postForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputTitle">Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputTitle" name="title"
                                                placeholder="Enter post title" value="{{ old('title') }}" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSlug">Slug <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputSlug" name="slug"
                                                placeholder="Auto-generated slug" value="{{ old('slug') }}" required />
                                        </div>

                                        <div class="form-group">
                                            <label>Content</label>
                                            {{-- ID diubah menjadi quill-editor agar spesifik --}}
                                            <div id="quill-editor">{{ old('content') }}</div>
                                            <input type="hidden" name="content" id="content-hidden">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputCategory">Category</label>
                                            <select class="form-control select2" name="category" id="inputCategory"
                                                style="width: 100%;">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputTags">Tags</label>
                                            <select multiple class="form-control select2" name="tags[]" id="inputTags"
                                                style="width: 100%;">
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Thumbnail</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputThumbnail"
                                                    name="thumbnail" accept="image/*" />
                                                <label class="custom-file-label" for="inputThumbnail">Choose file</label>
                                            </div>
                                            <div class="mt-3 text-center">
                                                <img id="thumbnailpreview" class="img-fluid img-thumbnail d-none"
                                                    style="max-height: 200px;" />
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="form-group d-flex justify-content-between align-items-center">
                                            <label class="mb-0">Featured</label>
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" name="featured" id="featured" value="1" />
                                                <label for="featured"></label>
                                            </div>
                                        </div>

                                        <div class="form-group d-flex justify-content-between align-items-center">
                                            <label class="mb-0">Comments</label>
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" name="comment" id="comment" value="1"
                                                    checked />
                                                <label for="comment"></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputStatus">Status</label>
                                            <select class="form-control" name="status" id="inputStatus">
                                                @if (auth()->user()->role != 1)
                                                    <option value="1">Publish</option>
                                                @endif
                                                <option value="0">Draft</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-save mr-1"></i>
                                            Save Post</button>
                                        <a href="{{ route('dashboard.posts.index') }}"
                                            class="btn btn-secondary ml-2">Cancel</a>
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
    <script src="{{ asset('assets/dashboard/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/speakingurl/speakingurl.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/slugify/slugify.min.js') }}"></script>

    {{-- QUILL JS --}}
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script>
        $(document).ready(function() {
            // 1. Inisialisasi Quill dengan ID yang spesifik (#quill-editor)
            // Pastikan selector di sini sama dengan ID di HTML atas
            const quill = new Quill('#quill-editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        // --- TOMBOL HEADING (INI YANG HILANG SEBELUMNYA) ---
                        [{
                            'header': [1, 2, 3, false]
                        }],

                        // Style
                        ['bold', 'italic', 'underline', 'strike'],
                        ['blockquote', 'code-block'],

                        // List & Align
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'align': []
                        }],

                        // Color & Media
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        ['link', 'image'],

                        ['clean']
                    ]
                }
            });

            // 2. Submit Handler
            $("#postForm").on('submit', function() {
                // Ambil HTML dari dalam editor
                let html = quill.root.innerHTML;
                // Masukkan ke input hidden
                $('#content-hidden').val(html);
            });

            // 3. Slug Logic
            $('#inputTitle').on("input", function() {
                $('#inputSlug').val($.slugify($('#inputTitle').val()));
            });

            // 4. Select2
            $('.select2').select2({
                theme: 'bootstrap4',
                tags: true
            });

            // 5. Image Preview
            $("#inputThumbnail").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#thumbnailpreview').removeClass('d-none').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                    $(this).next('.custom-file-label').html(this.files[0].name);
                }
            });
        });
    </script>
@endpush
