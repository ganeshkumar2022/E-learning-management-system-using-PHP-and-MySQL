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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <div class="col-md-12 mb-2">
    <ul class="list-group">
  <li class="list-group-item text-primary font-weight-bold">Add Contents</li>
</ul>
</div>
<button type="button" class="btn btn-primary ml-3" data-toggle="modal" data-target="#myModal">
  Add new topic
</button>

<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">


      <div class="modal-header">
        <h4 class="modal-title">Manage Topic</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


      <div class="modal-body">
      <form action="" method="post">
  <div class="form-group">
    <input type="hidden" name="courses_id" value="<?php echo $_GET['id']; ?>">
    <label for="name">Topic name:</label>
    <input type="text" class="form-control" name="name" placeholder="Enter topic name" id="name">
  </div>
  <div class="form-group">
  <label for="comment">Description:</label>
  <textarea class="form-control" rows="5" id="comment" name="description" required placeholder="Enter your description here"></textarea>
</div>
  
      </div>
      <div class="modal-footer">
      <button type="submit" name="add_topic" class="btn btn-danger">Add topic</button>
</form>
      </div>

    </div>
  </div>
</div>
<?php
if(isset($_POST["add_topic"]))
{
$courses_id=$_POST["courses_id"];
$topic_name=$_POST["name"];
$topic_description=$_POST["description"];
include('../db.php');

//check exists
$check_exists="select * from topic where topic_name='$topic_name'";
$check_r=mysqli_query($con,$check_exists);
if(mysqli_num_rows($check_r)>0)
{

}
else
{
$topic_add="insert into topic (courses_id,topic_name,topic_description) values ($courses_id,'$topic_name','$topic_description')";
if(mysqli_query($con,$topic_add))
{
 echo "<script>
  Swal.fire({
    icon: 'success',
    title: 'Success...',
    text: 'Topic added successfully!',
    
  });
  </script>";

}
else
{
  echo "<script>
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Unable to Add topic!',
  });
  </script>";
}
}
}
?>
<div class="col-md-12">
  <table class="table table-bordered mt-3 ">
<tr class="bg-primary text-white">
  <th>Id</th>
  <th>topic name</th>
  <th>Update</th>
  <th>Delete</th>
</tr>
<?php
include('../db.php');
$course_id=$_GET["id"];
$sql10="select * from topic where courses_id=$course_id";
$result10=mysqli_query($con,$sql10);
if(mysqli_num_rows($result10)>0){
  $i=1;
  while($row10=mysqli_fetch_assoc($result10))
  {
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $row10["topic_name"]; ?></td>
      <td><a href="edit_bookcontent.php?edit_id=<?php echo $row10["topic_id"]; ?>&&id=<?php echo $_GET['id']; ?>" class="text-primary">Edit <i class="fa-solid fa-pen-to-square"></i></a></td>
      <td><a href="add_bookcontent.php?id=<?php echo $_GET['id']; ?>&&del_id=<?php echo $row10["topic_id"]; ?>" class="text-danger">Delete <i class="fa-solid fa-trash-can"></i></a></td>
    </tr>
    <?php
    $i++;
  }
}
?>
</table>
</div>
</div>
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
<?php
if(isset($_GET["del_id"]))
{
$id=$_GET["del_id"];
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
}
?>