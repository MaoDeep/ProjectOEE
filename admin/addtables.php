<?php
session_start();
include "config.php";
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
            $_POST["txt1"]
        

        );
        $sql = "INSERT INTO `employee`(`E_id`, `EName`, `Nmac`, `Econ`, `Epro`, `Edel`, `Etime`, `Etimet`, `DATE`) VALUES (NULL ,'" . $arr1[0] . "','" . $arr1[1] . "' , " . $arr1[2] . " , '" . $arr1[3] . "', " . $arr1[4] . " , '" . $arr1[5] . "' , '" . $arr1[6] . "' , '" . $arr1[7] . "')";

        $date1 = new DateTime($arr1[5]);
        $date2 = new DateTime($arr1[6]);

        // The diff-methods returns a new DateInterval-object...
        $diff = $date2->diff($date1);


        $re = mysqli_query($conn, $sql);

        if ($re) {
            echo '<script>alert("[บันทึกสำเร็จ]")</script>';
            echo "<script>window.location='form.php?x1=" . $arr1[2] . "&x2=" . $arr1[4] . "&x3=" . $diff->format('%h') . "&x4=" . $arr1[7] . "'</script>";
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

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <div class="col-form-label-sm"> วันที่ : </div>
                                        <input type="DATE" class="form-control form-control-sm " id="txt1" name="txt1" placeholder="" required>
                                        <div class="invalid-feedback">
                                            กรุณาใส่ข้อมูลให้ครบ
                                        </div>
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
                                        <select name="txt3" id="txt3" class="form-select form-select-sm">
                                            <option value="T200">T200</option>
                                            <option value="T300">T300</option>
                                            <option value="T400">T400</option>
                                            <option value="T500">T500</option>
                                            <option value="T600">T600</option>



                                        </select>
                                        <div class="invalid-feedback">
                                            กรุณาใส่ข้อมูลให้ครบ
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="col-form-label-sm">รุ่นที่ผลิต :</div>
                                        <input type="text" class="form-control form-control-sm" id="txt8" name="txt8" placeholder="" required>

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
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <div class="col-form-label-sm">กะ : </div>
                                            <select name="" id="" class="form-select form-select-sm">
                                                <option value="A">08:00-17:00</option>
                                                <option value="B">17:00-20:00</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                กรุณาใส่ข้อมูลให้ครบ
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <div class="col-form-label-sm">เวลาเข้างาน : </div>
                                            <input type="time" class="form-control form-control-sm " id="txt5" name="txt5" placeholder="" required>
                                            <div class="invalid-feedback">
                                                กรุณาใส่ข้อมูลให้ครบ
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="col-form-label-sm">เวลาออกงาน :</div>
                                            <input type="time" class="form-control form-control-sm" id="txt6" name="txt6" placeholder="" required>

                                            <div class="invalid-feedback">
                                                กรุณาใส่ข้อมูลให้ครบ
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button type="submit" class="btn btn-primary btn-user btn-block btn-sm" name="submit">บันทึก</button>
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
</body>

</html>