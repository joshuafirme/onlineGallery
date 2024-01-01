@php
    $permissions = App\Models\UserRole::permissions();
@endphp

<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/dashboard">
            <span class="sidebar-brand-text align-middle">
                <img width="150px" src="{{ asset('img/logo.png') }}" alt="">
            </span>
            <svg class="sidebar-brand-icon align-middle" width="32px" height="32px" viewBox="0 0 24 24" fill="none"
                stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="miter" color="#FFFFFF"
                style="margin-left: -3px">
                <path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
                <path d="M20 12L12 16L4 12"></path>
                <path d="M20 16L12 20L4 16"></path>
            </svg>
        </a>

        <div class="sidebar-user">
            <div class="d-flex justify-content-center">
                <div class="flex-shrink-0">
                    <img src="https://img.icons8.com/small/50/FFFFFF/user.png" class="avatar img-fluid rounded me-1"
                        alt="Charles Hall" />
                </div>
                <div class="flex-grow-1 ps-2">
                    <b class="sidebar-user-title">
                        @if (Auth::check())
                            {{ Auth::user()->name }}
                        @endif
                    </b>
                    <div class="dropdown-menu dropdown-menu-start">
                        <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1"
                                data-feather="user"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                data-feather="pie-chart"></i> Analytics</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="pages-settings.html"><i class="align-middle me-1"
                                data-feather="settings"></i> Settings &
                            Privacy</a>
                        <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                data-feather="help-circle"></i> Help Center</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Log out</a>
                    </div>

                    <div class="sidebar-user-subtitle">
                        @if (auth()->user() && auth()->user()->role_id)
                            @php
                                $role_name = App\Models\UserRole::where('id', auth()->user()->role_id)->value('name');
                            @endphp
                            {{ $role_name }}
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>
            @if (in_array('dashboard', $permissions))
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('/dashboard') }}">
                        <img width="24" height="24"
                            src="https://img.icons8.com/ios-filled/24/FFFFFF/performance-macbook.png"
                            alt="performance-macbook" alt="external-to-do-list-hr-edtim-solid-edtim" />
                        <span class="align-middle">Dashboard</span>
                    </a>
                </li>
            @endif

            @if (in_array('account_payments', $permissions))
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('/accounts') }}">
                        <img width="24" height="24"
                            src="https://img.icons8.com/material-rounded/24/FFFFFF/commercial-development-management.png"
                            alt="external-to-do-list-hr-edtim-solid-edtim" />
                        <span class="align-middle">Account Payments</span>
                    </a>
                </li>
            @endif

            @if (in_array('messages', $permissions))
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ url('/message') }}">
                        <img width="24" height="24"
                            src="https://img.icons8.com/ios-filled/24/FFFFFF/people-working-together.png"
                            alt="external-to-do-list-hr-edtim-solid-edtim" />
                        <span class="align-middle">Messages</span>
                    </a>
                </li>
            @endif


            @php
                $maintenance_modules = ['sliders', 'cards', 'testimonials'];
            @endphp
            @if (array_intersect($maintenance_modules, $permissions))
                <li class="sidebar-item">
                    <a data-bs-target="#forms" data-bs-toggle="collapse" class="sidebar-link collapsed">
                        <img width="24" height="24"
                            src="https://img.icons8.com/sf-regular/24/b7bcc2/maintenance.png" alt="maintenance" />
                        <span class="align-middle">Maintenance</span>
                    </a>
                    <ul id="forms" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('/pricing') }}">
                                Pricing
                            </a>
                        </li>
                        <li class="sidebar-header" style="margin-left: 7px;">
                            Website contents
                        </li>
                        @if (in_array('why_choose_us', $permissions))
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('/website-content?type=why_choose_us') }}">
                                    Why Choose Us
                                </a>
                            </li>
                        @endif
                        @if (in_array('free_trial_guide', $permissions))
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('/website-content?type=free_trial_guide') }}">
                                    Free Trial Guide
                                </a>
                            </li>
                        @endif
                        <li class="sidebar-header" style="margin-left: 7px;">
                            Home page contents
                        </li>

                        @if (in_array('sliders', $permissions))
                            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/sliders') }}">Slider</a>
                            </li>
                        @endif
                        @if (in_array('cards', $permissions))
                            <li class="sidebar-item"><a class="sidebar-link" href="{{ url('/cards') }}">Cards</a>
                            </li>
                        @endif
                        @if (in_array('testimonials', $permissions))
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="{{ url('/testimonials') }}">Testimonials</a></li>
                        @endif


                    </ul>
                </li>
            @endif

            @php
                $administration_modules = ['users', 'roles'];
            @endphp
            @if (array_intersect($administration_modules, $permissions))
                <li class="sidebar-item">
                    <a data-bs-target="#administration" data-bs-toggle="collapse" class="sidebar-link collapsed">
                        <img width="24" height="24"
                            src="https://img.icons8.com/fluency-systems-filled/24/b7bcc2/system-administrator-male.png"
                            alt="maintenance" />
                        <span class="align-middle">Administration</span>
                    </a>
                    <ul id="administration" class="sidebar-dropdown list-unstyled collapse "
                        data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('/users') }}">Users</a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('/user-roles') }}">Roles</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>

    </div>
</nav>
