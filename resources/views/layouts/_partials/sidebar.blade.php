<nav id="sidebar"
     class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand"
           href="index.html">
            <span class="align-middle">AdminKit</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Administration
            </li>

            <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="sidebar-link"
                   href="{{ route('dashboard.index') }}">
                    <i class="align-middle"
                       data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-header">
                Role Permission
            </li>

            <li class="sidebar-item {{ Request::is('dashboard/permissions*') ? 'active' : '' }}">
                <a class="sidebar-link"
                   href="{{ route('permissions.index') }}">
                    <i class="align-middle"
                       data-feather="file-text"></i> <span class="align-middle">Permissions</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('dashboard/roles*') ? 'active' : '' }}">
                <a class="sidebar-link"
                   href="{{ route('roles.index') }}">
                    <i class="align-middle"
                       data-feather="user-check"></i> <span class="align-middle">Roles</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('dashboard/users*') ? 'active' : '' }}">
                <a class="sidebar-link"
                   href="{{ route('users.index') }}">
                    <i class="align-middle"
                       data-feather="users"></i> <span class="align-middle">Users</span>
                </a>
            </li>

        </ul>

        <div class="sidebar-brand">
            <div class="product-info d-flex justify-space-between">
                <span class="badge">RelitDev</span>
                <span class="badge text-success">{{ config('app.version') }}</span>
            </div>
        </div>
    </div>
</nav>
