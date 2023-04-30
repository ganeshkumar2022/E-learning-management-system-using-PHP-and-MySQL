<?php
include('../db.php');
$id=$_GET["id"];
$sql="select * from quiz where id=$id";
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
<h3 class="text-success">Edit Quiz details</h3>
<form action="" method="post">
<div class="form-group">
    <label for="name" class="font-weight-bold">Question:</label>
    <input type="text" class="form-control" placeholder="Enter question name" value="<?php echo $row['question']; ?>" name="question" id="name" required>
  </div>
  <div class="form-group">
    <label for="name" class="font-weight-bold">Option A:</label>
    <input type="text" class="form-control" placeholder="Enter option 1" value="<?php echo $row['option1']; ?>" name="option1" id="option1" required>
  </div>
  <div class="form-group">
    <label for="name" class="font-weight-bold">Option B:</label>
    <input type="text" class="form-control" placeholder="Enter option 2" name="option2" value="<?php echo $row['option2']; ?>" id="option2" required>
  </div>
  <div class="form-group">
    <label for="name" class="font-weight-bold">Option C:</label>
    <input type="text" class="form-control" placeholder="Enter option 3" name="option3" id="option3" value="<?php echo $row['option3']; ?>" required>
  </div>
  <div class="form-group">
    <label for="name" class="font-weight-bold">Option D:</label>
    <input type="text" class="form-control" placeholder="Enter option 4" name="option4" id="option4" value="<?php echo $row['option4']; ?>" required>
  </div>
  <div class="form-group">
    <label for="name" class="font-weight-bold">Answer:</label>
    <input type="number" class="form-control" placeholder="Enter answer" name="answer" value="<?php echo $row['answer']; ?>" id="option4" required>
  </div>
  <button type="submit" name="edit_quiz" class="btn btn-primary mt-2">Edit Quiz</button>
</form>
</div>
</div>
</div>
</body>
</html>
<?php
if(isset($_POST["edit_quiz"]))
{
    $id=$_GET["id"];
    $question=$_POST["question"];
    $option1=$_POST['option1'];
    $option2=$_POST['option2'];
    $option3=$_POST['option3'];
    $option4=$_POST['option4'];
    $answer=$_POST["answer"];
    include('../db.php');
    $sql2="update quiz set question='$question',option1='$option1',option2='$option2',option3='$option3',option4='$option4',answer='$answer' where id=$id";
    if(mysqli_query($con,$sql2))
    {
        echo "<script>swal('quiz updated successfully');</script>";
    }
    else
    {
        echo "<script>swal('Error to update quiz');</script>";
    }
}

?>