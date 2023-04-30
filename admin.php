<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>
</head>
</head>
<body class="home-p">
<?php
session_start();
include('userheader.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <div class="card" style="margin-top:50px;">
        <div class="card-body">
        <form action="admin.php" method="post" autocomplete="off">
            <h3 class="text-center">Admin Login</h3>
            <div class="form-group">
                <label><h5><i class="fa-solid fa-user"></i> Username</h5></label>
                <input type="text" autofocus class="form-control" name="name" placeholder="Enter Username" id="email">
            </div>
            <div class="form-group">
                <label><h5><i class="fa-solid fa-lock"></i> Password</h5></label>
                <input type="password" class="form-control" name="password" placeholder="Enter Password" id="email">
            </div>
            <input type="submit" name="alogin" value="Login" class="text-uppercase btn bsu text-white" style="background-image: linear-gradient(orange,rgb(179, 129, 37))">
       
        </div>
    </div>
    </div>
    </div>
</div>
</body>
</html>
<?php
if(isset($_POST["alogin"]))
{
    $name=$_POST["name"];
    $password=$_POST["password"];
    include('db.php');
    $sql="select * from admin where name='$name' and password='$password'";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
      $row=mysqli_fetch_assoc($result);
      $id=$row["id"];
      $_SESSION["aid"]=$id;
      echo "<script>window.location.replace('admin/index.php');</script>";
      exit();
    }
    else {
        echo "<script>swal('user name or password error');</script>";
    }
}

?>