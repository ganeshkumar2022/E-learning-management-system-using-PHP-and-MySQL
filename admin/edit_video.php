<?php
include('../db.php');
$id=$_GET["id"];
$sql="select * from videos where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-6">
<h3 class="text-success">Edit Video details</h3>
<form method="post" action="">
<div class="form-group">
    <label for="name" class="font-weight-bold">Course Name:</label>
    <input type="text" autofocus class="form-control" placeholder="Enter Course name" name="name" value="<?php echo $row["name"]; ?>" id="name" required>
  </div>
  <div class="form-group">
    <label for="name" class="font-weight-bold">Topic title:</label>
    <input type="text" autofocus class="form-control" placeholder="Enter topic title" name="topic_title" value="<?php echo $row["topic_title"]; ?>" id="name" required>
  </div>
  <div class="form-group">
  <label for="description" class="font-weight-bold">Video path:</label>
  <textarea class="form-control" rows="5" id="description" name="video_path" placeholder="Enter the description" required>
  <?php echo $row["video_path"]; ?>
  </textarea>
</div>
<input type="submit" name="edit_video" value="Update" class="btn btn-success">
</form>
</div>
</div>
</div>
</body>
</html>
<?php
if(isset($_POST["edit_video"]))
{
    $id=$_GET["id"];
    $name=$_POST["name"];
    $topic_title=$_POST["topic_title"];
    $video_path=$_POST["video_path"];
    include('../db.php');
    $sql2="update videos set name='$name',topic_title='$topic_title',video_path='$video_path' where id=$id";
    if(mysqli_query($con,$sql2))
    {
        echo "<script>swal('videos updated successfully');</script>";
    }
    else
    {
        echo "<script>swal('Error to update');</script>";
    }
}

?>