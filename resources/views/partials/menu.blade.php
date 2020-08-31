<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
            src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ Session::get('name') }}</p>
            <p class="app-sidebar__user-designation">{{user()->name}}</p>
        </div>
    </div>
    <ul class="app-menu">
        {{-- Dashboard --}}
        <li><a class="app-menu__item @yield('dashboard')" href="{{ url('home') }}">
                <i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
        </li>
        @can('can create user')
            <li class="treeview"><a class="app-menu__item @yield('users')" href="#" data-toggle="treeview"><i
                        class="app-menu__icon fa fa-user"></i><span class="app-menu__label">users</span><i
                        class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="app-menu__item @yield('users')" href="{{ url('users') }}"><i
                        class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Users</span></a></li>
                </ul>
            </li>
        @endcan
        @can('can view')
        <li><a class="app-menu__item @yield('youth_info')" href="{{ url('youth_information') }}"><i
                    class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Youth Info</span></a></li>
        <li><a class="app-menu__item @yield('youth_org')" href="{{ url('youth_organizations') }}"><i
                    class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Youth Orgainzations</span></a>
        </li>
        <li><a class="app-menu__item @yield('partners')" href="{{ url('partners') }}"><i
                    class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Partners</span></a></li>
        @endcan

        @can('send mail')
        <li class="treeview"><a class="app-menu__item @yield('mail')" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-envelope"></i><span class="app-menu__label">Mail</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="app-menu__item @yield('youth_info')" href="{{ url('mail') }}"><i
                            class="app-menu__icon fa fa-send"></i><span class="app-menu__label">Send Mail</span></a>
                </li>
            </ul>
        </li>
        @endcan

        {{-- logout --}}
        <li>
            <a class="app-menu__item @yield('')" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="app-menu__icon fa fa-send"></i><span class="app-menu__label">Logout</span>
            </a>
        </li>
    </ul>
    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display:none">
        @csrf
    </form>
</aside>
