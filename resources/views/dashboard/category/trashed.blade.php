@extends('dashboard.master')

@section('title', 'Trashed Categories - ' . config('app.name'))

@section('content')
    {{-- Content Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">Trashed Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">All Categories</a>
                        </li>
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
                            <h3 class="card-title">Deleted Categories</h3>
                            <div class="card-tools">
                                <a href="{{ route('dashboard.categories.index') }}" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-arrow-left mr-1"></i> Back to All Categories
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
                                            <th class="text-center" style="width: 100px">Image</th>
                                            <th>Title</th>
                                            <th class="text-center" style="width: 100px">Posts</th>
                                            <th class="text-center" style="width: 100px">Status</th>
                                            <th class="text-center" style="width: 150px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($categories as $category)
                                            <tr>
                                                <td class="text-center align-middle">
                                                    {{ $loop->index + $categories->firstItem() }}</td>
                                                <td class="text-center align-middle">
                                                    <img src="{{ asset('uploads/category/' . ($category->image ?? 'default.webp')) }}"
                                                        alt="{{ $category->title }}" class="img-thumbnail"
                                                        style="width: 60px; height: 60px; object-fit: cover; border-radius: .5rem;" />
                                                </td>
                                                <td class="align-middle font-weight-bold text-truncate">
                                                    {{ $category->title }}</td>
                                                <td class="text-center align-middle">
                                                    <span
                                                        class="badge badge-secondary p-2">{{ $category->posts_count }}</span>
                                                </td>
                                                <td class="text-center align-middle">
                                                    @if ($category->status)
                                                        <span class="badge badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-warning">Inactive</span>
                                                    @endif
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        {{-- Restore Button --}}
                                                        <a href="{{ route('dashboard.categories.restore', $category->id) }}"
                                                            class="btn btn-success" title="Restore">
                                                            <i class="fas fa-undo"></i> Restore
                                                        </a>

                                                        {{-- Permanent Delete Button --}}
                                                        <form
                                                            action="{{ route('dashboard.categories.delete', $category->id) }}"
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
                                                <td colspan="6" class="text-center py-5">
                                                    <i class="fas fa-trash-restore fa-3x text-muted mb-3"></i>
                                                    <p class="text-muted">Trash is empty.</p>
                                                    <a href="{{ route('dashboard.categories.index') }}"
                                                        class="btn btn-primary btn-sm">Go to Categories</a>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Pagination --}}
                        @if ($categories->hasPages())
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    {{ $categories->links() }}
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
                    text: "This action cannot be undone. All posts related to this category might be affected.",
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
