@extends('dashboard.master')

@section('title', 'Change Password')

@section('content')
    {{-- Content Header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark font-weight-bold">Change Password</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">Settings</li>
                        <li class="breadcrumb-item active">Password</li>
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
                            <h3 class="card-title">Update Your Security Credentials</h3>
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

                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <form action="{{ route('dashboard.settings.password.update') }}" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label for="current_password">Current Password <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="current_password"
                                                    name="current_password" placeholder="Enter current password" required />
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-secondary toggle-password"
                                                        data-target="current_password">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <div class="form-group">
                                            <label for="new_password">New Password <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="new_password"
                                                    name="new_password" placeholder="Enter new password" required />
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-secondary toggle-password"
                                                        data-target="new_password">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <small class="text-muted">Minimum 8 characters recommended.</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="new_password_confirmation">Confirm New Password <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="new_password_confirmation"
                                                    name="new_password_confirmation" placeholder="Confirm new password"
                                                    required />
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-secondary toggle-password"
                                                        data-target="new_password_confirmation">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mt-4">
                                            <button class="btn btn-primary btn-block" type="submit">
                                                <i class="fas fa-key mr-1"></i> Update Password
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Toggle Password Visibility
            $('.toggle-password').on('click', function() {
                var targetId = $(this).data('target');
                var input = $('#' + targetId);
                var icon = $(this).find('i');

                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
        });
    </script>
@endpush
