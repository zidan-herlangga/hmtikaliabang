@extends('dashboard.master')

@section('title', 'All Comments')

@section('content')
    {{-- Modal for Comment Details --}}
    <div class="modal fade" id="modal-lg" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title font-weight-bold">Comment Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center text-muted py-5">
                        <i class="fas fa-spinner fa-spin fa-2x"></i>
                        <p class="mt-2">Loading...</p>
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Content Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">All Comments</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Comments</li>
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
                            <h3 class="card-title">Comment List</h3>
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

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center" style="width: 50px">#</th>
                                            <th style="width: 150px">Commenter</th>
                                            <th class="text-center" style="width: 80px">Type</th>
                                            <th style="width: 200px">Post</th>
                                            <th>Comment</th>
                                            <th class="text-center" style="width: 120px">Submitted On</th>
                                            <th class="text-center" style="width: 100px">Status</th>
                                            <th class="text-center" style="width: 120px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($comments as $comment)
                                            <tr>
                                                <td class="text-center align-middle">
                                                    {{ $loop->index + $comments->firstItem() }}</td>
                                                <td class="align-middle">
                                                    <div class="font-weight-bold">
                                                        {{ $comment->user ? $comment->user->name : $comment->name }}</div>
                                                    <small
                                                        class="text-muted">{{ $comment->user ? $comment->user->email : $comment->email }}</small>
                                                </td>
                                                <td class="text-center align-middle">
                                                    @if ($comment->user)
                                                        <span class="badge badge-primary">User</span>
                                                    @else
                                                        <span class="badge badge-secondary">Guest</span>
                                                    @endif
                                                </td>
                                                <td class="align-middle text-truncate" style="max-width: 150px;"
                                                    title="{{ $comment->post->title ?? 'Deleted' }}">
                                                    {{ $comment->post->title ?? 'Post Deleted' }}
                                                </td>
                                                <td class="align-middle">
                                                    <div class="text-truncate" style="max-width: 250px;"
                                                        title="{{ $comment->message }}">
                                                        {{ $comment->message }}
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div>{{ $comment->created_at->format('d M, Y') }}</div>
                                                    <small
                                                        class="text-muted">{{ $comment->created_at->format('h:i A') }}</small>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a href="{{ route('dashboard.comments.status', $comment->id) }}"
                                                        class="text-decoration-none">
                                                        @if ($comment->status)
                                                            <span class="badge badge-success"><i
                                                                    class="fas fa-check-circle"></i> Published</span>
                                                        @else
                                                            <span class="badge badge-warning"><i class="fas fa-clock"></i>
                                                                Pending</span>
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <button type="button" class="btn btn-info commentdetails"
                                                            data-href="{{ route('dashboard.comments.show', $comment->id) }}"
                                                            title="View Details">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <form
                                                            action="{{ route('dashboard.comments.destroy', $comment->id) }}"
                                                            method="POST" class="d-inline delete-form">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger deletebtn"
                                                                title="Delete">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center py-5">
                                                    <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                                                    <p class="text-muted">No comments found!</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Pagination --}}
                        @if ($comments->hasPages())
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    {{ $comments->links() }}
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
    <script>
        $(document).ready(function() {
            // Handle Comment Details Modal
            $(document).on('click', '.commentdetails', function(e) {
                e.preventDefault();
                const url = $(this).data('href');
                const modalBody = $('#modal-lg .modal-body');

                // Show loading state
                modalBody.html(
                    '<div class="text-center text-muted py-5"><i class="fas fa-spinner fa-spin fa-2x"></i><p class="mt-2">Loading...</p></div>'
                    );
                $('#modal-lg').modal('show');

                $.ajax({
                        type: "GET",
                        url: url,
                        headers: {
                            "Accept": "text/html"
                        },
                    })
                    .done((data) => {
                        modalBody.html(data);
                    })
                    .fail((err) => {
                        modalBody.html('<div class="alert alert-danger">Error loading details.</div>');
                    });
            });

            // Clear modal content on close
            $('#modal-lg').on('hidden.bs.modal', function() {
                $(this).find('.modal-body').html('');
            });

            // Handle Delete Button
            $(document).on('click', '.deletebtn', function(e) {
                e.preventDefault();
                const form = $(this).closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to delete this comment?",
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
        });
    </script>
@endpush
