<?php

use LDAP\Result;

session_start();
require('config.php');



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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pridi:wght@300&display=swap" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top" style="font-family: 'Pridi', serif;">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" style="background-color: rgb(54 54 54);" id="accordionSidebar">

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
                From
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
                        <a class="collapse-item" href="form.php">กรอกข้อมูล</a>
                        <a class="collapse-item" href="tables.php">บันทึกยอดผลิตประจำวัน</a>
                        
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
                            <h6 class="m-0 font-weight-bold text-primary">ประสิทธิผลโดยรวมของเครื่องจักร</h6>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto col-12">
                                <div class="card">
                                    <div class="card-header">
                                    OEE
                                    </div>
                                    <div class="card-body">
                                        <div class="row ">
                                           

                                            <div class="table-responsive">
                                                <table class="table table-bordered text-center table-sm " id="dataTable">

                                                    <thead>
                                                        <tr bgcolor="PeachPuff">
                                                            <th>ลำดับ</th>
                                                            <th>วันที่</th>
                                                            <th>อัตราการเดินเครื่องจักร</th>
                                                            <th>ประสิทธิภาพของเครื่องจักร</th>
                                                            <th>อัตราคุณภาพ</th>
                                                            <th>ผลรวม OEE</th>
                                                            <th>ผู้บันทึก</th>
                                                            <th>รายละเอียด</th>
                                                    </thead>
                                                    <?php

                                                    mysqli_query($conn, 'SET NAMES UTF8');
                                                    $sql = "SELECT * FROM `report` INNER JOIN users on report.u_id = users.u_id;";
                                                    $query = mysqli_query($conn, $sql);
                                                    $n1 = 0;
                                                    while ($value = mysqli_fetch_array($query)) {
                                                        $d = date_create($value['date']);
                                                        $d1 = date_format($d, "d/m/Y");
                                                        $n1++;
                                                        echo '<tr>
                    <td>' . $n1 . '</td>
                    <td>' . $d1 . '</td>
                    <td>' . $value['TR'] . '</td>
                    <td>' . $value['TS'] . '</td>
                    <td>' . $value['NT'] . '</td>
                    <td>' . $value['EU'] . '</td>
                    <td>' . $value['u_usersname'] . '</td>
                    <td><a href="charts.php?id=' . $value["id"] . '&name=' . $value["u_usersname"] . '&date=' . $d1 . '"><button type="button" class="btn btn-warning">ดู</button></a></td>
                   
                </tr>';
                                                    }

                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mx-auto">

                                    <?php
                                    if (isset($_GET["id"])) {
                                        $sql = "SELECT * FROM `report` INNER JOIN users on report.u_id = users.u_id WHERE report.id =" . $_GET["id"];
                                        $re = mysqli_query($conn, $sql);

                                        foreach ($re as $row) {
                                            $date = date_create($row["date"]);
                                            $d = date_format($date, "d/m/Y");
                                    ?>
                                            <div class="card mt-3 ">
                                                <div class="card-header">
                                                    <div>กราฟOEE</div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="text-right h6">วันที่ : <?= $_GET["date"] ?></div>
                                                    <div class="text-right h6">ผู้บันทึก : <?= $_GET["name"] ?></div>

                                                    <canvas id="myChart"></canvas>
                                                    <div class="card mt-3">
                                                        <div class="card-header">
                                                            ข้อมูล
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="  alert alert-warning" role="alert">
                                                            <b>Date = วันที่ /A = เวลาทำงานทั้งหมด /B = เวลาตอนพักของพนักงาน /C = เวลาทำงานหลังพัก /D = เวลาปิดเครื่องตอนพัก /E = อัตราการเดินเครื่องจักร</b><br>
                                                            <br><b>F = เวลาเปิดเครื่องต่อ 1 กะ /G = เวลาหยุดเครื่องต่อ 1 กะ /H = ประสิทธิภาพของเครื่องจักร /I = จำนวนชิ้นงานที่ผลิตได้ต่อ 1 กะ /J = จำนวนชิ้นงานที่เสียต่อ 1 กะ</b><br>
                                                            <b><br>K = อัตราคุณภาพของเครื่องจักร /L = อัตราการเดินเครื่องจักร /M = ประสิทธิภาพของเครื่องจักร /N = อัตราคุณภาพของเครื่องจักร /O = ผลรวม OEE /ชื่อ = ผู้บันทึก</b>
                                                            </div>
                                                            <table class="table table-bordered text-center">
                                                                <thead>
                                                                    <tr bgcolor="PeachPuff">
                                                                        <th>Date</th>
                                                                        <th>A</th>
                                                                        <th>B</th>
                                                                        <th>C</th>
                                                                        <th>D</th>
                                                                        <th>E</th>
                                                                        <th>F</th>
                                                                        <th>G</th>
                                                                        <th>H</th>
                                                                        <th>I</th>
                                                                        <th>J</th>
                                                                        <th>K</th>
                                                                        <th>L</th>
                                                                        <th>M</th>
                                                                        <th>N</th>
                                                                        <th>O</th>
                                                                        <th>ชื่อ</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th><?php echo $d ?></th>
                                                                        <th><?php echo $row["AT"] ?></th>
                                                                        <th><?php echo $row["SP"] ?></th>
                                                                        <th><?php echo $row["WT"] ?></th>
                                                                        <th><?php echo $row["MS"] ?></th>
                                                                        <th><?php echo $row["MIX"] ?></th>
                                                                        <th><?php echo $row["RT"] ?></th>
                                                                        <th><?php echo $row["MSS"] ?></th>
                                                                        <th><?php echo $row["TT"] ?></th>
                                                                        <th><?php echo $row["NO"] ?></th>
                                                                        <th><?php echo $row["NUM"] ?></th>
                                                                        <th><?php echo $row["TOT"] ?></th>
                                                                        <th><?php echo $row["TR"] ?></th>
                                                                        <th><?php echo $row["TS"] ?></th>
                                                                        <th><?php echo $row["NT"] ?></th>
                                                                        <th><?php echo $row["EU"] ?></th>
                                                                        <th><?php echo $row["u_usersname"] ?></th>

                                                                    </tr>

                                                                </tbody>
                                                            </table>

                                                        </div>

                                                    </div>

                                            <?php
                                        }
                                    }
                                            ?>
                                                </div>
                                            </div>
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
    <?php
    if (isset($_GET["id"])) {
        $sql = "SELECT * FROM `report` WHERE id = '" . $_GET["id"] . "'";
        $re = mysqli_query($conn, $sql);

        foreach ($re as $rw) {
            $d = date_create($rw["date"]);
            $arr = array(
                $rw["TR"],
                $rw["TS"],
                $rw["NT"],
                $rw["EU"],
            );
            $arr1 = array(
                "อัตราการเดินเครื่องจักร",
                "ประสิทธิภาพของเครื่องจักร",
                "อัตราคุณภาพ",
                "ผลรวม OEE"
            );
            $js1 = json_encode($arr);
            $js2 = json_encode($arr1);
        }
    }

    ?>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= $js2 ?>,
                datasets: [{
                    label: 'ยอดขาย',
                    data: <?= $js1 ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                    datalabels: {
                        color: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        anchor: "end",
                        align: "top",
                        formatter: function addCommas(value) {
                            value += '';
                            x = value.split('.');
                            x1 = x[0];
                            x2 = x.length > 1 ? '.' + x[1] : '';
                            var rgx = /(\d+)(\d{3})/;
                            while (rgx.test(x1)) {
                                x1 = x1.replace(rgx, '$1' + ',' + '$2');
                            }
                            return x1 + x2;
                        }
                    }
                }]
            },
            plugins: [ChartDataLabels],
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: false // Hide legend
                }
            }
        });
    </script>
    <script>
        function x() {
            var x = document.getElementById("d1").value
            var x1 = document.getElementById("d2").value

            window.location.href = "PDFOEE.php?d1=" + x + "&d2=" + x1;

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