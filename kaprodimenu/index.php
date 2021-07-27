<?php
session_start();

// if (!isset($_SESSION['status'])) {
//     header('Location: ../index.php');
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/body.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="../plugin/fontawesome/css/all.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../plugin/bootstrap/css/bootstrap.min.css">
    <!-- Link JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Link CSS Sidebar -->
    <link href="../plugin/sidebar/css/simple-sidebar.css" rel="stylesheet">
    <!-- Link CSS Data Table -->
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <title>Website Pengajuan PPKM || Mahasiswa</title>
</head>

<body>

    <div class="card">
        <div class="card-header p-0">
            <img src="../assets/banner-web.jpg" class="img-fluid" alt="...">
        </div>
        <div class="card-body p-0 m-0">
            <div class="d-flex" id="wrapper">

                <div class="bg-primary border-right" id="sidebar-wrapper">
                    <div class="sidebar-heading"></div>
                    <div class="list-group list-group-flush px-3">
                        <a class="list-group-item list-group-item-action bg-primary" href="?page=data-pengajuan" style="color: white; font-weight:500;">Data Pengajuan PPKM</a>
                        <a class="list-group-item list-group-item-action bg-primary" href="?page=laporan" style="color: white; font-weight:500;">Laporan</a>
                        <a class="list-group-item list-group-item-action bg-primary" href="../php/mhs/logout.php" style="color: white; font-weight:500;">Logout</a>
                    </div>
                </div>

                <div id="page-content-wrapper">

                    <nav class="navbar navbar-dark bg-transparent border-bottom px-2">
                        <button class="btn btn-primary" id="menu-toggle"><i class="fas fa-bars"></i></button>

                        <div class="content-tab px-4">
                            <!-- <h4>Selamat Datang, <?php echo $_SESSION['username']; ?></h4> -->
                        </div>

                    </nav>

                    <div class="container-fluid p-4" style="background-image: url('library/assets/bg-body.jpg');">
                        <?php
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                            if ($page == "data-pengajuan") {
                                include_once 'content/data_pengajuan.php';
                            } elseif ($page == "laporan") {
                                include_once 'content/laporanppkm.php';
                            }
                        } else {
                            echo "<h2>Selamat datang, Admin Kaprodi</h2>";
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
    <script src="../plugin/bootstrap/js/bootstrap.min.js"></script>
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
                "responsive": true,
                "sScrollX": "100%",
                "bScrollCollapse": true
            });
        });
    </script>

    <script src="../js/printingdoc.js"></script>
    <script src="../js/checkingdata.js"></script>
</body>

</html>