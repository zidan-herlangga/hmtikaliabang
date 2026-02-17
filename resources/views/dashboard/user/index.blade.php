@extends('dashboard.master')

@section('title', 'All Users')

@section('content')
    {{-- Content Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">All Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                            <h3 class="card-title">User Management</h3>
                            <div class="card-tools">
                                <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary btn-sm">
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
                                            <th>User Info</th>
                                            <th class="text-center" style="width: 100px">Role</th>
                                            <th class="text-center" style="width: 100px">Posts</th>
                                            <th class="text-center" style="width: 100px">Status</th>
                                            <th class="text-center" style="width: 130px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                            <tr>
                                                <td class="text-center align-middle">
                                                    {{ $loop->index + $users->firstItem() }}</td>
                                                <td class="align-middle">
                                                    <div class="d-flex align-items-center">
                                                        <img class="rounded-circle table-user-img"
                                                            src="{{ asset('uploads/author/' . ($user->profile ?? 'default.webp')) }}"
                                                            alt="{{ $user->name }}"
                                                            style="width: 40px; height: 40px; object-fit: cover; margin-right: 10px;">
                                                        <div>
                                                            <div class="font-weight-bold">{{ $user->name }}</div>
                                                            <small class="text-muted">{{ $user->email }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center align-middle">
                                                    @if ($user->role == 3)
                                                        <span class="badge badge-danger">Admin</span>
                                                    @elseif ($user->role == 2)
                                                        <span class="badge badge-info">Author</span>
                                                    @else
                                                        <span class="badge badge-secondary">Visitor</span>
                                                    @endif
                                                </td>
                                                <td class="text-center align-middle">
                                                    <span class="badge badge-primary p-2">{{ $user->posts_count }}</span>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a href="{{ route('dashboard.users.status', $user->id) }}"
                                                        class="text-decoration-none" title="Toggle Status">
                                                        @if ($user->status)
                                                            <span class="badge badge-success"><i
                                                                    class="fas fa-check-circle"></i> Active</span>
                                                        @else
                                                            <span class="badge badge-danger"><i
                                                                    class="fas fa-times-circle"></i> Inactive</span>
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        {{-- View Profile --}}
                                                        @if ($user->status)
                                                            <a href="{{ route('frontend.user', $user->username) }}"
                                                                target="_blank" class="btn btn-info" title="View Profile">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        @else
                                                            <button class="btn btn-secondary disabled" disabled><i
                                                                    class="fas fa-eye-slash"></i></button>
                                                        @endif

                                                        {{-- Edit --}}
                                                        <a href="{{ route('dashboard.users.edit', $user->id) }}"
                                                            class="btn btn-warning" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        {{-- Delete (Prevent self-deletion) --}}
                                                        @if (auth()->id() != $user->id)
                                                            <form
                                                                action="{{ route('dashboard.users.destroy', $user->id) }}"
                                                                method="POST" class="d-inline delete-form">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger deletebtn"
                                                                    title="Delete User">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        @else
                                                            <button class="btn btn-outline-secondary disabled" disabled
                                                                title="Cannot delete self">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center py-5">
                                                    <i class="fas fa-users fa-3x text-muted mb-3"></i>
                                                    <p class="text-muted">No users found!</p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Pagination --}}
                        @if ($users->hasPages())
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    {{ $users->links() }}
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
            $(document).on('click', '.deletebtn', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: 'Delete this user?',
                    text: "All posts created by this user will be permanently deleted!",
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
