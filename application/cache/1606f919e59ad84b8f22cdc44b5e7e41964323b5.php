<body>
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <li <?php if(empty($seg_menu)): ?> class="active" <?php endif; ?>>
                        <a class="sidebar-sub-toggle"><i class="ti-home"></i> Dashboard <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                        <ul>
                            <li><a href="<?php echo e(site_url('welcome')); ?>">Dashboard 1</a></li>
                             
                        </ul>
                    </li>
                    <li><a target="_blank" href="https://docs.vuejsadmin.com/docs/nixon-admin/"><i class="ti-file"></i> Documentation</a></li>
                    <li <?php if(!empty($seg_menu) and $seg_menu == 'master'): ?> class="active" <?php endif; ?>>
                            <a class="sidebar-sub-toggle"><i class="ti-harddrives"></i> Master Data <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="<?php echo e(site_url('master/user')); ?>">User</a></li>
                            </ul>
                    </li>
                    <?php if($user_login['role_nm'] == 'developer'): ?>
                        <li <?php if(!empty($seg_menu) and $seg_menu == 'role'): ?> class="active" <?php endif; ?>>
                                <a class="sidebar-sub-toggle"><i class="ti-settings"></i> Sistem <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                                <ul>
                                    <li><a href="<?php echo e(site_url('sistem/navigation')); ?>">Menu Navigasi</a></li>
                                    <li><a href="<?php echo e(site_url('sistem/role')); ?>">Role</a></li>
                                    <li><a href="<?php echo e(site_url('sistem/group')); ?>">Group</a></li>
                                </ul>
                        </li>
                    <?php endif; ?>
                    <li><a href="<?php echo e(site_url('client/beranda')); ?>" style='color:#00838F'> <i class="ti-home"></i> Beranda</a></li>
                    <li><a href="<?php echo e(site_url('sistem/login/logout')); ?>"><i class="ti-close"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>