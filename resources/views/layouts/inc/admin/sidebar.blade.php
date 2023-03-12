<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{url('admin/dashboard')}}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#"
                onclick="openExternalPage('https://analytics.google.com/analytics/web/#/p356508490/reports/reportinghub?params=_u..nav%3Dmaui&collectionId=user');"
                aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-chart-pie menu-icon"></i>
                <span class="menu-title">Analytics</span>

            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{url('admin/users')}}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Manage Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('admin/google')}}">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Manage Reports</span>
            </a>
        </li>
    </ul>
</nav>