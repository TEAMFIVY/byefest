<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/mazer/dist/') ?>assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?= base_url('assets/mazer/dist/') ?>assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="<?= base_url('assets/mazer/dist/') ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url('assets/mazer/dist/') ?>assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/mazer/dist/') ?>assets/css/app.css">
    <link rel="shortcut icon" href="<?= base_url('assets/mazer/dist/') ?>assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="<?= base_url('assets/mazer/dist/') ?>assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
    <li class="sidebar-title">Menu</li>

    <!-- Dashboard -->
    <li class="sidebar-item <?= $this->uri->segment(1) == 'home' ? 'active' : '' ?>">
        <a href="<?= base_url('home') ?>" class="sidebar-link">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Data Master -->
    <li class="sidebar-item has-sub 
        <?= in_array($this->uri->segment(2), ['member', 'guru', 'buku']) ? 'active' : '' ?>">
        <a href="#" class="sidebar-link">
            <i class="bi bi-collection-fill"></i>
            <span>Data Master</span>
        </a>
        <ul class="submenu">
            <li class="submenu-item <?= $this->uri->segment(2) == 'member' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/member/index') ?>">
                    <i class="bi bi-people-fill"></i> Member
                </a>
            </li>
            <li class="submenu-item <?= $this->uri->segment(2) == 'guru' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/guru/index') ?>">
                    <i class="bi bi-person-badge-fill"></i> Guru
                </a>
            </li>
            <li class="submenu-item <?= $this->uri->segment(2) == 'buku' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/buku/index') ?>">
                    <i class="bi bi-journal-bookmark-fill"></i> Buku
                </a>
            </li>
        </ul>
    </li>

    <!-- Latihan Soal -->
    <li class="sidebar-item <?= $this->uri->segment(2) == 'latihan_soal' ? 'active' : '' ?>">
        <a href="<?= base_url('admin/latihan_soal') ?>" class="sidebar-link">
            <i class="bi bi-journal-text"></i>
            <span>Latihan Soal</span>
        </a>
    </li>

    <!-- Try Out -->
    <li class="sidebar-item <?= $this->uri->segment(2) == 'tryout' ? 'active' : '' ?>">
        <a href="<?= base_url('admin/tryout') ?>" class="sidebar-link">
            <i class="bi bi-pencil-square"></i>
            <span>Try Out</span>
        </a>
    </li>
</ul>

                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3><?= $title; ?></h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <?= $contents; ?>
                </section>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/mazer/dist/') ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url('assets/mazer/dist/') ?>assets/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url('assets/mazer/dist/') ?>assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="<?= base_url('assets/mazer/dist/') ?>assets/js/pages/dashboard.js"></script>

    <script src="<?= base_url('assets/mazer/dist/') ?>assets/js/main.js"></script>
</body>

</html>