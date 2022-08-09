<?php
include "../config.php";
if (isset($_POST["txt1"])) {
      /*
      function autonum()
      {
            include "../config.php";
            $sql = "SELECT MAX(users.u_id) FROM `users`;";
            $re = mysqli_query($conn, $sql);
            foreach ($re as $row) {
                  $a = ($row["MAX(users.u_id)"] + 1);
            }
            return $a;
      }
  */

      $arr = array(
            $_POST["txt1"],
            $_POST["txt2"],
            $_POST["txt3"],
            $_POST["txt4"]
      );


      $sql = "UPDATE users SET  u_usersname = '" . $arr[1] . "', u_pssaword= '" . $arr[2] . "', Status = '" . $arr[3] . "' WHERE u_id = " . $arr[0] . ";";
      $re = mysqli_query($conn, $sql);
    
      if ($re) {
            echo '<script>alert("บันทึกสำเร็จ")</script>';
            header('Location: ../user.php');
            exit(0);
      } else {
            echo '<script>alert("บันทึกไม่สำเร็จ")</script>';
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
                                    $sql = "SELECT * FROM `users` WHERE users.u_id = " . $_GET["id"];
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
                                                <input type="text" name="txt2" id="tx2" class="form-control form-control-sm" value="<?= $row["u_usersname"] ?>" required>
                                          </div>
                                          <div class="mb-3">
                                                <label for="" class="form-label">รหัสผ่าน</label>
                                                <input type="text" name="txt3" id="txt3" class="form-control form-control-sm" value="<?= $row["u_pssaword"] ?>" required>
                                          </div>
                                          <div class="mb-3">
                                                <label for="" class="form-label">สถานะ</label>
                                                <select name="txt4" id="txt4" class="form-select form-select-sm">
                                                      <?php
                                                      if ($row["Status"] == "Admin") {
                                                      ?>
                                                            <option value="Admin">Admin</option>
                                                            <option value="User">User</option>
                                                      <?php
                                                      } else {
                                                      ?>
                                                            <option value="User">User</option>
                                                            <option value="Admin">Admin</option>
                                                      <?php
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