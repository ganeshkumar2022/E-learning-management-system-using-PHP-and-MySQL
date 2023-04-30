<?php
$id=$_GET["id"];
include('db.php');
$sql="select * from topic where topic_id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row["topic_name"]; ?></title>
</head>
<body style="background-color:white;">
<?php echo $row["topic_description"]; ?> 
</body>
</html>