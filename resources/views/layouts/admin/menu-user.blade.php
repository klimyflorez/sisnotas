<div class="user-profile">
    <!-- User profile image -->
    <div class="profile-img"> <img src="/templates/admin/images/avatar.png" alt="avatar" />
        <!-- this is blinking heartbit-->
        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
    </div>
    <!-- User profile text-->
    <div class="profile-text">
        <h5>{{ Auth::user()->first_name??'' }}</h5>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('form').submit();" class="" data-toggle="tooltip" title="@lang('auth.logout')"><i class="mdi mdi-power"></i></a>
        <div class="dropdown-menu animated flipInY">
            @include('layouts.admin.profile-actions')

        </div>
    </div>
</div>
