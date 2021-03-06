<nav class="sidebar-nav">
    <ul id="sidebarnav">
        @role('admin')
        <li class="nav-devider"></li>
        <li class="nav-small-cap">@lang('sidebar_navigation.title.sis_notes')</li>
        <li>
            <a class="has-arrow waves-effect waves-dark" href="#"><i class="mdi mdi-account-multiple-plus mdi-24px text-purple"></i><span class="hide-menu">@lang('sidebar_navigation.link.available')</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="{{ route('students.index') }}">@lang('sidebar_navigation.link.available_show') </a></li>
            </ul>
        </li>
        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-tasks mdi-24px text-orange"></i><span class="hide-menu">@lang('sidebar_navigation.link.tasks')</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="{{ route('subjects.index') }}">@lang('sidebar_navigation.link.tasks_show') </a></li>
            </ul>
        </li>
        @endrole
        @role('teacher|admin')
        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-apps mdi-24px text-warning"></i><span class="hide-menu">@lang('sidebar_navigation.link.assistants')</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="{{ route('courses.index') }}">@lang('sidebar_navigation.link.assistants_show') </a></li>
            </ul>
        </li>
        @endrole
        @role('admin')
        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-check mdi-24px text-danger"></i><span class="hide-menu">@lang('sidebar_navigation.link.app')</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="{{ route('inscriptions.index') }}">@lang('sidebar_navigation.link.app_show') </a></li>
            </ul>
        </li>
        <li class="nav-small-cap">@lang('sidebar_navigation.title.api')</li>
        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-view-dashboard mdi-24px text-info"></i><span class="hide-menu">@lang('sidebar_navigation.link.dashboard')</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="{{ route('home') }}">@lang('sidebar_navigation.link.view') </a></li>
            </ul>
        </li>
        @endrole
    </ul>
</nav>
