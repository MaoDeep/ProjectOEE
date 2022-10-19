<?php
include "../config.php";
if (isset($_POST["submit"])) {
      $arr = array(
            $_POST["txt1"],
            $_POST["txt2"],
            $_POST["txt3"],
            $_POST["txt4"],
            $_POST["txt6"],
            $_POST["txt7"],
            $_POST["txt8"]

      );


      $sql = "UPDATE users SET   u_usersname = '" . $arr[1] . "', u_pssaword = " . $arr[2] . ", Status = '" . $arr[3] . "' , std2 = '" . $arr[4] . "', mac_id = '" . $arr[5] . "' , b_id = '" . $arr[6] . "'   WHERE u_id = " . $arr[0] . "";
      $re = mysqli_query($conn, $sql);
      if ($re) {
            echo "<script>alert('บันทึกสำเร็จ')</script>";
            header('Location: ../user.php');
            exit(0);
      } else {
            echo "<script>alert('บันทึกไม่สำเร็จ')</script>";
      }
}
if (isset($_GET["id"]) && $_GET["id"] !== "") {
?>
      <!doctype html>
      <html lang="en">

      <head>
            <title>แก้ไข</title>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS v5.2.0-beta1 -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

      </head>

      <body>
            <form action="edit.php" method="post" class="needs-validation" name="myform" novalidate>
                  <div class="container mt-3">
                        <div class="card">
                              <div class="card-header">
                                    <b>ข้อมูลผู้ใช้</b>
                              </div>
                              <div class="card-body">
                                    <?php
                                    $sql = "SELECT * FROM `users`  WHERE users.u_id = " . $_GET["id"];
                                    $re = mysqli_query($conn, $sql);
                                    foreach ($re as $row) {
                                    ?>
                                          <div class="mb-3">
                                                <label for="" class="form-label ">ลำดับที่</label>
                                                <input type="text" name="txt5" id="txt5" class="form-control form-control-sm" value="<?= $row["u_id"] ?>" required disabled>
                                                <input type="hidden" name="txt1" id="txt1" class="form-control form-control-sm" value="<?= $row["u_id"] ?>" required>
                                          </div>
                                          <div class="mb-3">
                                                <label for="" class="form-label">ชื่อ</label>
                                                <input type="text" name="txt2" id="txt2" class="form-control form-control-sm" value="<?= $row["u_usersname"] ?>" required>
                                          </div>

                                          <div class="mb-3">
                                                <label for="" class="form-label">รหัสผ่าน</label>
                                                <input type="text" name="txt3" id="txt3" class="form-control form-control-sm" value="<?= $row["u_pssaword"] ?>" required>
                                          </div>
                                          <div class="mb-3">
                                                <label for="" class="form-label">สิทธิ์ผู้ใช้งาน</label>
                                                <input name="txt4" id="txt4" class="form-control form-control-sm" readonly="" value="<?= $row["Status"] ?>" required>
                                                      

                                                
                                          </div>
                                          <div class="mb-3">
                                                <label for="" class="form-label">สถานะ</label>
                                                <select name="txt6" id="txt6" class="form-select form-select-sm" value="" required>
                                                      <?php
                                                      if ($row["std2"] == "ปกติ") {
                                                      ?>
                                                            <option value="ปกติ">ปกติ</option>
                                                            <option value="หยุดงาน">ยกเลิกใช้งาน</option>

                                                      <?php
                                                      } else {
                                                      ?>
                                                            <option value="หยุดงาน">ยกเลิกใช้งาน</option>
                                                            <option value="ปกติ">ปกติ</option>

                                                      <?php
                                                      }
                                                      ?>
                                                </select>

                                          </div>
                                          <div class="mb-3">
                                                <label for="" class="form-label">เครื่องจักร</label>
                                                <select name="txt7" id="txt7" class="form-select form-select-sm" value="" required>

                                                      <?php
                                                      $sql_type = "SELECT * FROM machine ORDER BY mac_id ";
                                                      $result_type = $conn->query($sql_type);

                                                      if ($result_type->num_rows > 0) {
                                                            while ($row_type = $result_type->fetch_assoc()) {
                                                                  $name = $row_type['mac_name'];
                                                                  $id = $row_type['mac_id'];
                                                                  $type_selected = 'none';
                                                                  $status_selected = 'none';
                                                                  if ($id == $row['mac_id']) {
                                                                        $type_selected = 'selected';
                                                                  }
                                                                  echo "<option value=\"$id\" $type_selected>$name</option>";
                                                            }
                                                      }
                                                      ?>
                                                </select>
                                          </div>
                                          <div class="mb-3">
                                                <label for="" class="form-label">รุ่น</label>
                                                <select name="txt8" id="txt8" class="form-select form-select-sm" value="" required>

                                                <?php
                                                      $sql_type = "SELECT * FROM brand ORDER BY b_id ASC";
                                                      $result_type = $conn->query($sql_type);

                                                      if ($result_type->num_rows > 0) {
                                                            while ($row_type = $result_type->fetch_assoc()) {
                                                                  $name = $row_type['b_name'];
                                                                  $id = $row_type['b_id'];
                                                                  $type_selected = 'none';
                                                                  $status_selected = 'none';
                                                                  if ($id == $row['b_id']) {
                                                                        $type_selected = 'selected';
                                                                  }
                                                                  echo "<option value=\"$id\" $type_selected>$name</option>";
                                                            }
                                                      }
                                                      ?>

                                                </select>
                                          </div>
                                    <?php } ?>
                                    <div class="row">
                                          <div class="col-12 text-center">
                                                <div class="d-grid gap-2 mt-3">
                                                      <a href="../user.php"><button type="submit" class="btn btn-sm btn-primary w-100" name="submit">บันทึก</button>
                                                </div>
                                                <div class="d-grid gap-2 mt-3">
                                                      <a href="../user.php"><button type="button" class="btn btn-sm btn-danger w-100">กลับไปหน้าหลัก</button></a>
                                                </div>
                                          </div>

                                    </div>
                              </div>

                              <div class="card-footer text-muted">

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
<?php

}
?>