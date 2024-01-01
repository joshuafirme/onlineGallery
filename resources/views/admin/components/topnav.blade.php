<div class="main">
    <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle">
            <i class="hamburger align-self-center"></i>
        </a>


        <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
                <li class="nav-item dropdown">
                    {{-- <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                        <div class="position-relative">
                            <i class="align-middle" data-feather="bell"></i>
                            <span class="indicator">4</span>
                        </div>
                    </a> --}}
                    {{-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
                        <div class="dropdown-menu-header">
                            4 New Notifications
                        </div>
                        <div class="list-group">
                            <a href="#" class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="text-danger" data-feather="alert-circle"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Update completed</div>
                                        <div class="text-muted small mt-1">Restart server 12 to complete the update.
                                        </div>
                                        <div class="text-muted small mt-1">30m ago</div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="text-warning" data-feather="bell"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Lorem ipsum</div>
                                        <div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate
                                            hendrerit et.</div>
                                        <div class="text-muted small mt-1">2h ago</div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="text-primary" data-feather="home"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">Login from 192.186.1.8</div>
                                        <div class="text-muted small mt-1">5h ago</div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="list-group-item">
                                <div class="row g-0 align-items-center">
                                    <div class="col-2">
                                        <i class="text-success" data-feather="user-plus"></i>
                                    </div>
                                    <div class="col-10">
                                        <div class="text-dark">New connection</div>
                                        <div class="text-muted small mt-1">Christina accepted your request.</div>
                                        <div class="text-muted small mt-1">14h ago</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-menu-footer">
                            <a href="#" class="text-muted">Show all notifications</a>
                        </div>
                    </div> --}}
                </li>
                <li class="nav-item">
                    <a class="nav-icon js-fullscreen d-none d-lg-block" href="#">
                        <div class="position-relative">
                            <i class="align-middle" data-feather="maximize"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-icon pe-md-0 dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <img src="https://img.icons8.com/small/50/6C757D/user.png" class="avatar img-fluid rounded"
                            alt="Charles Hall" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ url('/user/change-password') }}"><i class="align-middle me-1"
                                data-feather="lock"></i> Change password</a>
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Log
                            out</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
