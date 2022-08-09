<?php
include "../config.php";
if (isset($_GET["id"]) && $_GET["id"] !== "") {
      header('Location: ../user.php');
      $sql = "DELETE FROM users WHERE users.u_id = " . $_GET["id"];
      $re = mysqli_query($conn, $sql);
      if ($re) {
            echo '<script>alert("บันทึกสำเร็จ")</script>';
      } else {
            echo '<script>alert("บันทึกไม่สำเร็จ")</script>';
      }
}
?>