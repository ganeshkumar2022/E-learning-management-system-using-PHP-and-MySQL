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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>
<style>
  .card
  {
    box-shadow:2px 4px 10px grey;
    height:500px;
    overflow-y: auto;
    overflow-x: hidden; 
  }
  li:hover
  {
    background-color:#00BFFF;
    color:white;
  }
  table
  {
   height:200px;
   width:100%;
   overflow-x:scroll;
   overflow-y:scroll;
  
  }
</style>
</head>
<body class="on">
    <?php
include('aheader.php');
    ?>
<div class="" style="width:75%;float:right;height:95vh;margin-top:60px;">
<ul class="nav" style="border-bottom:1px solid lightgrey;">
  <li class="nav-item">
    <a class="nav-link" href="view_courses.php"></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="manage_course.php"></a>
  </li>
</ul>
<div class="container">
    <div class="row mt-4">
<!-- manage courses -->
<div class="col-md-6 offset-md-3">
<h4 class="text-center">View Comments</h4>
<table class="table table-bordered">
<tr class="bg-info text-white">
    <th>S.NO</th>
    <th>Comments</th>
    <th>Date and Time</th>
</tr>
<?php 
include('../db.php');
$sql="select * from comments order by id desc";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
    $i=1;
    while($row=mysqli_fetch_assoc($result))
    {
        ?>
<tr>
<td><?php echo $i; ?></td>
<td><?php echo $row['comment']; ?></td>
<td><?php echo $row['reading_time']; ?></td>
</tr>
        <?php
        $i++;
    }
}
?>
</table>
  <!-- delete course -->
</div>
</div>
  </div>
</div>

</div>

<!-- manage courses -->
</div>
</div>
</div>
<?php
include('leftbar.php');
?>

</body>
</html>