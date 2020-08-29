<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
    <div>
        <p class="app-sidebar__user-name">{{Session::get('name')}}</p>
        <!--<p class="app-sidebar__user-designation">Frontend Developer</p>-->
    </div>
    </div>
    <ul class="app-menu">
        {{-- Dashboard --}}
        <li><a class="app-menu__item @yield('dashboard')" href="{{url('home')}}">
            <i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
        </li>
        {{-- Admin --}}
        <li class="treeview"><a class="app-menu__item @yield('users')" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Speakers</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="app-menu__item @yield('users_page')" href="{{url('speakers')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Speakers</span></a></li>
            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item @yield('faq')" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-question"></i><span class="app-menu__label">FAQS</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="app-menu__item @yield('faq')" href="{{url('faqs')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">FAQS</span></a></li>
            </ul>
        </li>

        {{-- logout --}}
        <li>
            <a  class="app-menu__item @yield('')" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="app-menu__icon fa fa-send"></i><span class="app-menu__label">Logout</span>
            </a>
        </li>       
    </ul>
    <form id="logout-form" method="POST" action="{{route('logout')}}" style="display:none">
        @csrf
    </form>
</aside>