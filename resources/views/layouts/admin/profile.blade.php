<ul class="navbar-nav my-lg-0">
    <!-- ============================================================== -->
    <!-- Search -->
    <!-- ============================================================== --
    <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
        <form class="app-search">
            <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
    </li>
    -- ============================================================== -->

    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Profile -->
    <!-- ============================================================== -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/templates/admin/images/avatar.png" alt="user" class="profile-pic" /></a>
        <div class="dropdown-menu dropdown-menu-right scale-up">
            <ul class="dropdown-user">
                <li>
                    <div class="dw-user-box">
                        <div class="u-img"><img src="/templates/admin/images/avatar.png" alt="user"></div>
                        <div class="u-text">
                            <h4>{{ Auth::user()->first_name??'' }}</h4>
                            <p class="text-muted">{{ Auth::user()->email??'' }}</p>
                        </div>
                    </div>
                </li>
                <li role="separator" class="divider"></li>
                @include('layouts.admin.profile-actions')
            </ul>
        </div>
    </li>
</ul>
