<!-- Sidebar -->
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <!-- Dashboard Link -->
            <li class="nav-item">
                <!-- Apply 'active' class if the current route is 'dashboard' -->
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : 'text-dark'}}" aria-current="page" href="/dashboard">
                    <i class="bi bi-house-door me-2"></i>
                    Dashboard
                </a>
            </li>
            <!-- My Posts Link -->
            <li class="nav-item">
                <!-- Apply 'active' class if the current route is 'dashboard/posts' -->
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : 'text-dark'}}" href="/dashboard/posts">
                    <i class="bi bi-file-text me-2"></i>
                    My Posts
                </a>
            </li>
        </ul>
    </div>
</nav>
