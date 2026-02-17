@extends('dashboard.master')

@section('title', 'All Posts')

@section('content')
    {{-- Content Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">All Posts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Posts</li>
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
                            <h3 class="card-title">Post List</h3>
                            <div class="card-tools">
                                <a href="{{ route('dashboard.posts.create') }}" class="btn btn-primary btn-sm">
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
                                            <th>Title</th>
                                            <th class="text-center" style="width: 100px">Author</th>
                                            <th class="text-center" style="width: 100px">Category</th>
                                            <th class="text-center" style="width: 150px">Tags</th>
                                            <th class="text-center" style="width: 80px">Status</th>
                                            <th class="text-center" style="width: 80px">Featured</th>
                                            <th class="text-center" style="width: 80px">Comments</th>
                                            <th class="text-center" style="width: 80px">Views</th>
                                            <th class="text-center" style="width: 130px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($posts as $post)
                                            <tr>
                                                <td class="text-center align-middle">
                                                    {{ $loop->index + $posts->firstItem() }}</td>
                                                <td class="align-middle">
                                                    <div class="font-weight-bold text-truncate" style="max-width: 200px;"
                                                        title="{{ $post->title }}">
                                                        {{ $post->title }}
                                                    </div>
                                                    <small
                                                        class="text-muted">{{ $post->created_at->format('d M, Y') }}</small>
                                                </td>
                                                <td class="text-center align-middle">{{ $post->user->name ?? 'N/A' }}</td>
                                                <td class="text-center align-middle">
                                                    <span
                                                        class="badge badge-info">{{ $post->category->title ?? 'Uncategorized' }}</span>
                                                </td>
                                                <td class="text-center align-middle">
                                                    @forelse ($post->tags as $tag)
                                                        <span class="badge badge-primary mr-1">{{ $tag->name }}</span>
                                                    @empty
                                                        <span class="badge badge-secondary">-</span>
                                                    @endforelse
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a href="{{ route('dashboard.posts.status', $post->id) }}"
                                                        class="text-decoration-none" title="Toggle Status">
                                                        @if ($post->status)
                                                            <span class="badge badge-success"><i
                                                                    class="fas fa-check-circle"></i> Published</span>
                                                        @else
                                                            <span class="badge badge-danger"><i
                                                                    class="fas fa-times-circle"></i> Draft</span>
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a href="{{ route('dashboard.posts.featured', $post->id) }}"
                                                        class="text-decoration-none" title="Toggle Featured">
                                                        @if ($post->is_featured)
                                                            <span class="badge badge-warning"><i class="fas fa-star"></i>
                                                                Yes</span>
                                                        @else
                                                            <span class="badge badge-secondary">No</span>
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a href="{{ route('dashboard.posts.comment', $post->id) }}"
                                                        class="text-decoration-none" title="Toggle Comments">
                                                        @if ($post->enable_comment)
                                                            <span class="badge badge-success"><i
                                                                    class="fas fa-comments"></i>
                                                                {{ $post->comments_count }}</span>
                                                        @else
                                                            <span class="badge badge-danger"><i
                                                                    class="fas fa-comment-slash"></i> Off</span>
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <span class="text-muted"><i class="fas fa-eye mr-1"></i>
                                                        {{ $post->views }}</span>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        @if ($post->status)
                                                            <a href="{{ route('frontend.post', $post->slug) }}"
                                                                target="_blank" class="btn btn-info" title="View on Site">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        @else
                                                            <button class="btn btn-secondary disabled" disabled
                                                                title="Unpublished">
                                                                <i class="fas fa-eye-slash"></i>
                                                            </button>
                                                        @endif

                                                        <a href="{{ route('dashboard.posts.edit', $post->id) }}"
                                                            class="btn btn-warning" title="Edit">
                                                            <i class="fas fa-edit"></i>
                                                        </a>

                                                        <form action="{{ route('dashboard.posts.destroy', $post->id) }}"
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
                                                <td colspan="10" class="text-center py-5">
                                                    <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                                                    <p class="text-muted">No posts found!</p>
                                                    <a href="{{ route('dashboard.posts.create') }}"
                                                        class="btn btn-primary btn-sm">Create First Post</a>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Pagination --}}
                        @if ($posts->hasPages())
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    {{ $posts->links() }}
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
                    title: 'Are you sure?',
                    text: "All comments associated with this post will also be deleted!",
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
