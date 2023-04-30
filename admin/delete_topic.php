<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete topic</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
$id=$_GET["id"];
include('../db.php');
$sql="delete from topic where topic_id=$id";
if(mysqli_query($con,$sql))
{
    echo "<script>Swal.fire('Topic deleted successfully...');</script>";
}
else
{
    echo "<script>Swal.fire('Error to delete topic...');</script>";
    
}
?>
</body>
</html>