<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ตารางOEE</title>

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <style>
        body {
            background: #111;
        }

        .arrowbtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 28px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: Turquoise;
            color: Black;
            cursor: pointer;
            padding: 10px;
            border-radius: 4px;
        }

        .arrowbtn:hover {
            background: white;
            border-color: white;
            color: #111;
        }

        .arrowbtn:after {
            position: absolute;
            display: inline-block;
            content: "";
            width: 25px;
            height: 25px;
            top: 50%;
            left: 50%;
        }

        .arrowbtn-up {
            top: 20px;
        }

        .arrowbtn-up:after {
            margin-left: -12.5px;
            margin-top: -6.25px;
            border-top: 2px solid;
            border-left: 2px solid;
            transform: rotateZ(45deg);
        }

        .arrowbtn-down {
            bottom: 20px;
        }

        .arrowbtn-down:after {
            margin-left: -12.5px;
            margin-top: -18.75px;
            border-bottom: 2px solid;
            border-right: 2px solid;
            transform: rotateZ(45deg);
        }
    </style>
    </style>

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

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
                    <a class="nav-link" href="home.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>หน้าหลัก</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="tables.php">
                        <i class="fas fa-fw fa-book"></i>
                        <span>บันทึกยอดผลิตประจำวัน</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="form.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>กรอกข้อมูลการทำงาน</span></a>
                </li>


                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="charts.php">
                        <i class="fas fa-fw fa-chart-line"></i>
                        <span>กราฟ</span></a>
                </li>
                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="machine.php">
                        <i class="fas fa-fw fa-microchip"></i>
                        <span>จัดการข้อมูลเครื่องจักร</span></a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="user.php">
                        <i class="fas fa-fw fa-users"></i>
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
                            <h5 class="m-0 font-weight-bold text-primary"> ตาราง OEE</h5>
                        </div>

                        <div class="card-body">
                            <div class="mx-auto col-12">
                                <div class="card">
                                    <div class="card-header">
                                        ประสิทธิผลโดยรวมของเครื่องจักร
                                    </div>
                                    <div class="card-body">
                                        <form action="PDFOEE.php" method="get">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <label for="d1" class="col-form-label">วันที่ : </label>
                                                </div>
                                                <div class="col-auto"><input type="date" name="d1" id="d1" class="form-control form-control-sm"></div>
                                                <div class="col-auto">
                                                    <label for="d2" class="col-form-label">ถึง : </label>
                                                </div>
                                                <div class="col-auto"><input type="date" name="d2" id="d2" class="form-control form-control-sm"></div>
                                                <div class="col-auto"><button type="submit" id="pdf" class="btn btn-sm btn-success" style="width: 10rem;"><i class="bi bi-filetype-pdf"></i> ออกรายงาน PDF</button></div>
                                            </div>
                                        </form>
                                        <div class="row mt-3">
                                            <div class="col-12 mx-auto">
                                                <form action="charts.php" method="get">
                                                    <table class="table table-bordered text-center table-sm " id="dataTable">
                                                        <thead>
                                                            <tr bgcolor="PeachPuff">
                                                                <th>#</th>
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
                                                        <td>
                                                        <div class="form-check">
                                                        <input type="checkbox" class="form-check-input w-100" id="no[]" name="no[]" value="' . $value["id"] . '">
                                                        </div>
                                                        </td>
                                                        </td>
                                                        <td>' . $n1 . '</td>
                                                        <td>' . $d1 . '</td>
                                                        <td>' . $value['TR'] . '%' . ' </td>
                                                        <td>' . $value['TS'] . '%' . '</td>
                                                        <td>' . $value['NT'] . '%' . '</td>
                                                        <td>' . $value['EU'] . '%' . '</td>
                                                        <td>' . $value['u_usersname'] . '</td>
                                                        <td><a href=" charts.php=' . $value["id"] . '&name=' . $value["u_usersname"] . '&date=' . $d1 . '"><button type="submit"  class="btn btn-warning  "name="button" >ดู</button>
                                                        
                                                     </button>
                                                        </a></td>
            
                                                    </a>
                                    
                                                    </tr>';
                                                        }

                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($_GET["no"])) {
                        ?>
                            <div class=" col-12 mx-auto">
                                <div class="card mt-3 ">
                                    <div class="card-header">
                                        <div id="two">ประสิทธิผลโดยรวมของเครื่องจักร</div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myChart"></canvas>
                                        <div class="card mt-3">
                                            <div class="card-header">
                                                ข้อมูล
                                            </div>
                                        </div>
                                        <table class="table table-bordered text-center" id="tabel1">
                                            <thead>
                                                <br>
                                                <tr bgcolor="PeachPuff">
                                                    <th>วันที่</th>
                                                    <th>เวลาทำงานทั้งหมด</th>
                                                    <th>เวลาทำงานตอนพัก</th>
                                                    <th>เวลาทำงานจริง</th>
                                                    <th>เวลาเปิดเครื่องจักร</th>
                                                    <th>เวลาปิดเครื่องจักร</th>
                                                    <th>เวลาหยุดเครื่องจักร</th>
                                                    <th>ชิ้นงานที่ผลิตได้</th>
                                                    <th>ชิ้นงานเสีย</th>
                                                    <th>ชื่อ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                foreach ($_GET["no"] as $row) {
                                                    $sql = "SELECT * FROM `report` INNER JOIN users on report.u_id = users.u_id WHERE report.id =" . $row;
                                                    $re = mysqli_query($conn, $sql);

                                                    foreach ($re as $row) {
                                                        $date = date_create($row["date"]);
                                                        $d = date_format($date, "d/m/Y");
                                                ?>
                                                        <tr>
                                                            <th><?php echo $d ?></th>
                                                            <th><?php echo number_format($row["AT"],) . " นาที."; ?></th>
                                                            <th><?php echo number_format($row["SP"],) . " นาที.";  ?></th>
                                                            <th><?php echo number_format($row["WT"],) . " นาที.";  ?></th>
                                                            <th><?php echo number_format($row["MS"],) . " นาที.";  ?></th>
                                                            <th><?php echo number_format($row["RT"],) . " นาที.";  ?></th>
                                                            <th><?php echo number_format($row["MSS"],) . " นาที."; ?></th>
                                                            <th><?php echo number_format($row["NO"],) . " ชิ้น."; ?></th>
                                                            <th><?php echo number_format($row["NUM"],) . " ชิ้น."; ?></th>
                                                            <th><?php echo $row["u_usersname"] ?></th>
                                                        </tr>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            <?php
                        }
            ?>
            </div>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['อัตราการเดินเครื่อง', 'ประสิทธิภาพเครื่องจักร', 'อัตราคุณภาพ', 'ผลรวมOEE'],
                datasets: [
                    <?php

                    if (isset($_GET["no"])) {
                        foreach ($_GET["no"] as $k =>  $row) {
                            $sql = "SELECT * FROM `report` INNER JOIN users on report.u_id = users.u_id WHERE report.id =" . $row;
                            $re = mysqli_query($conn, $sql);
                            $color = array(
                                'rgba(255, 20, 147)',
                                'rgba(154, 50, 205)',
                                'rgba(0, 139, 69)',
                                'rgba(139, 0, 0)',


                            );
                            foreach ($re as $row) {

                    ?> {
                                    label: <?= json_encode($row["u_usersname"]) ?>,
                                    data: [<?= $row["TR"] ?>, <?= $row["TS"] ?>, <?= $row["NT"] ?>, <?= $row["EU"] ?>],
                                    backgroundColor: [
                                        '<?php if (count($_GET["no"]) <= 4) {
                                                echo  $color[$k];
                                            } else {
                                                echo $color[rand(0, 3)];
                                            }
                                            ?>',
                                    ],
                                    borderColor: [
                                        '<?php if (count($_GET["no"]) <= 4) {
                                                echo $color[$k];
                                            } else {
                                                echo $color[rand(0, 3)];
                                            }
                                            ?>',
                                    ],
                                    borderWidth: 1,
                                    datalabels: {
                                        color: [
                                            '<?php if (count($_GET["no"]) <= 4) {
                                                    echo $color[$k];
                                                } else {
                                                    echo $color[rand(0, 3)];
                                                }
                                                ?>',
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
                                },
                    <?php
                            }
                        }
                    }
                    ?>
                ]
            },
            plugins: [ChartDataLabels],
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: true // Hide legend
                }
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#dataTable").DataTable();
            $("#tabel1").DataTable();
        });
    </script>

    <script>
        // Select all links with hashes
        $('a[href*="#"]')
            // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function(event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                    location.hostname == this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function() {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            };
                        });
                    }
                }
            });
    </script>

    <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.arrowbtn > 20 || document.documentElement.arrowbtn > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.arrowbtn = 0;
            document.documentElement.arrowbtn = 0;
        }
    </script>
    <script>
        var offset = -100;

        function pageScroll() {
            window.scrollBy(0, 50); // horizontal and vertical scroll increments
            if (window.pageYOffset == offset) return;
            offset = window.pageYOffset;
            scrolldelay = setTimeout('pageScroll()', 100); // scrolls every 100 milliseconds
        }


        //actually scroll
        pageScroll();
    </script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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