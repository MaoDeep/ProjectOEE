<?php

use LDAP\Result;

session_start();
require('config.php');
if (empty($_SESSION["status"]) || $_SESSION["status"] !== "Admin") {
    header('Location: index.php');
    exit(0);
}



if (isset($_GET['del'])) {
    if ($_GET['del'] == 1) {
        echo "<script>alert('ลบสำเร็จ')</script>";
    } elseif ($_GET['del'] == 0) {
        echo "<script>alert('ลบไม่สำเร็จ')</script>";
    }
}
if (isset($_POST['submit'])) {
    $sql = "UPDATE `employee` SET `EName` = '" . $_POST['txt1'] . "',`Econ` = '" . $_POST['txt2'] . "',`EPro` = '" . $_POST['txt3'] . "',`Etime` = '" . $_POST['txt4'] . "',`Etimet` = '" . $_POST['txt5'] . "'
     WHERE `employee`.`E_id` = '" . $_POST['txt0'] . "';";
    $re = mysqli_query($conn, $sql);
    if ($re) {
        echo "<script>alert('บันทึกสำเร็จ')</script>";
    } else {
        echo "<script>alert('บันทึกไม่สำเร็จ')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ตารางข้อมูล</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pridi:wght@300&display=swap" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top" style="font-family: 'Pridi', serif;">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" style="background-color: rgb(28 134 238);" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                <div class="">
                    <img src="img/logo.png" height="65px" width="140px">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>หน้าหลัก</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Form
            </div>



            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-clipboard"></i>
                    <span>จัดการข้อมูล</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">แบบฟอร์มการทำงาน:</h6>
                        <a class="collapse-item" href="tables.php">บันทึกยอดผลิตประจำวัน</a>
                        <a class="collapse-item" href="form.php">กรอกข้อมูลการทำงาน</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Report
            </div>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.php">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>กราฟ</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="user.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>จัดการข้อมูลผู้ใช้</span></a>
            </li>

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
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>

                            </a>

                            <!-- Dropdown - Messages -->

                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>

                                            </button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Name : <?php echo $_SESSION["user"] ?> <br>Status : <?php echo $_SESSION["status"] ?> </span>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    ออกจากระบบ
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ยอดผลิตประจำวัน</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-6"></div>
                                <div class="col-6">
                                    <div class="row">
                                        <div class="col-6"></div>
                                        <div class="col-6 col order-last"><a href="addtables.php"><button type="button" class="btn-info btn-sm btn ">เพิ่มข้อมูล</button></a></div>
                                    </div>


                                    <div class="row mt-3">
                                        <div class="col-auto">
                                            <label for="d1" class="col-form-label">วันที่ : </label>
                                        </div>
                                        <div class="col-sm-3"><input type="date" name="d1" id="d1" class="form-control form-control-sm"></div>
                                        <div class="col-auto">
                                            <label for="d2" class="col-form-label">ถึง : </label>
                                        </div>
                                        <div class="col-sm-3"><input type="date" name="d2" id="d2" class="form-control form-control-sm"></div>
                                        <div class="col-sm-3"><button type="button" id="pdf" class="btn btn-sm btn-success" onclick="x()" style="width: 10rem;"><i class="bi bi-filetype-pdf"></i> ออกรายงาน PDF</button></div>
                                    </div>

                                </div>

                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>วันที่</th>
                                            <th>ชื่อ</th>
                                            <th>ชิ้นงานที่ทำได้</th>
                                            <th>รุ่นที่ผลิต</th>
                                            <th>ของเสีย</th>
                                            <th>เวลาเข้างาน</th>
                                            <th>เวลาเลิกงาน</th>
                                            <th>เเก้ไข</th>
                                            <th>ลบ</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    require('config.php');
                                    mysqli_query($conn, 'SET NAMES UTF8');
                                    $sql = "SELECT * FROM employee ";
                                    $query = mysqli_query($conn, $sql);
                                    $n1 = 0;
                                    while ($value = mysqli_fetch_array($query)) {
                                        $d = date_create($value['DATE']);
                                        $d1 = date_format($d, "d/m/Y");
                                        $n1++;
                                        echo '<tr>
                    <td>' . $n1 . '</td>
                    <td>' . $d1 . '</td>
                    <td>' . $value['EName'] . '</td>
                    <td>' . $value['Econ'] . '</td>
                    <td>' . $value['Epro'] . '</td>
                    <td>' . $value['Edel'] . '</td>
                    <td>' . $value['Etime'] . '</td>
                    <td>' . $value['Etimet'] . '</td>
                    <td><a href="edittables.php?id=' . $value['E_id'] . '"><button class="btn-warning btn-md btn">เเก้ไข</button></a></td>
                    <td><a href="Delete.php?edit=' . $value['E_id'] . '"><button class="btn-danger btn-md btn" onclick="del()">ลบ</button><a/></td>
                </tr>';
                                    }

                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ออกจากระบบ</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">คุณแน่ใจเเล้วนะว่าจะออกจากระบบ</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                    <a class="btn btn-primary" href="index.php">ออกจากระบบ</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function x() {
            var x = document.getElementById("d1").value
            var x1 = document.getElementById("d2").value

            window.location.href = "PDF.php?d1=" + x + "&d2=" + x1;

        }
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>