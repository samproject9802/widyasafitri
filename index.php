<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/body.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="plugin/fontawesome/css/all.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="plugin/bootstrap/css/bootstrap.min.css">
    <!-- Link JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Link CSS Sidebar -->
    <link href="plugin/sidebar/css/simple-sidebar.css" rel="stylesheet">
    <!-- Link CSS Data Table -->
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Link CSS & JS Sweet Alert -->
    <link rel="stylesheet" href="plugin/sweetalert2/dist/sweetalert2.min.css">
    <script src="plugin/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="js/sweetalert.js"></script>

    <title>Website Pengajuan PPKM</title>
</head>

<body>

    <div class="card">
        <div class="card-header p-0">
            <img src="assets/banner-web.jpg" class="img-fluid" alt="...">
            <nav class="navbar navbar-expand-lg navbar-custom">
                <div class="container-fluid">
                    <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <ul class="navbar-nav w-100 nav-justified me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="?page=beranda">BERANDA</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=bidang-pkm">BIDANG PKM</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=syarat-pengajuan">SYARAT PENGAJUAN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?page=visi-misi">VISI & MISI KAMPUS</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="card-body p-0 m-0">
            <div class="d-flex" id="wrapper">

                <div class="bg-primary border-right" id="sidebar-wrapper">
                    <div class="sidebar-heading"></div>
                    <div class="list-group list-group-flush px-3">
                        <a class="btn btn-danger px-4" href="?page=login-kaprodi">LOGIN KAPRODI</a>
                        <a class="btn btn-danger mt-3" href="?page=login-mahasiswa">LOGIN MAHASISWA</a>
                    </div>
                </div>

                <div id="page-content-wrapper">

                    <nav class="navbar navbar-dark bg-transparent border-bottom px-2">
                        <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars"></i></button>

                        <!-- <div class="content-tab px-4">
                        </div> -->

                    </nav>

                    <div class="container-fluid p-4" style="background-image: url('library/assets/bg-body.jpg');">
                        <?php
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                            if ($page == "beranda") {
                                include_once 'content/beranda.php';
                            } else if ($page == "bidang-pkm") {
                                include_once 'content/bidangpkm/bidangpkm.php';
                            } else if ($page == "pkm-penelitian") {
                                include_once 'content/bidangpkm/bidang_penelitian.php';
                            } else if ($page == "pkm-kewirausahaan") {
                                include_once 'content/bidangpkm/bidang_kewirausahaan.php';
                            } else if ($page == "pkm-pengabdianmasyarakat") {
                                include_once 'content/bidangpkm/bidang_pengabdianmasyarakat.php';
                            } else if ($page == "pkm-penerapanteknologi") {
                                include_once 'content/bidangpkm/bidang_penerapanteknologi.php';
                            } else if ($page == "pkm-karsacipta") {
                                include_once 'content/bidangpkm/bidang_karsacipta.php';
                            } else if ($page == "pkm-gagasantertulis") {
                                include_once 'content/bidangpkm/bidang_gagasantertulis.php';
                            } else if ($page == "pkm-artikelilmiah") {
                                include_once 'content/bidangpkm/bidang_artikelilmiah.php';
                            } else if ($page == "pkm-gagasanfuturistik") {
                                include_once 'content/bidangpkm/bidang_gagasanfuturistik.php';
                            } else if ($page == "syarat-pengajuan") {
                                include_once 'content/syaratpengajuan.php';
                            } elseif ($page == "visi-misi") {
                                include_once 'content/visimisi/visi.php';
                                include_once 'content/visimisi/misi.php';
                            } elseif ($page == "login-kaprodi") {
                                include_once 'content/login/login_prodi.php';
                                if (isset($_GET['task'])) {
                                    $task = $_GET['task'];
                                    if ($task == "login-success") {
                                        echo "<script>successloginadmin();</script>";
                                    } elseif ($task == "login-failed") {
                                        echo "<script>failedloginadmin();</script>";
                                    }
                                }
                            } elseif ($page == "login-mahasiswa") {
                                include_once 'content/login/login_mhs.php';
                                if (isset($_GET['task'])) {
                                    $task = $_GET['task'];
                                    if ($task == "login-success") {
                                        echo "<script>successloginuser();</script>";
                                    } elseif ($task == "login-failed") {
                                        echo "<script>failedloginuser();</script>";
                                    }
                                }
                            } elseif ($page == "registrasi") {
                                include_once 'content/registrasi/registrasimhs.php';
                                if (isset($_GET['task'])) {
                                    $task = $_GET['task'];
                                    if ($task == "signup-success") {
                                        echo "<script>successsignup();</script>";
                                    } elseif ($task == "signup-failed") {
                                        echo "<script>failedsignup();</script>";
                                    }
                                }
                            }
                        } else {
                            include_once 'content/beranda.php';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            2 days ago
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <!-- Link JS Data Table -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "sScrollX": "100%",
                "bScrollCollapse": true
            });
        });
    </script>

</body>

</html>