<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning User panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
<style>
  
  .card
  {
    box-shadow:2px 4px 10px grey;
  }
  li:hover
  {
    background-color:#00BFFF;
    color:white;
  }
  .tableone
  {
    height:300px;
    overflow:auto;
  }
 
</style>
</head>
<body class="on">
    <?php
include('aheader.php');
    ?>
<div class="" style="width:75%;float:right;height:95vh;">
<ul class="list-group">
  <li class="list-group-item font-weight-bold">Dashboard</li>
</ul>
<div class="container">
    <div class="row mt-4">
<div class="col-md-4">
<div class="card">
  <div class="card-body">
  <h3 style="font-family:fantasy;">Manage Courses</h3>
  <img src="images/book.png" height="100" width="100">
  <a href="manage_course.php" class="text-decoration-none">Manage Course <i class="fa-solid fa-book"></i></a>
  </div>
</div>
</div>
<div class="col-md-4">
<div class="card">
  <div class="card-body">
  <h3 style="font-family:fantasy;">Manage Videos</h3>
  <img src="images/video.png" height="100" width="100">
  <a href="manage_video.php" class="text-decoration-none text-danger">Manage Video <i class="fa-solid fa-video"></i></a>
  </div>
</div>
</div>
<div class="col-md-4">
<div class="card">
  <div class="card-body">
  <h3 style="font-family:fantasy;">Manage Quiz</h3>
  <img src="images/quiz.png" height="100" width="100">
  <a href="manage_quiz.php" class="text-decoration-none text-success">Manage Quiz <i class="fa-solid fa-question"></i></a>
  </div>
</div>
</div>
<div class="col-md-8 mt-4 tableone">
  
  
<table class="table table-bordered tablemy">
    <tr class="bg-primary text-light">
<th>Id</th>
<th>Name</th>
<th>Email</th>
</tr>
<?php
include('../db.php');
$sql="select * from users";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
while($row=mysqli_fetch_assoc($result))
{
    ?>
    <tbody>
    <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
</tr>
</tbody>
    <?php
}
}
?>
</table>
</div>
<div class="col-md-4 mt-4">
  <div class="card">
    <div class="card-body">
      <h4 style="font-family:serif;font-weight:bold;">No Of Courses</h4>
      <?php
      include('../db.php');
      $sql5="select count(id) as total_courses from courses";
      $result15=mysqli_query($con,$sql5);
      $row15=mysqli_fetch_assoc($result15);
      ?>
      <h4 class="text-danger"><?php echo $row15["total_courses"]; ?><h4>
    </div>
  </div>
  <div class="card mt-4">
    <div class="card-body">
    <?php
      include('../db.php');
      $sql5="select count(id) as total_courses from videos";
      $result15=mysqli_query($con,$sql5);
      $row15=mysqli_fetch_assoc($result15);
      ?>
      <h4 style="font-family:serif;font-weight:bold;">No Of Videos</h4>
      <h4 class="text-danger"><?php echo $row15["total_courses"]; ?><h4>
    </div>
  </div>

</div>
</div>
</div>
</div>
<?php
include('leftbar.php');
?>

</body>
</html>