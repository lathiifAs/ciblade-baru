<body>
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <li @if (empty($seg_menu)) class="active" @endif>
                        <a class="sidebar-sub-toggle"><i class="ti-home"></i> Dashboard <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="{{ site_url('welcome') }}">Dashboard 1</a></li>
                             
                        </ul>
                    </li>
                    <li><a target="_blank" href="https://docs.vuejsadmin.com/docs/nixon-admin/"><i class="ti-file"></i> Documentation</a></li>
                    <li @if (!empty($seg_menu) and $seg_menu == 'master') class="active" @endif>
                            <a class="sidebar-sub-toggle"><i class="ti-harddrives"></i> Master Data <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="{{ site_url('master/user') }}">User</a></li>
                            </ul>
                    </li>
                    @if($user_login['role_nm'] == 'developer')
                        <li @if (!empty($seg_menu) and $seg_menu == 'role') class="active" @endif>
                                <a class="sidebar-sub-toggle"><i class="ti-settings"></i> Sistem <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                                <ul>
                                    <li><a href="{{ site_url('sistem/role') }}">Role</a></li>
                                    <li><a href="{{ site_url('sistem/group') }}">Group</a></li>
                                </ul>
                        </li>
                    @endif
                    <li><a href="{{ site_url('client/beranda') }}" style='color:#00838F'> <i class="ti-home"></i> Beranda</a></li>
                    <li><a href="{{ site_url('sistem/login/logout') }}"><i class="ti-close"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>