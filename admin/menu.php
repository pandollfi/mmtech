<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" role="button" title="Sair do Sistema">
                        <i class="fas fa-user"></i> </a>
                </li>
            </ul>
        </nav>





        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="<?php echo URL_ADMIN; ?>index.php" class="brand-link">
                <img src="<?php echo URL; ?>dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">
                    <b>MMTech | Admin</b>
                </span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="<?php echo URL_ADMIN; ?>index.php" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Página Inicial</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo URL_ADMIN; ?>lista_funcionarios.php" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Funcionários</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo URL_ADMIN; ?>lista_setores.php" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Setores</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>


            </ul>
        </aside>


        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <br>