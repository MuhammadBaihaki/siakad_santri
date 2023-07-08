<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-clipboard"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Sistem Informasi Akademik Santri</div>
            </a>
            <div class="sidebar">
            <!-- QUERY MENU -->
            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id`, `menu`
                            FROM `user_menu` JOIN `user_access_menu`
                            ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                            WHERE `user_access_menu`.`role_id` = $role_id
                            ORDER BY `user_access_menu`.`menu_id` ASC";

            $menu = $this->db->query($queryMenu)->result_array();
            ?>

            <!-- Sidebar Menu -->
            <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flexcolumn" datawidget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

            <!-- LOOPING MENU -->
            <?php foreach ($menu as $m) : ?>
            <li class="nav-header">
            <?= $m['menu']; ?>
            </li>

            <!-- QUERY SUB-MENU SESUAI MENU -->
            <?php
            $menuId = $m['id'];
            $querySubMenu = "SELECT * FROM `user_sub_menu` JOIN `user_menu`
                                ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                WHERE `user_sub_menu`.`menu_id` = $menuId
                                AND `user_sub_menu`.`is_active` = 1 ";
            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>

            <!-- LOOPING SUBMENU -->
            <?php foreach ($subMenu as $sm) : ?>
                <li class="nav-item">
                <?php if ($title == $sm['title']) : ?>
                    <a href="<?= base_url($sm['url']); ?>" class="nav-link active">
                    <?php else : ?>
                    <a href="<?= base_url($sm['url']); ?>" class="nav-link">
                    <?php endif; ?>
                    <i class="nav-icon <?= $sm['icon']; ?>"></i>
                    <p>
                        <?= $sm['title']; ?>
                    </p>
                    </a>
                </li>

            <!-- AKHIR LOOPING SUBMENU -->
            <?php endforeach; ?>
            <!-- AKHIR LOOPING MENU -->
            <?php endforeach; ?>
                <li class="nav-header">Pengaturan</li>
                <li class="nav-item">
                <a href="<?= base_url('auth/logout')?>" class="nav-link">
                <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                <p>Logout</p>
                </a>
                </li>
                </ul>
                </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                 <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                     <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small"
                            placeholder="Search for..." aria-label="Search"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                        </div>
                    </form>
                </div>
                </li>

                <!-- Nav Item - User Information -->
                <ul class="na navbar-nav navbar-right">
                    <?php if($this->session->userdata('email')){?>
                        <li><div class="mr-3">Selamat Datang <?php echo $this->session->userdata('email')?></div></li>
                        <li><?php echo anchor('auth/logout', 'Logout') ?></li>
                        <?php }else { ?>
                        <li><?php echo anchor('auth/login', 'Login') ?></li>
                        <?php } ?>
                        </ul>
                    </ul>
                </nav>
                <!-- End of Topbar -->
