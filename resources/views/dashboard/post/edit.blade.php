@extends('dashboard.master')

@section('title', 'Edit Post')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/select2/css/select2.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" />

    {{-- QUILL CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

    <style>
        /* Agar Toolbar Quill tidak tertimpa elemen lain */
        .ql-toolbar {
            z-index: 100 !important;
            position: relative;
            border-color: #6c757d;
        }

        /* Style Editor Area */
        #quill-editor {
            min-height: 300px;
            font-size: 16px;
            background-color: #1e1e2e;
            border-color: #6c757d;
            border-bottom-left-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }

        /* Warna teks putih di dalam editor */
        #quill-editor .ql-editor {
            color: #ffffff;
        }

        #quill-editor .ql-editor.ql-blank::before {
            color: rgba(255, 255, 255, 0.4);
            font-style: normal;
        }

        /* Style Heading Saat Ngetik */
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
            background-color: #343a40;
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
                    <h1 class="m-0 text-dark font-weight-bold">Edit Post</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.posts.index') }}">All Posts</a></li>
                        <li class="breadcrumb-item active">Edit</li>
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
                            <h3 class="card-title">Update Post</h3>
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

                            <form action="{{ route('dashboard.posts.update', $post->id) }}" enctype="multipart/form-data"
                                method="POST" id="postForm">
                                @csrf @method('PUT')
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="inputTitle">Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputTitle" name="title"
                                                value="{{ old('title', $post->title) }}" required />
                                        </div>
                                        <div class="form-group">
                                            <label for="inputSlug">Slug <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="inputSlug" name="slug"
                                                value="{{ old('slug', $post->slug) }}" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Content</label>
                                            {{-- ID sama dengan create: quill-editor --}}
                                            <div id="quill-editor">{!! old('content', $post->content) !!}</div>
                                            <input type="hidden" name="content" id="content-hidden">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inputCategory">Category</label>
                                            <select class="form-control select2" name="category" id="inputCategory"
                                                style="width: 100%;">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category', $post->category_id) == $category->id ? 'selected' : '' }}>
                                                        {{ $category->title }}</option>
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
                                                <label class="custom-file-label" for="inputThumbnail">Choose new
                                                    file</label>
                                            </div>
                                            <small class="text-muted">Leave empty to keep current image.</small>
                                            <div class="mt-3 text-center">
                                                <img id="thumbnailpreview" class="img-fluid img-thumbnail"
                                                    style="max-height: 200px;"
                                                    src="{{ asset('uploads/post/' . $post->thumbnail) }}"
                                                    alt="Current Thumbnail" />
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="form-group d-flex justify-content-between align-items-center">
                                            <label class="mb-0">Featured</label>
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" name="featured" id="featured" value="1"
                                                    {{ old('featured', $post->is_featured) ? 'checked' : '' }} />
                                                <label for="featured"></label>
                                            </div>
                                        </div>

                                        <div class="form-group d-flex justify-content-between align-items-center">
                                            <label class="mb-0">Comments</label>
                                            <div class="icheck-success d-inline">
                                                <input type="checkbox" name="comment" id="comment" value="1"
                                                    {{ old('comment', $post->enable_comment) ? 'checked' : '' }} />
                                                <label for="comment"></label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputStatus">Status</label>
                                            <select class="form-control" name="status" id="inputStatus">
                                                @if (auth()->user()->role != 1)
                                                    <option value="1"
                                                        {{ old('status', $post->status) == 1 ? 'selected' : '' }}>Publish
                                                    </option>
                                                @endif
                                                <option value="0"
                                                    {{ old('status', $post->status) == 0 ? 'selected' : '' }}>Draft
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-save mr-1"></i>
                                            Update Post</button>
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
            // 1. Init Quill (Sama persis dengan create)
            const quill = new Quill('#quill-editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{
                            'header': [1, 2, 3, false]
                        }], // Tombol Heading
                        ['bold', 'italic', 'underline', 'strike'],
                        ['blockquote', 'code-block'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        [{
                            'align': []
                        }],
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

            // 2. Set Tags lama (Hanya untuk Edit)
            var existingTags = [];
            @if ($post->tags_count > 0)
                @foreach ($post->tags as $tag)
                    existingTags.push('{{ $tag->name }}');
                @endforeach
            @endif
            $('#inputTags').val(existingTags).trigger('change');

            // 3. Submit Handler
            $("#postForm").on('submit', function() {
                let html = quill.root.innerHTML;
                $('#content-hidden').val(html);
            });

            // 4. Slug Logic
            $('#inputTitle').on("input", function() {
                $('#inputSlug').val($.slugify($('#inputTitle').val()));
            });

            // 5. Select2
            $('.select2').select2({
                theme: 'bootstrap4',
                tags: true
            });

            // 6. Image Preview
            $("#inputThumbnail").change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#thumbnailpreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                    $(this).next('.custom-file-label').html(this.files[0].name);
                }
            });
        });
    </script>
@endpush
