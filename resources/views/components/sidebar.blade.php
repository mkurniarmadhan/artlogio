<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">{{config('app.name')}}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">{{ config('app.name') }}</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class='{{ Request::is('dashboard') ? 'active' : '' }}'>
                <a class="nav-link" href="{{ url('dashboard') }}">Dashboard</a>
            </li>


            <li class="menu-header">Pages</li>
            <li class="nav-item dropdown {{ Request::is('posts') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Post</span></a>
                <ul class="dropdown-menu">
                  <li class="{{ Request::is('posts.index') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ route('posts.index') }}">Daftar Post</a>
                    </li>
                  <li class="{{ Request::is('posts.create') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ route('posts.create') }}">Buat Post</a>
                    </li>
                </ul>
            </li>


        </ul>


    </aside>
</div>
