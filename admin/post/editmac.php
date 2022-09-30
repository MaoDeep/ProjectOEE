<?php
include "../config.php";
if (isset($_GET["id"]) && $_GET["id"] !== "") {
?>
<!doctype html>
<html lang="en">

<head>
    <title>เพิ่มรหัสเครื่องจักร</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
    <form action="addmac.php" method="post" class="needs-validation" name="myform" novalidate>
        <div class="container mt-3">
            <div class="row text-center">
                <div class="col-6">
                    <div class="card shadow-lg">
                        
                        <div class="card-header">
                            ชื่อเครื่องจัก
                        </div>
                        <div class="card-body">
                           
                        <label for=""> ลำดับที่</label>
                        <input class="form-control form-control-sm" type="text" id="id_mac">
                                                           
                            <br>
                            
                            <label for=""> เพิ่มชื่อเครื่องจัก</label>
                            <input class="form-control form-control-sm" type="text" id="in_mac">
                            
                            <button type="button" value="bt_mac" class="btn btn-success btn-sm mt-3 mx-auto" id="bt_mac">บันทึก</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-6">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            เพิ่มชื่อรุ่น
                        </div>
                        <div class="card-body">
                            <label for=""> เพิ่มชื่อรุ่น</label>
                            <input class="form-control form-control-sm" type="text" id="in_brand">
                            <button type="button" value="bt_brand" class="btn btn-success btn-sm mt-3 " id="bt_brand">บันทึก</button>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="row text-center mt-3">
                <div class="col-12">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            เพิ่มชื่อเครื่องจัก
                        </div>
                        <div class="card-body">
                            <label for="" class="form-label">ชื่อเครื่องจัก</label>
                            <select class="form-select form-select-sm" name="master_mac" id="master_mac">
                                <?php
                                $sql_mac = "SELECT * FROM `machine`";
                                $re_mac = mysqli_query($conn, $sql_mac);
                                foreach ($re_mac as $row) {
                                ?>
                                    <option value="<?= $row["mac_id"]; ?>"><?= $row["mac_name"]; ?></option>
                                <?php
                                }
                                ?>

                            </select>
                            
                            <div class="mt-3"></div>
                            <label for="" class="form-label">ชื่อรุ่น</label>
                            <select class="form-select form-select-sm" name="master_brand" id="master_brand">
                                <?php
                                $sql_brand = "SELECT * FROM `brand`";
                                $re_brand = mysqli_query($conn, $sql_brand);
                                foreach ($re_brand as $row) {
                                ?>
                                    <option value="<?= $row["b_id"]; ?>"><?= $row["b_name"]; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <button type="button" value="" class="btn btn-success btn-sm mt-3 " id="bt_master">บันทึก</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </form>

    </div>
    <script>
        $(document).ready(function() {
            $("#bt_mac").click(function(e) {
                var mac = $("#in_mac").val();
                $.ajax({
                    type: "post",
                    url: "editmacjson.php",
                    data: "status=1&mac=" + mac,
                    dataType: "text",
                    success: function(response) {
                        if (response == "true") {
                            alert("บันทึกสำเร็จ");
                        } else if (response == "false") {
                            alert("บันทึกไม่สำเร็จ");
                        }
                    }
                });
            });

            $("#bt_brand").click(function(e) {
                var brand = $("#in_brand").val();
                $.ajax({
                    type: "post",
                    url: "editmacjson.php",
                    data: "status=2&brand=" + brand,
                    dataType: "text",
                    success: function(response) {
                        if (response == "true") {
                            alert("บันทึกสำเร็จ");
                        } else if (response == "false") {
                            alert("บันทึกไม่สำเร็จ");
                        }
                    }
                });
            });

            $("#bt_master").click(function(e) {
                var master_brand = $("#master_brand").val();
                var master_mac = $("#master_mac").val();
                $.ajax({
                    type: "post",
                    url: "editmacjson.php",
                    data: "status=3&master_mac=" + master_mac + "&master_brand=" + master_brand,
                    dataType: "text",
                    success: function(response) {
                        if (response == "true") {
                            alert("บันทึกสำเร็จ");
                        } else if (response == "false") {
                            alert("บันทึกไม่สำเร็จ");
                        }
                    }
                });

            });


        });
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
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
  <?php  }
    ?>
</html>