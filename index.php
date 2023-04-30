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
</head>
</head>
<body class="" style="background-color:lightgray;">
<?php
include('userheader.php');
?>
<div class="container mt-4">
  <h3>E learning Tutorials</h3>
  <div class="row mt-4">
  <?php
include('db.php');
$sql3="select * from courses";
$result3=mysqli_query($con,$sql3);
if(mysqli_num_rows($result3)>0)
{
    while($row3=mysqli_fetch_assoc($result3))
    {
        ?>
        <!-- start -->
<div class="col-md-4">
<div class="card" style="height:300px;box-shadow:5px 8px 3px gray;">
<a href="content.php?id=<?php echo $row3['id']; ?>" class="text-decoration-none text-dark">
  <img class="card-img-top" src="admin/<?php echo $row3['myimage']; ?>" alt="Card image">
  <div class="card-body">
    <b class="card-title"><?php echo $row3['name']; ?></b>
    <p class="card-text"><?php echo $row3["description"]; ?></p>
  </div>
    </a>
</div>
</div>
<!-- end -->
        <?php
    }
}
        ?>


    </div>
  </div>
</div>

<!-- video tutorial start -->

<div class="container mt-4">
  <h3>Video Tutorials</h3>
  <div class="row my-4">
  <?php
include('db.php');
$sql3="select * from videos";
$result3=mysqli_query($con,$sql3);
if(mysqli_num_rows($result3)>0)
{
    while($row3=mysqli_fetch_assoc($result3))
    {
        ?>
        <!-- start -->
<div class="col-md-4">
<div class="card" style="height:300px;box-shadow:5px 8px 3px gray;">
<a href="video.php?id=<?php echo $row3['id']; ?>" class="text-decoration-none text-dark">
  <img class="card-img-top" src="admin/<?php echo $row3['myimage']; ?>" alt="Card image">
  <div class="card-body">
    <b class="card-title"><?php echo $row3['name']; ?></b>
    <p class="card-text"><?php echo $row3["topic_title"]; ?></p>
  </div>
    </a>
</div>
</div>
<!-- end -->
        <?php
    }
}
        ?>


    </div>
  </div>
</div>



<!-- video tutorial end -->
</body>
</html>