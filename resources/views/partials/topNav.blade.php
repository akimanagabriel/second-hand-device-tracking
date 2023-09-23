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




        {{-- NOTIFICATION --}}
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">

                <a class="nav-link count-indicator dropdown-toggle" data-toggle="dropdown" href="#"
                    id="notificationDropdown">
                    <i class="icon-bell mx-0"></i>
                    @if (count(Auth::user()->unreadNotifications) != 0)
                        <span class="count"></span>
                    @endif
                </a>

                <div aria-labelledby="notificationDropdown"
                    class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list">
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">
                            {{ count(Auth::user()->unreadNotifications) != 0 ? 'Notifications' : 'No new Notification' }}
                        </p>
                        @if (count(Auth::user()->unreadNotifications) != 0)
                            <a class="d-flex align-items-center gap-2" href="{{ route('readAllNotification') }}"
                                style="margin-right: 15px">
                                <i class="mdi mdi-check-all mx-1"></i>
                                <span>Mark all as read</span>
                            </a>
                        @endif

                    </div>

                    @foreach (Auth::user()->unreadNotifications as $notification)
                        <a class="dropdown-item preview-item" style="max-width: 400px">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-secondary">
                                    <i class="mdi mdi-repeat mx-0"></i>
                                </div>
                            </div>

                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-bold mb-0 ">Transfer</h6>
                                <p class="font-weight-light small-text mb-2 text-muted">
                                    {{ $notification->created_at->diffForHumans() }}
                                </p>
                                <div>
                                    <span style="color: rgba(0, 0, 0, 0.649)">
                                        @foreach ($notification->data as $message)
                                            {!! $message !!}
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach


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
