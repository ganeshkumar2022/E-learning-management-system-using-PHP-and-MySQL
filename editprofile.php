<?php
session_start();
if(!isset($_SESSION["id"]))
{
    header("Location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Edit user profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="style.css">
</head>
</head>
<body class="on">
    <?php
include('header.php');

    ?>
<div class="container">
<?php
$id=$_SESSION['id'];
include('db.php');
$sql="select * from users where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
?>
<h3>Edit profile</h3>
<form action="" method="post" name="f1" onsubmit="return check()">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email" placeholder="Enter email" id="email" value="<?php echo $row['email']; ?>">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password" placeholder="Enter password" id="pwd" value="<?php echo $row['password']; ?>">
  </div>
  <button type="submit" class="btn btn-primary" name="update">update</button>
</form>
</div>
<script>
    function check()
    {
        var email=document.f1.email.value;
        var password=document.f1.password.value;
        if(email.length=="" && password.length=="")
        {
            Swal.fire("please fill email and password fields");
            return false;
        }
        else
        {
            if(email.length=="")
            {
                Swal.fire("please fill email field");
                return false;
            }
            if(password.length=="")
            {
                Swal.fire("please fill password field");
                return false;
            }
        }
    }
</script>
</body>
</html>
<?php
if(isset($_POST["update"]))
{
    include('db.php');
    $id=$_SESSION['id'];
    $email=$_POST["email"];
    $password=$_POST["password"];   
    $sql="update users set email='$email',password='$password' where id=$id";
    if(mysqli_query($con,$sql))
    {
        echo "<script>
        Swal.fire('Datas updated successfully');
        </script>";
        header("refresh:5;url=http://localhost/e-learning/editprofile.php");
        
    }
    else
    {
        echo "<script>
        Swal.fire('Error to update');
        window.location.replace('editprofile.php');
        </script>";
        header("refresh:5;url=http://localhost/e-learning/editprofile.php");
    }

}

?>