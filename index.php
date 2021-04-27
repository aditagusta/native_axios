<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<?php
include "partial/head.php";
session_start();
if (empty($_SESSION['email'])) {
    echo "<script> 
		alert('Anda harus login');
		window.location.href='login.php';
		</script>";
}
if (($_SESSION['email']) != NULL) {
    // echo "<script> 
	// 	window.location.href='index.php';
	// 	</script>";
}
?>

<body class="hold-transition sidebar-mini">

    <!-- REQUIRED SCRIPTS -->
    <!-- Axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>

    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- DataTables -->

    <div class="wrapper">
        <?php
        include "partial/bar.php";
        include "partial/koneksi.php";
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid">
                    <!-- Content Header (Page header) -->
                    <?php
                    if (!empty($_GET['page'])) {
                        include_once($_GET['page'] . ".php");
                    } else {
                        include "home.php";
                    }
                    ?>
                    <!-- /.content -->
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <a href="logout.php">- LogOut</a>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <?php include "partial/footer.php"; ?>
    </div>
</body>

</html>