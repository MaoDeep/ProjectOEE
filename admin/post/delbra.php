<?php
include "../config.php";
if (isset($_GET["id"]) && $_GET["id"] !== "") {
  header('Location: ../machine.php');
  $sql = "DELETE FROM brand WHERE brand.b_id = " . $_GET["id"];
  $re = mysqli_query($conn, $sql);
  if ($re) {
    echo '<script>alert("ลบสำเร็จ")</script>';
  } else {
    echo '<script>alert("ลบไม่สำเร็จ")</script>';
  }
}
?>
<script>
  function chkdel() {
    if (confirm('  กรุณายืนยันการลบอีกครั้ง !!!  ')) {
      return true;
    } else {
      return false;
    }
  }
</script>