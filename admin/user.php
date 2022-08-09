<?php
session_start();
include "config.php";
date_default_timezone_set('Asia/Bangkok');
if (empty($_SESSION["status"]) || $_SESSION["status"] !== "Admin") {
      header('Location: index.php');
      exit(0);
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

      <title>กรอกข้อมูล</title>

      <!-- Custom fonts for this template-->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Pridi:wght@300&display=swap" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!-- Custom styles for this template-->
      <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top" style="font-family: 'Pridi', serif;">

      <?php
      if (!isset($_POST["math"])) {
      } else {
            $arr1 = array(
                  $_POST["txt1"],
                  $_POST["txt2"],
                  $_POST["txt3"],
                  $_POST["txt4"],
                  $_POST["txt5"],
                  $_POST["txt6"],
                  $_POST["txt7"],
                  $_POST["txt8"],
                  $_POST["txt9"],
                  $_POST["txt10"],
                  $_POST["txt11"],
                  $_POST["txt12"],
                  $_POST["txt13"],
                  $_POST["txt14"],
                  $_POST["txt15"],
                  $_POST["date"],
                  $_SESSION["id"]
            );
            $sql = "INSERT INTO `report` (`id`, `AT`, `SP`, `WT`, `MS`, `MIX`, `RT`, `MSS`, `TT`, `NO`, `NUM`, `TOT`, `TR`, `TS`, `NT`, `EU`, `date`,`u_id`) VALUES (NULL, '" . $arr1[0] . "', '" . $arr1[1] . "', '" . $arr1[2] . "', '" . $arr1[3] . "', '" . $arr1[4] . "', '" . $arr1[5] . "', '" . $arr1[6] . "', '" . $arr1[7] . "', '" . $arr1[8] . "', '" . $arr1[9] . "', '" . $arr1[10] . "', '" . $arr1[11] . "', '" . $arr1[12] . "', '" . $arr1[13] . "', '" . $arr1[14] . "', '" . $arr1[15] . "', '" . $arr1[16] . "');";
            $qr = mysqli_query($conn, $sql);

            if ($qr) {
                  echo '<script>alert("บันทึกสำเร็จ")</script>';
            } else {
                  echo '<script>alert("บันทึกไม่สำเร็จ")</script>';
            }
      }
      ?>
      <!-- Page Wrapper -->
      <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: rgb(28 134 238);" id="accordionSidebar">


                  <!-- Sidebar - Brand -->
                  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                        <div class="">
                              <img src="img/logo.png" height="65px" width="140px">
                        </div>
                  </a>

                  <!-- Divider -->
                  <hr class="sidebar-divider my-0">

                  <!-- Nav Item - Dashboard -->
                  <li class="nav-item active">
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

                  <!-- Nav Item - Pages Collapse Menu -->
                  <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                              <i class="fas fa-fw fa-clipboard"></i>
                              <span>จัดการข้อมูล</span>
                        </a>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                              <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">แบบฟอร์มการทำงาน:</h6>
                                    <a class="collapse-item" href="tables.php">บันทึกยอดผลิตประจำวัน</a>
                                    <a class="collapse-item" href="form.php">กรอกข้อมูล</a>
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

                  <!-- Sidebar Message -->


            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                  <!-- Main Content -->
                  <div id="content">

                        <!-- Topbar -->
                        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                              <!-- Sidebar Toggle (Topbar) -->
                              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                    <i class="fa fa-bars"></i>
                              </button>

                              <!-- Topbar Search -->
                              <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                    <div class="input-group">

                                    </div>
                              </form>

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

                              <div class="row">

                                    <div class="col-sm-12">

                                          <!-- Circle Buttons -->
                                          <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                      <h5 class="m-0 font-weight-bold text-primary">จัดการข้อมูลผู้ใช้</h5>
                                                      <div class="row">
                                                            <div class="col-6"></div>
                                                            <div class="col-6 col order-last"><a href="post/add.php"><button type="button" class="btn-info btn-sm btn ">เพิ่มข้อมูล</button></a></div>
                                                      </div>

                                                </div>


                                                <div class="card-body">

                                                      <div class="table-responsive">
                                                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">

                                                                  <thead>
                                                                        <tr>
                                                                              <th>ลำดับ</th>
                                                                              <th>ชื่อ</th>
                                                                              <th>สถานะ</th>
                                                                              <th>เเก้ไข</th>
                                                                              <th>ลบ</th>

                                                                        </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                        <?php
                                                                        $sql = "SELECT * FROM `users`";
                                                                        $re = mysqli_query($conn, $sql);
                                                                        foreach ($re as $k => $row) {
                                                                        ?>
                                                                              <tr>
                                                                                    <td><?= ($k + 1) ?></td>
                                                                                    <td><?= $row["u_usersname"]; ?></td>
                                                                                    <td><?= $row["Status"]; ?></td>
                                                                                    <td><a href="post/edit.php?id=<?= $row["u_id"]; ?>"><button class="btn btn-warning w-50">เเก้ไข</button></a></td>
                                                                                    <?php
                                                                                    if ($row["u_usersname"] == $_SESSION["user"]) {
                                                                                    } else {
                                                                                    ?>
                                                                                          <td><a href="post/del.php?id=<?= $row["u_id"]; ?>"><button class="btn btn-danger w-50">ลบ</button></a></td>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                              </tr>

                                                                        <?php
                                                                        }
                                                                        ?>
                                                                  </tbody>
                                                            </table>
                                                      </div>
                                                </div>
                                          </div>

                                    </div>
                              </div>
                        </div>

                        <!-- /.container-fluid -->

                  </div>

            </div>
            <!-- End of Content Wrapper -->

      </div>
      <!-- End of Page Wrapper -->

      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
      </a>

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
                        <div class="modal-body">คุณแน่ใจนะว่าจะออกจากระบบ</div>
                        <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                              <a class="btn btn-primary" href="index.php">ตกลง</a>
                        </div>
                  </div>
            </div>
      </div>
      <script>
            function in1() {
                  var d = document.getElementById("txt1").value;
                  var x = document.getElementById("txt2").value;
                  var c = (d - x);
                  document.getElementById("txt3").value = c;
                  var c1 = document.getElementById("txt3").value;
                  var c2 = document.getElementById("txt4").value;
                  document.getElementById("txt5").value = (((c1 - c2) / c1) * 100).toFixed(2);
                  document.getElementById("txt12").value = (((c1 - c2) / c1) * 100).toFixed(2)
                  document.getElementById("ina").value = (((c1 - c2) / c1))


                  var a1 = document.getElementById("ina").value;
                  var a2 = document.getElementById("inb").value;
                  var a3 = document.getElementById("inc").value;
                  document.getElementById("txt15").value = (((a1 / 100) * (a2 / 100) * (a3 / 100) * 100) * 100).toFixed(2);

                  document.getElementById("x1").value = document.getElementById("txt12").value;
                  document.getElementById("x2").value = document.getElementById("txt13").value;
                  document.getElementById("x3").value = document.getElementById("txt14").value;
                  document.getElementById("x4").value = document.getElementById("txt15").value;



                  if (document.getElementById("txt5").value < 90) {
                        var arr = document.getElementById("er1")
                        arr.classList.remove("text-success");
                        arr.classList.add("text-danger");
                        document.getElementById("er1").innerText = "ต่ำกว่า 90%"
                  } else {
                        var arr = document.getElementById("er1")
                        arr.classList.remove("text-danger");
                        arr.classList.add("text-success");
                        document.getElementById("er1").innerText = "มากกว่า 90%"
                  }


            }

            function in2() {
                  var d = document.getElementById("txt6").value;
                  var x = document.getElementById("txt7").value;
                  var c = (((d - x) / d) * 100);
                  document.getElementById("txt8").value = c.toFixed(2);
                  document.getElementById("txt13").value = c.toFixed(2);
                  document.getElementById("inb").value = c;

                  var a1 = document.getElementById("ina").value;
                  var a2 = document.getElementById("inb").value;
                  var a3 = document.getElementById("inc").value;
                  document.getElementById("txt15").value = (((a1 / 100) * (a2 / 100) * (a3 / 100) * 100) * 100).toFixed(2);

                  document.getElementById("x1").value = document.getElementById("txt12").value
                  document.getElementById("x2").value = document.getElementById("txt13").value
                  document.getElementById("x3").value = document.getElementById("txt14").value
                  document.getElementById("x4").value = document.getElementById("txt15").value

                  if (c < 90) {
                        var arr = document.getElementById("er2")
                        arr.classList.remove("text-success");
                        arr.classList.add("text-danger");
                        document.getElementById("er2").innerText = "ต่ำกว่า 90%"
                  } else {
                        var arr = document.getElementById("er2")
                        arr.classList.remove("text-danger");
                        arr.classList.add("text-success");
                        document.getElementById("er2").innerText = "มากกว่า 90%"
                  }

            }

            function in3() {
                  var d = document.getElementById("txt9").value;
                  var x = document.getElementById("txt10").value;
                  var c = (((d - x) / d) * 100);
                  document.getElementById("txt11").value = c.toFixed(2);
                  document.getElementById("txt14").value = c.toFixed(2);
                  document.getElementById("inc").value = c;

                  var a1 = document.getElementById("ina").value;
                  var a2 = document.getElementById("inb").value;
                  var a3 = document.getElementById("inc").value;
                  document.getElementById("txt15").value = (((a1 / 100) * (a2 / 100) * (a3 / 100) * 100) * 100).toFixed(2);

                  document.getElementById("x1").value = document.getElementById("txt12").value
                  document.getElementById("x2").value = document.getElementById("txt13").value
                  document.getElementById("x3").value = document.getElementById("txt14").value
                  document.getElementById("x4").value = document.getElementById("txt15").value


                  if (d < 4000) {
                        var arr = document.getElementById("er3")
                        arr.classList.remove("text-success");
                        arr.classList.add("text-danger");
                        document.getElementById("er3").innerText = "ต่ำกว่า 4000ชิ้น"
                  } else {
                        var arr = document.getElementById("er3")
                        arr.classList.remove("text-danger");
                        arr.classList.add("text-success");
                        document.getElementById("er3").innerText = "ตรงเป้าหมาย"
                  }


            }
      </script>
      <script>
            (function() {
                  'use strict'

                  // Fetch all the forms we want to apply custom Bootstrap validation styles to
                  var forms = document.querySelectorAll('.needs-validation')

                  // Loop over them and prevent submission
                  Array.prototype.slice.call(forms)
                        .forEach(function(form) {
                              form.addEventListener('submit', function(event) {
                                    if (!form.checkValidity()) {
                                          event.preventDefault()
                                          event.stopPropagation()
                                    }

                                    form.classList.add('was-validated')
                              }, false)
                        })
            })()
      </script>
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js"></script>

</body>

</html>