@extends('dashboard.master')

@section('title', 'All Media')

@section('content')
    {{-- Content Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">Media Library</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Media</li>
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
                            <h3 class="card-title">All Media</h3>
                            <div class="card-tools">
                                <a href="{{ route('dashboard.media.create') }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus mr-1"></i> Add New
                                </a>
                            </div>
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

                            <div class="row">
                                @forelse ($media as $item)
                                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 mb-4">
                                        <div class="card h-100 border-0 shadow-sm overflow-hidden">
                                            {{-- Image Wrapper with Hover Effect --}}
                                            <div class="position-relative overflow-hidden"
                                                style="height: 150px; background-color: #f8f9fa;">
                                                <img class="card-img-top h-100 w-100"
                                                    src="{{ asset('uploads/media/' . $item->file_name) }}" alt="Media"
                                                    style="object-fit: cover; transition: transform .3s;">

                                                {{-- Overlay on Hover --}}
                                                <div class="card-overlay position-absolute w-100 h-100 d-flex align-items-center justify-content-center"
                                                    style="top: 0; left: 0; background: rgba(0,0,0,0.5); opacity: 0; transition: opacity .3s;">
                                                    <a href="{{ asset('uploads/media/' . $item->file_name) }}"
                                                        target="_blank" class="btn btn-light btn-sm rounded-circle mr-2"
                                                        title="View Full Size">
                                                        <i class="fas fa-search-plus"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            {{-- Card Footer / Actions --}}
                                            <div class="card-body p-2 text-center bg-light border-top">
                                                <div class="btn-group btn-group-sm w-100" role="group">
                                                    <button type="button" class="btn btn-outline-primary copybtn"
                                                        data-clipboard-text="{{ asset('uploads/media/' . $item->file_name) }}"
                                                        title="Copy URL">
                                                        <i class="fas fa-link"></i>
                                                    </button>

                                                    <form action="{{ route('dashboard.media.destroy', $item->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-outline-danger deletebtn w-100" title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12 text-center py-5">
                                        <i class="fas fa-images fa-3x text-muted mb-3"></i>
                                        <p class="text-muted">No media found!</p>
                                        <a href="{{ route('dashboard.media.create') }}"
                                            class="btn btn-primary btn-sm">Upload Now</a>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        {{-- Pagination --}}
                        @if ($media->hasPages())
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    {{ $media->links() }}
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('assets/dashboard/plugins/sweetalert2/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/clipboardjs/clipboard.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // 1. Clipboard.js Initialization
            var clipboard = new ClipboardJS('.copybtn');

            clipboard.on('success', function(e) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                Toast.fire({
                    icon: 'success',
                    title: 'Link copied to clipboard!'
                });
            });

            clipboard.on('error', function(e) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Failed to copy link!'
                });
            });

            // 2. Delete Confirmation
            $(document).on('click', '.deletebtn', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: 'Delete this media?',
                    text: "This image will be permanently removed.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            // 3. Hover Effect for Overlay (Optional CSS alternative)
            $('.card').hover(
                function() {
                    $(this).find('.card-overlay').css('opacity', '1');
                    $(this).find('img').css('transform', 'scale(1.1)');
                },
                function() {
                    $(this).find('.card-overlay').css('opacity', '0');
                    $(this).find('img').css('transform', 'scale(1)');
                }
            );
        });
    </script>
@endpush
