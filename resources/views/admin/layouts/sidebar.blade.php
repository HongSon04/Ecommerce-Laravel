    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="index.html">Chú Bé</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="index.html">CB</a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Bảng Điều Khiển</li>
                <li class="dropdown active">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link has-dropdown"><i
                            class="fas fa-fire"></i><span>Bảng Điều Khiển</span></a>
                </li>
                <li class="menu-header">Starter</li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                            class="fas fa-columns"></i>
                        <span>Quản Lý Website</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('admin.slider.index') }}">Main Banner Slider</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                            class="fas fa-columns"></i>
                        <span>Quản Lý Danh Mục</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('admin.category.index') }}">Danh Mục</a></li>

                    </ul>
                </li>

                {{-- <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                            class="fas fa-columns"></i>
                        <span>Layout</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                        <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                        <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                    </ul>
                </li> --}}


                <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
            </ul>
        </aside>
    </div>
