<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="nav-devider"></li>
        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-view-dashboard mdi-24px text-info"></i><span class="hide-menu">@lang('sidebar_navigation.link.dashboard')</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="#">@lang('sidebar_navigation.link.view') </a></li>
            </ul>
        </li>
        <li class="nav-small-cap">@lang('sidebar_navigation.title.tasks')</li>
        <li>
            <a class="has-arrow waves-effect waves-dark" href="#"><i class="mdi mdi-book-plus mdi-24px text-purple"></i><span class="hide-menu">@lang('sidebar_navigation.link.available')</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="#">@lang('sidebar_navigation.link.available_show') </a></li>
            </ul>
        </li>
        <li class="nav-small-cap">@lang('sidebar_navigation.title.management')</li>
        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-edit mdi-24px text-warning"></i><span class="hide-menu">@lang('sidebar_navigation.link.assistants')</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="#">@lang('sidebar_navigation.link.assistants_show') </a></li>
            </ul>
        </li>
        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-tasks mdi-24px text-orange"></i><span class="hide-menu">@lang('sidebar_navigation.link.tasks')</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="#">@lang('sidebar_navigation.link.tasks_show') </a></li>
            </ul>
        </li>

        <li class="nav-small-cap">@lang('sidebar_navigation.title.configuration')</li>
        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-settings mdi-24px text-danger"></i><span class="hide-menu">@lang('sidebar_navigation.link.app')</span></a>
            <ul aria-expanded="false" class="collapse">
                <li><a href="#">@lang('sidebar_navigation.link.app_show') </a></li>
            </ul>
        </li>
    </ul>
</nav>
