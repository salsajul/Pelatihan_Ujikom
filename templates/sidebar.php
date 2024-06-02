<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <?php
            $sidebar_active = basename($_SERVER['PHP_SELF']);
            ?>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= ($sidebar_active == 'dashboard.php') ? 'active' : ''; ?>">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item <?= (in_array($sidebar_active, ['dosen.php', 'editdosen.php', 'tambahdosen.php'])) ? 'active' : ''; ?>">
                <a class="nav-link" href="dosen.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Dosen</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?= (in_array($sidebar_active, ['mahasiswa.php', 'editmahasiswa.php', 'tambahmahasiswa.php'])) ? 'active' : ''; ?>">
                <a class="nav-link" href="mahasiswa.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Mahasiswa</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?= (in_array($sidebar_active, ['matkul.php', 'editmatkul.php', 'tambahmatkul.php'])) ? 'active' : ''; ?>">
                <a class="nav-link" href="matkul.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Mata Kuliah</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?= (in_array($sidebar_active, ['jadwal.php', 'editjadwal.php', 'tambahjadwal.php'])) ? 'active' : ''; ?>">
                <a class="nav-link" href="jadwal.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Jadwal</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?= (in_array($sidebar_active, ['semester.php', 'editsemester.php', 'tambahsemester.php'])) ? 'active' : ''; ?>">
                <a class="nav-link" href="semester.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Semester</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?= (in_array($sidebar_active, ['krs.php', 'editkrs.php', 'tambahkrs.php'])) ? 'active' : ''; ?>">
                <a class="nav-link" href="krs.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data KRS</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->