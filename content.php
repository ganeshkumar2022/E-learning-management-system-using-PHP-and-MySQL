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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
<style>
  .onew:hover
  {
    background-color:lightblue;
  }
</style>
</head>
<body class="home-p">
<?php
include('userheader.php');
?>
<div>
<div class="w-75 float-right">
<?php
include('db.php');
$id2=$_GET["id"];
$sql2="select * from topic where courses_id=$id2 limit 1";
$result2=mysqli_query($con,$sql2);
$row2=mysqli_fetch_assoc($result2);
?>
<iframe src="content2.php?id=<?php echo $row2['topic_id'] ?>" name="iframe_a" style="width:100%;height:100vh">
</iframe>
</div>
<div class="w-25" style="background-color:white;font-weight:bold;height:100vh;">
<ul class="nav flex-column" style="background-color:white;">
<?php
include('db.php');
$id=$_GET["id"];
$sql="select * from topic where courses_id=$id";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
        ?>
        
  <li class="nav-item onew" style="border-bottom:2px solid gray;">
    <a class="nav-link text-dark" href="content2.php?id=<?php echo $row['topic_id'] ?>" target="iframe_a"><?php echo $row["topic_name"]; ?></a>
  </li>
        <?php
    }
}
?>
</ul>
</div>

</div>
<div class="container">
  <div class="row">



    </div>
  </div>
</div>
</body>
</html>