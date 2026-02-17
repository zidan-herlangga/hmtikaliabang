<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.home') }}" class="brand-link">
        <img src="{{ asset('assets/homepage/logo-himpunan.png') }}" alt="Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8; width: 30px; height: 30px;">
        <span
            class="brand-text font-weight-bold px-2">{{ config('app.sitesettings')::first()?->site_title ?? 'Admin' }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('uploads/author/' . (auth()->user()->profile ?? 'default.webp')) }}"
                    class="img-circle elevation-2" alt="{{ auth()->user()->name }}"
                    style="opacity: .8; width: 30px; height: 30px;" />
            </div>
            <div class="info">
                <a target="_blank" href="{{ route('frontend.user', auth()->user()->username) }}"
                    class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboard.home') }}"
                        class="nav-link {{ request()->routeIs('dashboard.home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Posts Menu -->
                <li class="nav-item {{ request()->routeIs('dashboard.posts.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('dashboard.posts.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-pencil-alt"></i>
                        <p>Posts<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('dashboard.posts.index') }}"
                                class="nav-link {{ request()->routeIs('dashboard.posts.index') ? 'active' : '' }}"><i
                                    class="far fa-circle nav-icon"></i>
                                <p>Semua Post</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('dashboard.posts.create') }}"
                                class="nav-link {{ request()->routeIs('dashboard.posts.create') ? 'active' : '' }}"><i
                                    class="far fa-circle nav-icon"></i>
                                <p>Buat Post Baru</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('dashboard.posts.trashed') }}"
                                class="nav-link {{ request()->routeIs('dashboard.posts.trashed') ? 'active' : '' }}"><i
                                    class="far fa-circle nav-icon"></i>
                                <p>Post Terhapus</p>
                            </a></li>
                    </ul>
                </li>

                <!-- Media Menu -->
                <li class="nav-item {{ request()->routeIs('dashboard.media.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('dashboard.media.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-image"></i>
                        <p>Media<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('dashboard.media.index') }}"
                                class="nav-link {{ request()->routeIs('dashboard.media.index') ? 'active' : '' }}"><i
                                    class="far fa-circle nav-icon"></i>
                                <p>Semua Media</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('dashboard.media.create') }}"
                                class="nav-link {{ request()->routeIs('dashboard.media.create') ? 'active' : '' }}"><i
                                    class="far fa-circle nav-icon"></i>
                                <p>Tambah Media Baru</p>
                            </a></li>
                    </ul>
                </li>

                <!-- Comments Menu -->
                <li class="nav-item {{ request()->routeIs('dashboard.comments.*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('dashboard.comments.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-comment-alt"></i>
                        <p>Komentar<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('dashboard.comments.index') }}"
                                class="nav-link {{ request()->routeIs('dashboard.comments.index') ? 'active' : '' }}"><i
                                    class="far fa-circle nav-icon"></i>
                                <p>Semua Komentar</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('dashboard.comments.trashed') }}"
                                class="nav-link {{ request()->routeIs('dashboard.comments.trashed') ? 'active' : '' }}"><i
                                    class="far fa-circle nav-icon"></i>
                                <p>Komentar Terhapus</p>
                            </a></li>
                    </ul>
                </li>

                @if (auth()->user()->role == 3)
                    <!-- Categories (Admin Only) -->
                    <li class="nav-item {{ request()->routeIs('dashboard.categories.*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('dashboard.categories.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th-list"></i>
                            <p>Kategori<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="{{ route('dashboard.categories.index') }}"
                                    class="nav-link {{ request()->routeIs('dashboard.categories.index') ? 'active' : '' }}"><i
                                        class="far fa-circle nav-icon"></i>
                                    <p>Semua Kategori</p>
                                </a></li>
                            <li class="nav-item"><a href="{{ route('dashboard.categories.create') }}"
                                    class="nav-link {{ request()->routeIs('dashboard.categories.create') ? 'active' : '' }}"><i
                                        class="far fa-circle nav-icon"></i>
                                    <p>Buat Kategori Baru</p>
                                </a></li>
                            <li class="nav-item"><a href="{{ route('dashboard.categories.trashed') }}"
                                    class="nav-link {{ request()->routeIs('dashboard.categories.trashed') ? 'active' : '' }}"><i
                                        class="far fa-circle nav-icon"></i>
                                    <p>Kategori Terhapus</p>
                                </a></li>
                        </ul>
                    </li>

                    <!-- Tags (Admin Only) -->
                    <li class="nav-item">
                        <a href="{{ route('dashboard.tags.index') }}"
                            class="nav-link {{ request()->routeIs('dashboard.tags.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>Tags</p>
                        </a>
                    </li>

                    <!-- Users (Admin Only) -->
                    <li class="nav-item {{ request()->routeIs('dashboard.users.*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('dashboard.users.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Users<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="{{ route('dashboard.users.index') }}"
                                    class="nav-link {{ request()->routeIs('dashboard.users.index') ? 'active' : '' }}"><i
                                        class="far fa-circle nav-icon"></i>
                                    <p>Semua Users</p>
                                </a></li>
                            <li class="nav-item"><a href="{{ route('dashboard.users.create') }}"
                                    class="nav-link {{ request()->routeIs('dashboard.users.create') ? 'active' : '' }}"><i
                                        class="far fa-circle nav-icon"></i>
                                    <p>User Baru</p>
                                </a></li>
                        </ul>
                    </li>

                    <!-- Pages (Admin Only) -->
                    <li class="nav-item {{ request()->routeIs('dashboard.pages.*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->routeIs('dashboard.pages.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>Halaman<i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="{{ route('dashboard.pages.index') }}"
                                    class="nav-link {{ request()->routeIs('dashboard.pages.index') ? 'active' : '' }}"><i
                                        class="far fa-circle nav-icon"></i>
                                    <p>Semua Halaman</p>
                                </a></li>
                            <li class="nav-item"><a href="{{ route('dashboard.pages.create') }}"
                                    class="nav-link {{ request()->routeIs('dashboard.pages.create') ? 'active' : '' }}"><i
                                        class="far fa-circle nav-icon"></i>
                                    <p>Buat Halaman Baru</p>
                                </a></li>
                            <li class="nav-item"><a href="{{ route('dashboard.pages.trashed') }}"
                                    class="nav-link {{ request()->routeIs('dashboard.pages.trashed') ? 'active' : '' }}"><i
                                        class="far fa-circle nav-icon"></i>
                                    <p>Halaman Terhapus</p>
                                </a></li>
                        </ul>
                    </li>
                @endif

                <!-- Settings -->
                <li class="nav-item {{ request()->routeIs('dashboard.settings.*') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ request()->routeIs('dashboard.settings.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Pengaturan<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="{{ route('dashboard.settings.profile') }}"
                                class="nav-link {{ request()->routeIs('dashboard.settings.profile') ? 'active' : '' }}"><i
                                    class="far fa-circle nav-icon"></i>
                                <p>Profil</p>
                            </a></li>
                        <li class="nav-item"><a href="{{ route('dashboard.settings.password') }}"
                                class="nav-link {{ request()->routeIs('dashboard.settings.password') ? 'active' : '' }}"><i
                                    class="far fa-circle nav-icon"></i>
                                <p>Password</p>
                            </a></li>
                        @if (auth()->user()->role == 3)
                            <li class="nav-item"><a href="{{ route('dashboard.settings.site') }}"
                                    class="nav-link {{ request()->routeIs('dashboard.settings.site') ? 'active' : '' }}"><i
                                        class="far fa-circle nav-icon"></i>
                                    <p>Pengaturan Situs</p>
                                </a></li>
                            <li class="nav-item"><a href="{{ route('dashboard.settings.social.media') }}"
                                    class="nav-link {{ request()->routeIs('dashboard.settings.social.media') ? 'active' : '' }}"><i
                                        class="far fa-circle nav-icon"></i>
                                    <p>Sosial Media</p>
                                </a></li>
                            <li
                                class="nav-item {{ request()->routeIs('dashboard.settings.menus.*') ? 'menu-open' : '' }}">
                                <a href="#"
                                    class="nav-link {{ request()->routeIs('dashboard.settings.menus.*') ? 'active' : '' }}"><i
                                        class="far fa-circle nav-icon"></i>
                                    <p>Menu<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item"><a href="{{ route('dashboard.settings.menus.header') }}"
                                            class="nav-link {{ request()->routeIs('dashboard.settings.menus.header') ? 'active' : '' }}"><i
                                                class="far fa-dot-circle nav-icon"></i>
                                            <p>Header</p>
                                        </a></li>
                                    <li class="nav-item"><a href="{{ route('dashboard.settings.menus.footer') }}"
                                            class="nav-link {{ request()->routeIs('dashboard.settings.menus.footer') ? 'active' : '' }}"><i
                                                class="far fa-dot-circle nav-icon"></i>
                                            <p>Footer</p>
                                        </a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </li>

                <!-- Logout -->
                <li class="nav-header"></li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fa fa-sign-out-alt text-danger"></i>
                        <p class="text-danger">Keluar</p>
                    </a>
                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>
