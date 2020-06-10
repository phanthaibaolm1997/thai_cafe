<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">
    <div class="sidebar-header">
        <div class="sidebar-title">
            Quản lý Coffee
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html"
            data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>
    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-copy" aria-hidden="true"></i>
                            <span>Nhân sự</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                            <a href="{{ route('admin.nguoidung') }}">
                                    Quản lý nhân sự
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                            <span>Khu vực</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{ route('admin.area') }}">
                                    Quản Lý Khu vực - Bàn
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span>Mặt Hàng</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{ route('admin.prod') }}">
                                    Quản Lý Mặt Hàng
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-table" aria-hidden="true"></i>
                            <span>Phân Công</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{ route('admin.phancong') }}">
                                    Phân Công Lao Động
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>Quản Lý Order</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{ route('admin.order') }}">
                                   Quản Lý Chung
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-columns" aria-hidden="true"></i>
                            <span>Lương Nhân Viên</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{ route('admin.nguoidung.luong') }}">
                                    Lương Hàng Tháng
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-align-left" aria-hidden="true"></i>
                            <span>Quản Lý Chung</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="{{ route('admin.vaitro') }}">Vai Trò - Lương</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.nguyenlieu') }}">NCC - Nguyên Liệu - Loại Hàng</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</aside>