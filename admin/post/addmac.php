<?php
include "../config.php";
if (isset($_POST["submit"])) {
    $arr = array(

        $_POST["txt2"]

    );


    $sql = "INSERT INTO `machine` (`mac_id`, `mac_name`) VALUES (NULL, '" . $arr[0] . "');";
    $re = mysqli_query($conn, $sql);


    if ($re) {
        echo '<script>alert("บันทึกสำเร็จ")</script>';
        header('Location: ../machine.php');
        exit(0);
    } else {
        echo '<script>alert("บันทึกไม่สำเร็จ")</script>';
    }
}





?>
<!doctype html>
<html lang="en">

<head>
    <title>เพิ่มรหัสเครื่องจักร</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <form action="addmac.php" method="post" class="needs-validation" name="myform" novalidate>
        <div class="container mt-3">
            <div class="col-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        รหัสเครื่องจักร
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="" class="form-label">ชื่อเครื่องจักร</label>
                            <input type="text" name="txt2" id="txt2" class="form-control form-control-sm" value="" required>
                        </div>
                        
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="d-grid gap-2 mt-3">
                                    <a href="../machine.php"><button type="submit" class="btn btn-sm btn-primary w-100" name="submit">บันทึก</button>
                                </div>
                                <div class="d-grid gap-2 mt-3">
                                    <a href="../machine.php"><button type="button" class="btn btn-sm btn-danger w-100">กลับไปหน้าหลัก</button></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </form>

    </div>
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
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>