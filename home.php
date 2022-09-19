<?php
include "config.php";
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>หน้าหลัก</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pridi:wght@300&display=swap" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body id="page-top" style="font-family: 'Pridi', serif;">

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: rgb(54 54 54);" id="accordionSidebar">


                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home.php">
                    <div class="">
                        <img src="img/logo.png" height="60px" width="140px">
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
                    <i class="fas fa-fw fa-table"></i>
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
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        </div>

                        <!-- Content Row -->
                        <div class="row">
                            <?php
                            $sql3 = "SELECT * FROM `report`";
                            $re3 = mysqli_query($conn, $sql3);
                            if ($re3->num_rows > 0) {
                                foreach ($re3 as $rw2) {
                                    $TR[] = $rw2["TR"];
                                    $TS[] = $rw2["TS"];
                                    $NT[] = $rw2["NT"];
                                    
                                }
                            } else {
                                $TR = [0];
                                $TS = [0];
                                $NT = [0];
                               
                            }
                            $sqlrow = "SELECT * FROM `report` INNER JOIN users ON users.u_id = report.u_id INNER JOIN machine ON machine.mac_id = users.mac_id ORDER BY id DESC ";
                            $rerow = mysqli_query($conn, $sqlrow);
                            foreach ($rerow as $row) {

                                $name5[] = $row["u_usersname"];

                                $t[] = $row["mac_name"];
                            }
                            ?>
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-md-3">
                                <div class="card border-left-primary  py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                                    เครื่องจักร : <?php echo $t[0] ?></div>
                                                <canvas id="test1" width="12px" height="6px"></canvas>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-md-3">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-sm font-weight-bold text-success text-uppercase mb-1">
                                                    เครื่องจักร : <?php echo $t[1] ?></div>
                                                <canvas id="test2" width="12px" height="6px"></canvas>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-md-3">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-sm font-weight-bold text-danger  text-uppercase mb-1">
                                                    เครื่องจักร : <?php echo $t[2] ?>
                                                </div>
                                                <canvas id="test3" width="12px" height="6px"></canvas>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pending Requests Card Example -->
                            <div class="col-md-3">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-sm font-weight-bold text-warning text-uppercase mb-1">
                                                    เครื่องจักร : <?php echo $t[3] ?></div>
                                                <canvas id="test4" width="12px" height="6px"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- Content Row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        OEE
                                        <div id="test" class="h1"></div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                        
                           

                        
                        <!-- End of Main Content -->

                        <!-- Footer -->
                        <footer class="sticky-footer bg-white mt-3">
                            <div class="container my-auto">
                                <div class="copyright text-center my-auto">

                                </div>
                            </div>
                        </footer>
                        <!-- End of Footer -->

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
                            <div class="modal-body">คุณแน่ใจเเล้วนะว่าจะออกจากระบบ</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">ยกเลิก</button>
                                <a class="btn btn-primary" href="index.php">ออกจากระบบ</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
               $sql = "SELECT * FROM `report` INNER JOIN users ON users.u_id = report.u_id  ORDER BY id DESC LIMIT 4;";
               $re = mysqli_query($conn, $sql);
               foreach ($re as $k  => $row) {
                $name[$k] = $row["u_usersname"];

                $EU[$k] = $row["EU"];
                $TR[$k] = $row["TR"];
                $TS[$k] = $row["TS"];
                $NT[$k] = $row["NT"];
               
            }



             
                
                ?>
                <script>
                    const ctx = document.getElementById('myChart').getContext('2d');
                    const myChart0 = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['ผลรวมของเครื่องจักร'],
                            datasets: [{
                                    label: <?= json_encode($name[0]) ?>,
                                    data: [<?= $EU[0] ?>, ],
                                    backgroundColor: [
                                        'rgba(255, 99, 132)',
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132)',
                                    ],
                                    borderWidth: 1,
                                    datalabels: {
                                        color: [

                                            'rgba(255, 99, 132)',

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
                                }, {
                                    label: <?= json_encode($name[1]) ?>,
                                    data: [<?= $EU[1] ?>],
                                    backgroundColor: [
                                        'rgba(54, 162, 235)',

                                    ],
                                    borderColor: [
                                        'rgba(54, 162, 235)',

                                    ],
                                    borderWidth: 1,
                                    datalabels: {
                                        color: [

                                            'rgba(54, 162, 235)',

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
                                {
                                    label: <?= json_encode($name[2]) ?>,
                                    data: [<?= $EU[2] ?>],
                                    backgroundColor: [

                                        'rgba(255, 206, 86)',

                                    ],
                                    borderColor: [

                                        'rgba(255, 206, 86)',

                                    ],
                                    borderWidth: 1,
                                    datalabels: {
                                        color: [

                                            'rgba(255, 206, 86)',

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
                                {
                                    label: <?= json_encode($name[3]) ?>,
                                    data: [<?= $EU[3] ?>],
                                    backgroundColor: [

                                        'rgba(75, 192, 192)',

                                    ],
                                    borderColor: [

                                        'rgba(75, 192, 192)',

                                    ],
                                    borderWidth: 1,
                                    datalabels: {
                                        color: [

                                            'rgba(75, 192, 192)',

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
                                }
                            ]
                        },
                        plugins: [ChartDataLabels],
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
       
                
                <script>
                    const graph1 = document.getElementById('test1').getContext('2d');
                    const test1 = new Chart(graph1, {
                        type: 'bar',
                        data: {
                            labels: ['อัตราการเดินเครื่อง', 'ประสิทธิภาพเครื่องจักร', 'อัตราคุณภาพ', ],
                            datasets: [{
                                label:  <?= json_encode($name[0]) ?>,
                                data: [<?= $TR[0] ?>, <?= $TS[0] ?>, <?= $NT[0] ?>],
                                backgroundColor: [
                                    'rgba(255, 206, 86)',
                                    'rgba(0, 255, 0)',
                                    'rgba(255, 105, 180)',

                                ],
                                borderColor: [
                                    'rgba(255, 206, 86)',
                                    'rgba(0, 255, 0)',
                                    'rgba(255, 105, 180)',

                                ],
                                borderWidth: 1
                            }]
                        },
                        plugins: [ChartDataLabels],
                        options: {
                            indexAxis: 'y',
                            // Elements options apply to all of the options unless overridden in a dataset
                            // In this case, we are setting the border of each horizontal bar to be 2px wide
                            elements: {
                                bar: {
                                    borderWidth: 2,
                                }
                            }
                        }
                    });
                </script>

                <script>
                    const graph2 = document.getElementById('test2').getContext('2d');
                    const test2 = new Chart(graph2, {
                        type: 'bar',
                        data: {
                            labels: ['อัตราการเดินเครื่อง', 'ประสิทธิภาพเครื่องจักร', 'อัตราคุณภาพ', ],
                            datasets: [{
                                label: <?= json_encode($name[1]) ?>,
                                data: [<?= $TR[1] ?>, <?= $TS[1] ?>, <?= $NT[1] ?>],
                                backgroundColor: [
                                    'rgba(255, 206, 86)',
                                    'rgba(0, 255, 0)',
                                    'rgba(255, 105, 180)',
                                ],
                                borderColor: [
                                    'rgba(255, 206, 86)',
                                    'rgba(0, 255, 0)',
                                    'rgba(255, 105, 180)',
                                ],
                                borderWidth: 1
                            }]
                        },
                        plugins: [ChartDataLabels],
                        options: {
                            indexAxis: 'y',
                            // Elements options apply to all of the options unless overridden in a dataset
                            // In this case, we are setting the border of each horizontal bar to be 2px wide
                            elements: {
                                bar: {
                                    borderWidth: 2,
                                }
                            }
                        }
                    });
                </script>
                <script>
                    const graph3 = document.getElementById('test3').getContext('2d');
                    const test3 = new Chart(graph3, {
                        type: 'bar',
                        data: {
                            labels: ['อัตราการเดินเครื่อง', 'ประสิทธิภาพเครื่องจักร', 'อัตราคุณภาพ', ],
                            datasets: [{
                                label: <?= json_encode($name[2]) ?>,
                                data: [<?= $TR[2] ?>, <?= $TS[2] ?>, <?= $NT[2] ?>],
                                backgroundColor: [
                                    'rgba(255, 206, 86)',
                                    'rgba(0, 255, 0)',
                                    'rgba(255, 105, 180)',
                                ],
                                borderColor: [
                                    'rgba(255, 206, 86)',
                                    'rgba(0, 255, 0)',
                                    'rgba(255, 105, 180)',
                                ],
                                borderWidth: 1
                            }]
                        },
                        plugins: [ChartDataLabels],
                        options: {
                            indexAxis: 'y',
                            // Elements options apply to all of the options unless overridden in a dataset
                            // In this case, we are setting the border of each horizontal bar to be 2px wide
                            elements: {
                                bar: {
                                    borderWidth: 2,
                                }
                            }
                        }
                    });
                </script>
                <script>
                    const graph4 = document.getElementById('test4').getContext('2d');
                    const test4 = new Chart(graph4, {
                        type: 'bar',
                        data: {
                            labels: ['อัตราการเดินเครื่อง', 'ประสิทธิภาพเครื่องจักร', 'อัตราคุณภาพ', ],
                            datasets: [{
                                label: <?= json_encode($name[3]) ?>,
                                data: [<?= $TR[3] ?>, <?= $TS[3] ?>, <?= $NT[1] ?>],
                                backgroundColor: [
                                    'rgba(255, 206, 86)',
                                    'rgba(0, 255, 0)',
                                    'rgba(255, 105, 180)',
                                ],
                                borderColor: [
                                    'rgba(255, 206, 86)',
                                    'rgba(0, 255, 0)',
                                    'rgba(255, 105, 180)',
                                ],
                                borderWidth: 1
                            }]
                        },
                        plugins: [ChartDataLabels],
                        options: {
                            indexAxis: 'y',
                            // Elements options apply to all of the options unless overridden in a dataset
                            // In this case, we are setting the border of each horizontal bar to be 2px wide
                            elements: {
                                bar: {
                                    borderWidth: 2,
                                }
                            }
                        }
                    });
                </script>
                <script>
                    $(document).ready(function() {
                        function at() {
                            const x = [];
                            $.ajax({ // ส่งค่าแค่บางส่วน 
                                type: "GET",
                                url: "test.php?id=1",
                                dataType: "text", // ส่งเป็นข้อความ
                                success: function(response) { // ถ้าสำเร็จเเล้วให้เก็บหน้าผลลัพธ์ของไฟล์ที่ส่งไป
                                    var arr = $.parseJSON(response) // ถอดรหัสของ json หน้า text.php
                                    x.push(arr.Max) // เอาตัวเลขจาก json ที่ผ่านการแปลงมา 
                                    x.push(arr.Min) // เอาตัวเลขจาก json ที่ผ่านการแปลงมา 
                                    myChart1.data.datasets[0].data = x; // เอาข้อมูลขึ้น กราฟ
                                    myChart1.update(); // เอาข้อมูลขึ้น กราฟ

                                }
                            });
                        }

                        function at1() {
                            const name = [];
                            const n1 = [];
                            const n2 = [];
                            const n3 = [];
                            const n4 = [];
                            $.ajax({
                                type: "GET",
                                url: "test.php?id=2",
                                dataType: "text",
                                success: function(response) {
                                    var arr = $.parseJSON(response)

                                    n1.push(arr.n1[0], arr.n1[1], arr.n1[2], arr.n1[3]) // เอาตัวเลขจาก json ที่ผ่านการแปลงมา 
                                    n2.push(arr.n2[0], arr.n2[1], arr.n2[2], arr.n2[3])
                                    n3.push(arr.n3[0], arr.n3[1], arr.n3[2], arr.n3[3])
                                    n4.push(arr.n4[0], arr.n4[1], arr.n4[2], arr.n4[3])

                                    name.push(arr.name[0], arr.name[1], arr.name[2], arr.name[3])

                                    myChart.data.datasets[0].label = name[0]; // เอาข้อมูลขึ้น กราฟ
                                    myChart.data.datasets[1].label = name[1];
                                    myChart.data.datasets[2].label = name[2];
                                    myChart.data.datasets[3].label = name[3];

                                    myChart.data.datasets[0].data = n1; // เอาข้อมูลขึ้น กราฟ
                                    myChart.data.datasets[1].data = n2;
                                    myChart.data.datasets[2].data = n3;
                                    myChart.data.datasets[3].data = n4;

                                    myChart.update(); // เอาข้อมูลขึ้น กราฟ

                                }
                            });
                        }


                        setInterval(function() { // ให้มันดึงข้อมูลทุกๆ 1 วิ
                            at1()
                            at()
                        }, 1000)
                    });
                </script>
                <!-- Bootstrap core JavaScript-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin-2.min.js"></script>




    </body>

</html>