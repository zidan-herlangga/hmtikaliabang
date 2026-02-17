@extends('dashboard.master')

@section('title', 'Trashed Comments')

@section('content')
    {{-- Content Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">Trashed Comments</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.comments.index') }}">All Comments</a></li>
                        <li class="breadcrumb-item active">Trashed</li>
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
                            <h3 class="card-title">Deleted Comments</h3>
                            <div class="card-tools">
                                <a href="{{ route('dashboard.comments.index') }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-arrow-left mr-1"></i> Back to All Comments
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
                                            <th class="text-center" style="width: 150px">Action</th>
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
                                                    @if ($comment->status)
                                                        <span class="badge badge-success">Published</span>
                                                    @else
                                                        <span class="badge badge-warning">Pending</span>
                                                    @endif
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        {{-- Restore Button --}}
                                                        <a href="{{ route('dashboard.comments.restore', $comment->id) }}"
                                                            class="btn btn-success" title="Restore">
                                                            <i class="fas fa-undo"></i> Restore
                                                        </a>

                                                        {{-- Permanent Delete Button --}}
                                                        <form
                                                            action="{{ route('dashboard.comments.delete', $comment->id) }}"
                                                            method="POST" class="d-inline delete-form">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger deletebtn"
                                                                title="Delete Permanently">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center py-5">
                                                    <i class="fas fa-trash-restore fa-3x text-muted mb-3"></i>
                                                    <p class="text-muted">Trash is empty.</p>
                                                    <a href="{{ route('dashboard.comments.index') }}"
                                                        class="btn btn-primary btn-sm">Go to Comments</a>
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
            // Event delegation for delete button
            $(document).on('click', '.deletebtn', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: 'Delete Permanently?',
                    text: "This action cannot be undone. The comment will be removed from the database.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33', // Red for destructive action
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it permanently!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
@endpush
