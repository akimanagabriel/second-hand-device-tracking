<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item {{ Request::routeIs('home') ? 'active' : null }}">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item {{ Request::routeIs('devices') ? 'active' : null }}">
            <a class="nav-link" href="#">
                <i class="mdi mdi-airplay menu-icon"></i>
                <span class="menu-title">My Devices</span>
            </a>
        </li>

        @if (Auth::user()->type == 'admin')
            <li class="nav-item {{ Request::routeIs('category.index') ? 'active' : null }}">
                <a class="nav-link" href="{{ route('category.index') }}">
                    <i class="mdi mdi-google-circles-communities menu-icon"></i>
                    <span class="menu-title">Device categories</span>
                </a>
            </li>
        @endif


        <li class="nav-item {{ Request::routeIs('devices') ? 'active' : null }}">
            <a class="nav-link" href="#">
                <i class="mdi mdi-briefcase menu-icon"></i>
                <span class="menu-title">Cases</span>
            </a>
        </li>

        <li class="nav-item {{ Request::routeIs('devices') ? 'active' : null }}">
            <a class="nav-link" href="#">
                <i class="mdi mdi-tumblr-reblog menu-icon"></i>
                <span class="menu-title">Transfer</span>
            </a>
        </li>

        <li class="nav-item {{ Request::routeIs('devices') ? 'active' : null }}">
            <a class="nav-link" href="#">
                <i class="mdi mdi-bell-ring-outline menu-icon"></i>
                <span class="menu-title">Notifications</span>
            </a>
        </li>


        <li class="nav-item {{ Request::routeIs('devices') ? 'active' : null }}">
            <a class="nav-link" href="#">
                <i class="mdi mdi-file-document menu-icon"></i>
                <span class="menu-title">Report</span>
            </a>
        </li>


        @if (Auth::user()->type == 'admin')
            <li class="nav-item {{ Request::routeIs('users.list') ? 'active' : null }}">
                <a class="nav-link" href="{{ route('users.list') }}">
                    <i class="mdi mdi-account-multiple-outline menu-icon"></i>
                    <span class="menu-title">Users</span>
                </a>
            </li>
        @endif



        <li class="nav-item">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="nav-link btn" type="submit">
                    <i class="ti-power-off menu-icon text-danger"></i>
                    <span class="menu-title text-danger">Logout</span>
                </button>
            </form>
        </li>

    </ul>
</nav>
<!-- partial -->
