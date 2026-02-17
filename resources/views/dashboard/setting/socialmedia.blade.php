@extends('dashboard.master')

@section('title', 'Social Media Settings')

@section('content')
    {{-- Add New Modal --}}
    <div class="modal fade" id="addMedia" tabindex="-1" aria-labelledby="ModalLabelTitle" data-backdrop="static"
        data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('dashboard.settings.social.media.add') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="fas fa-plus-circle mr-2"></i>Add New Platform</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Platform Name</label>
                            <input type="text" placeholder="e.g. Facebook" id="title" name="title"
                                class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon Class</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="fab fa-facebook" id="icon"
                                    name="icon" required />
                                <div class="input-group-append">
                                    <span class="input-group-text" id="icon_preview_box"><i
                                            class="fab fa-facebook"></i></span>
                                </div>
                            </div>
                            <small class="text-muted">Uses Font Awesome classes (e.g., fab fa-facebook, fas
                                fa-globe).</small>
                        </div>
                        <div class="form-group">
                            <label for="link">Profile URL</label>
                            <input type="url" placeholder="https://..." id="link" name="link"
                                class="form-control" required />
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="color">Brand Color</label>
                                    <input type="color" id="color" name="color" class="form-control" value="#007bff"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-1"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Content Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">Social Media Links</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Settings</li>
                        <li class="breadcrumb-item active">Social Media</li>
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
                            <h3 class="card-title">Connected Platforms</h3>
                            <div class="card-tools">
                                <button data-toggle="modal" data-target="#addMedia" class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus mr-1"></i> Add New
                                </button>
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
                                            <th class="text-center" style="width: 100px">Icon</th>
                                            <th>Platform</th>
                                            <th>Link</th>
                                            <th class="text-center" style="width: 100px">Status</th>
                                            <th class="text-center" style="width: 100px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($socialmedia as $media)
                                            <tr>
                                                <td class="text-center align-middle">
                                                    {{ $loop->index + $socialmedia->firstItem() }}</td>
                                                <td class="text-center align-middle">
                                                    <div class="mx-auto"
                                                        style="width: 40px; height: 40px; border-radius: 50%; background-color: {{ $media->color }}20; color: {{ $media->color }}; display: flex; align-items: center; justify-content: center;">
                                                        <i class="{{ $media->icon }} fa-lg"></i>
                                                    </div>
                                                </td>
                                                <td class="align-middle font-weight-bold">{{ $media->title }}</td>
                                                <td class="align-middle">
                                                    <a href="{{ $media->link }}" target="_blank"
                                                        class="text-muted text-truncate d-inline-block"
                                                        style="max-width: 250px;">
                                                        {{ $media->link }}
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <a href="{{ route('dashboard.settings.social.media.status', $media->id) }}"
                                                        class="text-decoration-none" title="Toggle Status">
                                                        @if ($media->status)
                                                            <span class="badge badge-success"><i
                                                                    class="fas fa-check-circle"></i> Active</span>
                                                        @else
                                                            <span class="badge badge-warning"><i
                                                                    class="fas fa-times-circle"></i> Inactive</span>
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <form
                                                        action="{{ route('dashboard.settings.social.media.delete', $media->id) }}"
                                                        method="POST" class="d-inline delete-form">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm deletebtn"
                                                            title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center py-5">
                                                    <i class="fas fa-share-alt fa-3x text-muted mb-3"></i>
                                                    <p class="text-muted">No social media links added yet.</p>
                                                    <button data-toggle="modal" data-target="#addMedia"
                                                        class="btn btn-primary btn-sm">Add First Link</button>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Pagination --}}
                        @if ($socialmedia->hasPages())
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    {{ $socialmedia->links() }}
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
    <script src="{{ asset('assets/dashboard/plugins/iconpicker/iconpicker.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Reset form when modal is closed
            $('#addMedia').on('hidden.bs.modal', function() {
                $(this).find('form').trigger('reset');
                // Reset icon preview
                $('#icon_preview_box i').attr('class', 'fab fa-facebook');
            });

            // Initialize Icon Picker (Assuming API route exists)
            // If the API route is not available, you might need to pass icons directly or handle errors
            if (document.querySelector("#icon")) {
                (async () => {
                    try {
                        const response = await fetch('{{ route('api.icons') }}');
                        const result = await response.json();

                        new Iconpicker(document.querySelector("#icon"), {
                            icons: result,
                            onChange: function(icon) {
                                // Update preview when icon is selected
                                $('#icon_preview_box i').attr('class', icon);
                            }
                        });
                    } catch (error) {
                        console.error('Failed to load icons:', error);
                    }
                })();
            }

            // Live update icon preview if manual input
            $('#icon').on('input', function() {
                $('#icon_preview_box i').attr('class', $(this).val());
            });

            // Delete Confirmation
            $(document).on('click', '.deletebtn', function(e) {
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: 'Delete this link?',
                    text: "The social media link will be permanently removed.",
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
