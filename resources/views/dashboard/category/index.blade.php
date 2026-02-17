@extends('dashboard.master')

@section('title', 'All Categories - ' . config('app.name'))

@section('content')
    {{-- Content Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">All Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Categories</li>
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
                            <h3 class="card-title">Category List</h3>
                            <div class="card-tools">
                                <a href="{{ route('dashboard.categories.create') }}" class="btn btn-primary btn-sm">
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

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center" style="width: 50px">#</th>
                                            <th class="text-center" style="width: 100px">Image</th>
                                            <th>Title</th>
                                            <th class="text-center" style="width: 100px">Posts</th>
                                            <th class="text-center" style="width: 100px">Status</th>
                                            <th class="text-center" style="width: 180px">Action</th>
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
                                                <td class="align-middle font-weight-bold">{{ $category->title }}</td>
                                                <td class="text-center align-middle">
                                                    <span class="badge badge-info p-2">{{ $category->posts_count }}</span>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a href="{{ route('dashboard.categories.status', $category->id) }}"
                                                        class="text-decoration-none" title="Toggle Status">
                                                        @if ($category->status)
                                                            <span class="badge badge-success"><i
                                                                    class="fas fa-check-circle"></i> Active</span>
                                                        @else
                                                            <span class="badge badge-warning"><i
                                                                    class="fas fa-times-circle"></i> Inactive</span>
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{-- Button Group for clean alignment --}}
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        @if ($category->status)
                                                            <a href="{{ route('frontend.category', $category->slug) }}"
                                                                target="_blank" class="btn btn-info" title="View on Site">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        @else
                                                            <button class="btn btn-secondary disabled" disabled
                                                                title="Category Inactive">
                                                                <i class="fas fa-eye-slash"></i>
                                                            </button>
                                                        @endif

                                                        <a href="{{ route('dashboard.categories.edit', $category->id) }}"
                                                            class="btn btn-warning" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <form
                                                            action="{{ route('dashboard.categories.destroy', $category->id) }}"
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
                                                <td colspan="6" class="text-center py-5">
                                                    <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                                                    <p class="text-muted">No categories found!</p>
                                                    <a href="{{ route('dashboard.categories.create') }}"
                                                        class="btn btn-primary btn-sm">Create First Category</a>
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
            // Use event delegation for dynamically added elements
            $(document).on('click', '.deletebtn', function(e) {
                e.preventDefault();
                var form = $(this).closest('form'); // Use closest to find the form parent

                Swal.fire({
                    title: 'Are you sure?',
                    text: "All posts associated with this category might be affected!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
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
