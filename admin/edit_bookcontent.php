
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
  <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script> 
  <script type="text/javascript">
 
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  </script>
<style>
  .card
  {
    box-shadow:2px 4px 10px grey;
    height:500px;
    overflow-y: auto;
    overflow-x: hidden; 
  }
  .doom li:hover
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
  <li class="list-group-item text-primary font-weight-bold">Edit Contents</li>
</ul>
</div>
<div class="col-md-12">
<?php
$id=$_GET["id"];
$edit_id=$_GET["edit_id"];
include('../db.php');
$sql3="select * from topic where topic_id='$edit_id'";
$result3=mysqli_query($con,$sql3);
$row3=mysqli_fetch_assoc($result3);
?>
<form action="" method="post" autocomplete="off">
  <div class="form-group">
    <label for="email">Topic name:</label>
    <input type="text" class="form-control" value="<?php  echo $row3['topic_name']; ?>" placeholder="Enter topic name" name="name" id="email" required>
  </div>
  <div class="form-group">
  <label for="comment">Topic Description:</label>
  <textarea class="form-control" rows="10" style="overflow-x:scroll;overflow-y:scroll;" id="comment" name="description" required><?php echo $row3['topic_description']; ?></textarea>
</div>
</div>
  <button type="submit" class="btn btn-primary ml-2" name="edit">Update</button>
</form>
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
if(isset($_POST["edit"]))
{
include('../db.php');
$name=$_POST["name"];
$description=$_POST["description"];
$edit=$_GET["edit_id"];
$sql4="update topic set topic_name='$name',topic_description='$description' where topic_id=$edit";
if(mysqli_query($con,$sql4))
{

    echo "<script>alert('update successfully...');window.location.replace(window.location.href);</script>";

}
else
{
    echo "<script>alert('Unable to update...');window.location.replace(window.location.href);</script>";
}
}

?>
