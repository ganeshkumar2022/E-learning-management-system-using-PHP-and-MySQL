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
    <a class="nav-link" href="view_courses.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="manage_course.php">Manage Course</a>
  </li>
</ul>
<div class="container">
    <div class="row mt-4">
<!-- manage courses -->
<div class="col-md-6 offset-md-3">
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home">Add</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu1">Update</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu2">Delete</a>
  </li>
</ul>

<!-- Tab panes -->

<div class="tab-content">
  <div class="tab-pane container active" id="home">
<!-- Add courses start -->       
<div class="card">
  <div class="card-header bg-info"><h3 class="text-light">Add new Course</h3></div>
  <div class="card-body">
  <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
  <div class="form-group">
    <label for="name" class="font-weight-bold">Course Name:</label>
    <input type="text" class="form-control" placeholder="Enter Course name" name="name" id="name" required>
  </div>
  <div class="form-group">
  <label for="description" class="font-weight-bold">Course Description:</label>
  <textarea class="form-control" rows="5" id="description" name="description" placeholder="Enter the description" required></textarea>
</div>
<label for="description" class="font-weight-bold">Choose image:</label>
<div class="custom-file">
    <input type="file" class="custom-file-input" required name="myimage" id="customFile">
    <label class="custom-file-label" for="customFile">Choose file</label>
  </div>
  <script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
  
  <button type="submit" name="add_courses" class="btn btn-primary mt-2">Add Course</button>
</form>
<?php
if(isset($_POST["add_courses"]))
{
include('../db.php');

$target_dir = "course/";
$target_file = $target_dir . basename($_FILES["myimage"]["name"]);
if(strstr($target_file,".jpg") || strstr($target_file,".png") || strstr($target_file,".jfif"))
{
if (move_uploaded_file($_FILES["myimage"]["tmp_name"], $target_file))
 {
    $name=$_POST["name"];
    $description=$_POST["description"];
    $sql16="select * from courses where name='$name'";
    $result16=mysqli_query($con,$sql16);
    if(mysqli_num_rows($result16)>0)
    {
      echo "<script>swal('Course name already exists!');</script>";
    }
    else
    {
    $sql="insert into courses (name,description,myimage) values ('$name','$description','$target_file')";
    if(mysqli_query($con,$sql))
    {
        echo "<script>swal('Add courses successfully');</script>";
    }
    else
    {
        echo "<script>swal('Error to upload courses');</script>";
    }
  }
        
  }
   else 
   {
    echo "<script>swal('Error image not uploaded');</script>";
  }

}
else
{
    echo "<script>swal('Image files only allowed');</script>";
}
}
?>

<!-- Update courses end -->
  </div>
</div>
  </div>
  <div class="tab-pane container fade" id="menu1">
  <div class="card">
  <div class="card-header bg-info"><h3 class="text-light">Update Course</h3></div>
  <div class="card-body">

<table class="table table-bordered">
<tr class="bg-dark text-light">
  <th>course name</th>
  <th>Description</th>
  <th>Update</th>
</tr>
<?php
include('../db.php');
$sql2="select * from courses";
$result2=mysqli_query($con,$sql2);
if(mysqli_num_rows($result2)>0)
{
  while($row2=mysqli_fetch_assoc($result2))
  {
    ?>
<tbody><tr>
<td><?php echo $row2["name"]; ?></td>
<td><?php echo $row2["description"]; ?></td>
<td><a href="edit_course.php?id=<?php echo $row2['id']; ?>">Edit</a></td>
</tr></tbody>
    <?php
  }
}
?>

</table>
</div>
<!-- Update courses end -->
  </div>
  </div>
  <div class="tab-pane container fade" id="menu2">
    <div class="card">
<div class="card-header bg-info text-light"><h3>Delete Courses</h3></div>
<div class="card-body">
  <!-- delete course -->
  <table class="table table-bordered">
<tr class="bg-secondary text-light">
  <th>course name</th>
  <th>Description</th>
  <th>Delete</th>
</tr>
<?php
include('../db.php');
$sql2="select * from courses";
$result2=mysqli_query($con,$sql2);
if(mysqli_num_rows($result2)>0)
{
  while($row2=mysqli_fetch_assoc($result2))
  {
    ?>
<tr>
<td><?php echo $row2["name"]; ?></td>
<td><?php echo $row2["description"]; ?></td>
<td><a href="delete_course.php?did=<?php echo $row2['id']; ?>">Delete</a></td>
</tr>
    <?php
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