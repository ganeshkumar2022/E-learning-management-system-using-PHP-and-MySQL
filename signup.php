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
include('userheader.php');
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <div class="card" style="margin-top:50px;">
        <div class="card-body">
        <form action="signup.php" method="post" autocomplete="off">
            <div class="form-group">
                <label><h5><i class="fa-solid fa-envelope"></i> Email</h5></label>
                <input type="email" class="form-control"  autofocus placeholder="Enter Email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label><h5><i class="fa-solid fa-user"></i> Username</h5></label>
                <input type="text" class="form-control" placeholder="Enter Username" name="name" id="email" required>
            </div>
            <div class="form-group">
                <label><h5><i class="fa-solid fa-lock"></i> Password</h5></label>
                <input type="password" class="form-control" placeholder="Enter Password" name="password" id="email" required>
            </div>
            <input type="submit" name="signup" value="Signup" class="text-uppercase btn bsu text-white" style="background-image: linear-gradient(orange,rgb(179, 129, 37))">
        <br/><a href="login.php" class="text-decoration-none text-dark">Already have an account? <b>Login</b></a>
        </div>
    </div>
    </div>
    </div>
</div>
</body>
</html>

<?php
if(isset($_POST["signup"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    include('db.php');
    $sql4="select * from users where email='$email'";
    $result=mysqli_query($con,$sql4);
    if(mysqli_num_rows($result)>0)
    {
        echo "<script>swal('Email Already Exists'); </script>";
    }
    else
    {

    
    $sql="insert into users (name,email,password) values ('$name','$email','$password')";
    if(mysqli_query($con,$sql))
    {
        echo "<script>swal('User Registered successfully!'); </script>";
    }
    else
    {
        echo "<script>swal('Error to Register!');</script>";
    }
}
}


?>