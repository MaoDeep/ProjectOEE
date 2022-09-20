<?php
session_start();
include "config.php";
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body id="page-top" style="font-family: 'Pridi', serif;">
    <?php
    $date = date("Y-m-d H:i:s");
    if (isset($_POST["submit"])) {
        $arr1 = array(
            $_POST["txt2"],
            $_POST["txt3"],
            $_POST["txt4"],
            $_POST["txt8"],
            $_POST["txt7"],
            $_POST["txt5"],
            $_POST["txt6"],
            $_POST["txt1"],
            $_POST["breakmin"],
            $_POST["workmin"]
        );
        $sql = "INSERT INTO `employee`(`E_id`, `EName`, `Nmac`, `Econ`, `Epro`, `Edel`, `Etime`, `Etimet`, `DATE`) VALUES (NULL ,'" . $arr1[0] . "','" . $arr1[1] . "' , " . $arr1[2] . " , '" . $arr1[3] . "', " . $arr1[4] . " , '" . $arr1[5] . "' , '" . $arr1[6] . "' , '" . $arr1[7] . "')";

        $date1 = new DateTime($arr1[5]);
        $date2 = new DateTime($arr1[6]);

        // The diff-methods returns a new DateInterval-object...
        $diff = $date2->diff($date1);


        $re = mysqli_query($conn, $sql);

        if ($re) {
            echo '<script>alert("[บันทึกสำเร็จ]")</script>';
            echo "<script>window.location='form.php?x1=" . $arr1[2] . "&x2=" . $arr1[4] . "&x3=" .  $arr1[9] . "&x4=" . $arr1[7] . "&x5=" . $arr1[8] . "'</script>";
        } else {
            echo '<script>alert("[บันทึกไม่สำเร็จ]")</script>';
        }
    }

    ?>
    <form action="addtables.php" method="post" class="needs-validation" novalidate>
        <br>


        <div class="container">

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="m-0 font-weight-bold text-primary h5">เพิ่มข้อมูล</div>

                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <div class="card-body">
                                <input type="hidden" name="breakmin" id="breakmin" value="">
                                <input type="hidden" name="workmin" id="workmin" value="">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div class="col-form-label-sm"> วันที่ : </div>
                                        <input type="Date" class="form-control form-control-sm " id="txt1" name="txt1" readonly placeholder="" value="<?= date('Y-m-d') ?>" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        กรุณาใส่ข้อมูลให้ครบ
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-form-label-sm">ชื่อ :</div>
                                        <input type="text" class="form-control form-control-sm" id="txt2" name="txt2" readonly placeholder="" value="<?= $_SESSION["user"] ?>" required>
                                        <div class="invalid-feedback">
                                            กรุณาใส่ข้อมูลให้ครบ
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div class="col-form-label-sm">รหัสเครื่องจักร : </div>
                                        <?php
                                        $sqlrow = "SELECT * FROM `users` INNER JOIN machine ON machine.mac_id = users.mac_id where users.u_usersname = '" . $_SESSION["user"] . "' ";
                                        $rerow = mysqli_query($conn, $sqlrow);
                                        foreach ($rerow as $row) {

                                            $user = $row["u_usersname"];
                                            $mac = $row["mac_name"];
                                        }
                                        ?>
                                        <input type="text" class="form-control form-control-sm" id="txt3" name="txt3" readonly placeholder="" value="<?= $mac ?>" required>
                                        <div class="invalid-feedback">
                                            กรุณาใส่ข้อมูลให้ครบ
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-form-label-sm">รุ่นที่ผลิต :</div>
                                        <?php
                                        $sqlrow = "SELECT * FROM `users` INNER JOIN brand ON brand.b_id = users.b_id where users.u_usersname = '" . $_SESSION["user"] . "' ";
                                        $rerow = mysqli_query($conn, $sqlrow);
                                        foreach ($rerow as $row) {

                                            $user = $row["u_usersname"];
                                            $bra = $row["b_name"];
                                        }
                                        ?>
                                        <input type="text" class="form-control form-control-sm" id="txt8" name="txt8" readonly placeholder="" value="<?= $bra ?>" required>
                                        <div class="invalid-feedback">
                                            กรุณาใส่ข้อมูลให้ครบ
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div class="col-form-label-sm">ชิ้นงานที่ทำได้ : </div>
                                        <input type="number" class="form-control form-control-sm " id="txt4" name="txt4" placeholder="" required>
                                        <div class="invalid-feedback">
                                            กรุณาใส่ข้อมูลให้ครบ
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-form-label-sm">ของเสีย : </div>
                                        <input type="number" class="form-control form-control-sm " id="txt7" name="txt7" placeholder="" required>
                                        <div class="invalid-feedback">
                                            กรุณาใส่ข้อมูลให้ครบ
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="col-form-label-sm">เวลาเข้างาน : </div>
                                            <input type="time" class="form-control form-control-sm " id="txt5" name="txt5" placeholder="" required>
                                            <div class="invalid-feedback">
                                                กรุณาใส่ข้อมูลให้ครบ
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="col-form-label-sm">เวลาเริ่มพัก : </div>
                                            <input type="time" class="form-control form-control-sm " id="txt9" name="txt9" placeholder="" required>
                                            <div class="invalid-feedback">
                                                กรุณาใส่ข้อมูลให้ครบ
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="col-form-label-sm">เวลาพักเสร็จ : </div>
                                            <input type="time" class="form-control form-control-sm " id="txt10" name="txt10" placeholder="" required>
                                            <div class="invalid-feedback">
                                                กรุณาใส่ข้อมูลให้ครบ
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="col-form-label-sm">เวลาออกงาน : </div>
                                            <input type="time" class="form-control form-control-sm " id="txt6" name="txt6" placeholder="" required>
                                            <div class="invalid-feedback">
                                                กรุณาใส่ข้อมูลให้ครบ
                                            </div>
                                        </div>

                                        <div class="col-md-4 mt-3">
                                            <button type="button" class="btn btn-primary btn-sm mt-3" name="get_time" id="get_time">ยืนยันเวลาเข้างาน</button>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-3">
                                            <button type="submit" class="btn btn-primary btn-user btn-block btn-sm" name="submit" id="submit">บันทึก</button>
                                            <a href="tables.php"><button type="button" class="btn btn-danger btn-sm btn-user btn-block mt-3" name="Back">กลับ </button></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
    </form>
    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
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
    <script type="text/javascript">
        function update() {
            var select = document.getElementById('language');
            var option = select.options[select.selectedIndex];

            document.getElementById('txt5').value = option.value;
            document.getElementById('txt6').value = option.id;
        }

        update();
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            function timeDiffCalc(dateFuture, dateNow) {
                let diffInMilliSeconds = Math.abs(dateFuture - dateNow) / 1000;

                // calculate days
                const days = Math.floor(diffInMilliSeconds / 86400);
                diffInMilliSeconds -= days * 86400;
                // console.log('calculated days', days);

                // calculate hours
                const hours = Math.floor(diffInMilliSeconds / 3600) % 24;
                diffInMilliSeconds -= hours * 3600;
                //console.log('calculated hours', hours);

                // calculate minutes
                const minutes = Math.floor(diffInMilliSeconds / 60) % 60;
                diffInMilliSeconds -= minutes * 60;
                // console.log('minutes', minutes);

                let difference = '';
                if (days > 0) {
                    difference += (days === 1) ? `${days} day, ` : `${days} days, `;
                }

                difference += (hours === 0 || hours === 1) ? `${String(hours).padStart(2, '0')}` : `${String(hours).padStart(2, '0')}`;
                difference += ":";
                difference += (minutes === 0 || hours === 1) ? `${String(minutes).padStart(2, '0')}` : `${String(minutes).padStart(2, '0')}`;

                return difference;
            }
            $("#submit").addClass("disabled");


            function gettime() {
                var datein = $("#txt5").val();
                var breakin = $("#txt10").val()
                var breakout = $("#txt9").val();
                var dateout = $("#txt6").val()
                var date1 = new Date('2019-10-01 ' + timeDiffCalc(new Date('2019/10/1 ' + breakin + ':00'), new Date('2019/10/1 ' + breakout + ':00')) + ':00');
                var date2 = new Date('2019-10-01 ' + timeDiffCalc(new Date('2019/10/1 ' + datein + ':00'), new Date('2019/10/1 ' + dateout + ':00')) + ':00');
                //console.log((date2.getHours() - date1.getHours()) + ":" + ((date2.getTime() - date1.getTime()) / 60000));

                var breakmin1 = Number(timeDiffCalc(new Date('2019/10/1 ' + breakin + ':00'), new Date('2019/10/1 ' + breakout + ':00')).substring(0, 2) * 60);
                var breakmin2 = Number(timeDiffCalc(new Date('2019/10/1 ' + breakin + ':00'), new Date('2019/10/1 ' + breakout + ':00')).substring(3, 5))
                var breakmin = breakmin1 + breakmin2;

                var workmin1 = Number(timeDiffCalc(new Date('2019/10/1 ' + datein + ':00'), new Date('2019/10/1 ' + dateout + ':00')).substring(0, 2) * 60);
                var workmin2 = Number(timeDiffCalc(new Date('2019/10/1 ' + datein + ':00'), new Date('2019/10/1 ' + dateout + ':00')).substring(3, 5));
                var workmin = workmin1 + workmin2;

                console.log(breakmin);
                console.log(workmin);
                $("#breakmin").val(breakmin);
                $("#workmin").val(workmin);
            }
            $("#submit").click(function() {
                gettime();
            });

            var status = 1;
            $("#get_time").click(function() {

                if (status == 1) {
                    let text = "!! คุณตกลงที่จะบันทึกเวลาเข้างาน !!";
                    if (confirm(text) == true) {
                        var date = new Date();
                        var h = String(date.getHours()).padStart(2, '0');
                        var i = String(date.getMinutes()).padStart(2, '0');
                        var v = h + ":" + i;
                        $("#txt5").val(v);
                        $("#get_time").text("ยืนยันเวลาพัก");
                        status++;
                    }
                } else if (status == 2) {
                    let text = "!! คุณตกลงที่จะบันทึกเวลาพัก !!";
                    if (confirm(text) == true) {
                        var date = new Date();
                        var h = String(date.getHours()).padStart(2, '0');
                        var i = String(date.getMinutes()).padStart(2, '0');
                        var v = h + ":" + i;
                        $("#txt9").val(v);
                        status++;
                        $("#get_time").text("ยืนยันเวลาหลังพัก");
                    }
                } else if (status == 3) {
                    let text = "!! คุณตกลงที่จะบันทึกเวลาหลังพัก !!";
                    if (confirm(text) == true) {
                        var date = new Date();
                        var h = String(date.getHours()).padStart(2, '0');
                        var i = String(date.getMinutes()).padStart(2, '0');
                        var v = h + ":" + i;
                        $("#txt10").val(v);
                        status++;
                        $("#get_time").text("ยืนยันเวลาเลิกงาน");
                    }

                } else if (status == 4) {
                    let text = "!! คุณตกลงที่จะบันทึกเวลาเลิกงาน !!";
                    if (confirm(text) == true) {
                        var date = new Date();
                        var h = String(date.getHours()).padStart(2, '0');
                        var i = String(date.getMinutes()).padStart(2, '0');
                        var v = h + ":" + i;
                        $("#txt6").val(v);
                        status++;
                        $("#get_time").text("ยืนยันเวลาออกงาน");
                        $("#get_time").addClass("disabled");
                        $("#submit").removeClass("disabled");
                    }
                }

            });

        });
    </script>

</body>

</html>