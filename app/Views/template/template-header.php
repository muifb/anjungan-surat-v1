<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= $title; ?> - Anjungan Surat</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="<?= APPURL . '/assets/img/envelope-arrow-down-fill.png" rel="icon' ?>">
    <link href="<?= APPURL . '/assets/img/envelope-solid.png' ?>" rel="envelope-solid">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= APPURL . '/assets/vendor/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?= APPURL . '/assets/vendor/bootstrap-icons/bootstrap-icons.css' ?>" rel="stylesheet">
    <link href="<?= APPURL . '/assets/vendor/aos/aos.css" rel="stylesheet' ?>">
    <link href="<?= APPURL . '/assets/vendor/glightbox/css/glightbox.min.css' ?>" rel="stylesheet">
    <link href="<?= APPURL . '/assets/vendor/swiper/swiper-bundle.min.css' ?>" rel="stylesheet">
    <link href="<?= APPURL . '/assets/vendor/datatables/datatables.min.css' ?>" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Main CSS File -->
    <link href="<?= APPURL . '/assets/css/main.css' ?>" rel="stylesheet">
    <link href="<?= APPURL . '/css/flatpickr.min.css' ?>" rel="stylesheet" />

    <style>
        @media print {
            :root {
                --background-color: #ffffff;
                --default-color: #444444;
                --heading-color: #124265;
                --accent-color: ##ffffff;
                --surface-color: #ffffff;
                --contrast-color: #ffffff;
            }

            .header,
            .no-print,
            .logo,
            .sitename,
            .navmenu,
            .menu-nav,
            .menu-nav-devider,
            .nav-item,
            .footer {
                display: none;
            }
        }
    </style>

</head>

<body class="index-page">
    <!-- <header id="header" class="header d-flex align-items-center sticky-top"> -->
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl position-relative d-flex align-items-center no-print">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <h1 class="sitename">Anjungan Surat</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul class="menu-nav">
                    <?php if ($_SESSION['login']['akses'] == "Administrator" || $_SESSION['login']['akses'] == "Petugas") : ?>
                        <li><a href=" <?= APPURL ?>" class="<?= $title == "Home" ? 'active' : ''; ?>">Home<br></a></li>
                        <li><a href="#services">Cetak Surat</a></li>
                    <?php endif ?>
                    <li><a href="<?= APPURL . '/laporan'; ?>" class="<?= $title == "Laporan" ? 'active' : ''; ?>">Laporan</a></li>
                    <?php if ($_SESSION['login']['akses'] == "Administrator") : ?>
                        <li class="dropdown">
                            <a href="#" class="">
                                <span class="mr-2 d-lg-inline">Kelola Data</span>
                                <i class="bi bi-chevron-down toggle-dropdown"></i>
                            </a>
                            <ul class="">
                                <li>
                                    <a class="dropdown-item" href="<?= APPURL . '/data-warga'; ?>">
                                        <i class="bi bi-person-lines-fill fa-sm fa-fw mr-2 text-gray-400 me-3"></i>
                                        Data Warga
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= APPURL . '/data-perangkat'; ?>">
                                        <i class="bi bi-people-fill fa-sm fa-fw mr-2 text-gray-400 me-3"></i>
                                        Data Perangkat
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= APPURL . '/data-user'; ?>">
                                        <i class="bi bi-person-fill-gear fa-sm fa-fw mr-2 text-gray-400 me-3"></i>
                                        Data User
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif ?>
                    <div class="topbar-divider d-none d-sm-block menu-nav-devider"></div>
                    <li class="dropdown">
                        <a href="#" class="">
                            <span class="mr-2 d-lg-inline text-gray-600 small">Hello, <?= ucwords($nama['nama']); ?></span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>
                        <ul class="">
                            <li>
                                <a class="dropdown-item" href="<?= APPURL . '/profile'; ?>">
                                    <i class="bi bi-person-fill fa-sm fa-fw mr-2 text-gray-400 me-3"></i>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                    <i class="bi bi-box-arrow-right fa-sm fa-fw mr-2 text-gray-400 me-3"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>
    <main class="main">
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Apakah yakin ingin keluar?</h5>
                        <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning" role="alert">
                            <?= $nama['nama']; ?>
                            <i class="bi bi-exclamation-triangle ms-3"></i>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href="<?= APPURL . '/logout' ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>