<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>
</head>
<body>
    
</body>
</html>
<?php
$id=$_GET["did"];
include('../db.php');
$sql2="delete from courses where id=$id";
if(mysqli_query($con,$sql2))
{
    echo "<script>swal('Course deleted successfully');</script>";
    header("refresh:3;url=http://localhost/e-learning/admin/manage_course.php");
}
else
{
    echo "<script>swal('Error to delete');</script>";
    header("refresh:3;url=http://localhost/e-learning/admin/manage_course.php");
}
?>