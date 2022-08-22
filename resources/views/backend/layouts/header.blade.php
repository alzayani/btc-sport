<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
            </div>
            <div class="top-menu d-flex align-items-center">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-bell"></i><span class="badge bg-danger">3</span></a>
                    <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown">
                        <h4 class="header">Notifications</h4>
                        <div class="notifications-wrap">
                            <a href="#" class="media">
                                            <span class="d-flex">
                                                <i class="ik ik-check"></i>
                                            </span>
                                <span class="media-body">
                                                <span class="heading-font-family media-heading">Invitation accepted</span>
                                                <span class="media-content">Your have been Invited ...</span>
                                            </span>
                            </a>
                            <a href="#" class="media">
                                            <span class="d-flex">
                                                <img src="{{ asset('assets/img/users/1.jpg')}}" class="rounded-circle" alt="">
                                            </span>
                                <span class="media-body">
                                                <span class="heading-font-family media-heading">Steve Smith</span>
                                                <span class="media-content">I slowly updated projects</span>
                                            </span>
                            </a>
                            <a href="#" class="media">
                                            <span class="d-flex">
                                                <i class="ik ik-calendar"></i>
                                            </span>
                                <span class="media-body">
                                                <span class="heading-font-family media-heading">To Do</span>
                                                <span class="media-content">Meeting with Nathan on Friday 8 AM ...</span>
                                            </span>
                            </a>
                        </div>
                        <div class="footer"><a href="javascript:void(0);">See all activity</a></div>
                    </div>
                </div>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="{{ asset('assets/img/user.jpg')}}" alt=""></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item">Username</a>
                        <hr>
                        <a class="dropdown-item" href="profile.html"><i class="ik ik-user dropdown-icon"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i> Settings</a>
{{--                        <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();"><i class="ik ik-power dropdown-icon"></i> Logout</a>--}}
{{--                        <form id="logout-form" action="{{ route('admin.logout') }}"  style="display: none;">--}}
{{--                        @csrf--}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
