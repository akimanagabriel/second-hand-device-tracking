<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="/">
            <div class=" d-flex align-items-center">
                <img alt="logo" class="mr-2" src="images/logo-mini.svg" />
                <span>OSHDTMS</span>
            </div>

        </a>
        <a class="navbar-brand brand-logo-mini" href="/"><img alt="logo" src="images/logo-mini.svg" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" data-toggle="minimize" type="button">
            <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                        <span class="input-group-text" id="search">
                            <i class="icon-search"></i>
                        </span>
                    </div>
                    <input aria-describedby="search" aria-label="search" class="form-control" id="navbar-search-input"
                        placeholder="Search now" type="text">
                </div>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" data-toggle="dropdown" href="#"
                    id="notificationDropdown">
                    <i class="icon-bell mx-0"></i>
                    <span class="count"></span>
                </a>
                <div aria-labelledby="notificationDropdown"
                    class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list">
                    <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-success">
                                <i class="ti-info-alt mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">Application Error</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                Just now
                            </p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-warning">
                                <i class="ti-settings mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">Settings</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                Private message
                            </p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-info">
                                <i class="ti-user mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">New user registration</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                2 days ago
                            </p>
                        </div>
                    </a>
                </div>
            </li>
            <li class="nav-item nav-profile dropdown">
                <span class="">{{ Auth::user()->lastname }}&nbsp;&nbsp;&nbsp;</span>
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="profileDropdown">
                    <img alt="profile" src="images/faces/face28.jpg" />
                </a>
                <div aria-labelledby="profileDropdown" class="dropdown-menu dropdown-menu-right navbar-dropdown">
                    <a class="dropdown-item">
                        <i class="ti-settings text-primary"></i>
                        Settings
                    </a>
                    <a class="dropdown-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="nav-link btn py-0" type="submit">
                                <i class="ti-power-off text-danger"></i>
                                <span class="menu-title text-danger">Logout</span>
                            </button>
                        </form>
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" data-toggle="offcanvas"
            type="button">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>
