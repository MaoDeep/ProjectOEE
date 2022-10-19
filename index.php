<?php
session_start();
include "config.php";
if(isset($_POST['submit'])){
    $arr = array(
        $_POST["txt1"],
        $_POST["txt2"]
  );
  
  $sql = "SELECT * FROM `users` WHERE users.u_usersname = '" . $arr[0] . "' AND users.u_pssaword = '" . $arr[1] . "'";
  $re = mysqli_query($conn, $sql);
    
      if(mysqli_num_rows($result)==1){

          $row = mysqli_fetch_array($result);

          $_SESSION["u_id"] = $rw["id"];
          $_SESSION["user"] = $rw["u_usersname"];
            $_SESSION["status"] = $rw["Status"];

            if($_SESSION["status"]=="Admin"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

            Header("Location: admin/home.php");

          }

          if ($_SESSION["Status"]=="User"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php

            Header("Location: home.php");

          }

      }else{
        echo "<script>";
            echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
            echo "window.history.back()";
        echo "</script>";

      }


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

    <title>Login User</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pridi:wght@300&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body id="page-top" style="font-family: 'Pridi', serif;"></body>
<body class="bg-gradient-primary">

    <div class="container">


        

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-md-6 d-none d-lg-block ">
                                <center>
                                    <img src="img/low.png" height="420px" width="330px">

                            </div>
                            <div class="col-md-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-primary mb-2">ระบบแสดงประสิทธิผลโดยรวมของเครื่องจักร</h1>
                                        <h1 class="h4 text-danger mb-4">บริษัท Yasaki </h1>
                                    </div>
                                     
                                    
                                    <form class="user" method="POST" action="ch.php">
                                        <div class="form-group">
                                            <input type="text" name="txt1" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="txt2" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" requireds>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        


                                    </form>
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>