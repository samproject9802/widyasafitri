function printDiv() {
    var divToPrint = document.getElementById('laporanppkm');

    var newWin = window.open('', 'Print-Window');

    var printdoc = divToPrint.innerHTML;

    newWin.document.open();

    newWin.document.write(`
      <html>

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
            <title>Laporan Pengajuan</title>
        </head>

        <body onload="window.print()">
        '${printdoc}'

        <script src="../plugin/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

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
      </html>`);

    newWin.document.close();

}