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
  <button type="button" class="btn btn-link text-decoration-none" data-toggle="modal" data-target="#myModal">
  Add Quiz title
</button>

<!-- The Modal -->
<div class="modal" id="myModal" style="color:black;">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add quiz title</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="" method="post">
  <div class="form-group">
    <label for="email" class="font-weight-bold">Add quiz title:</label>
    <input type="text" name="title" class="form-control" placeholder="Enter title" id="email">
  </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary" name="add_title">Add</button>
      </div>
      </form>
    </div>
<?php
if(isset($_POST["add_title"]))
{
$title=$_POST['title'];
include('../db.php');
$sql2="select * from quiz_title where title='$title'";
$result=mysqli_query($con,$sql2);
if(mysqli_num_rows($result)>0)
{

    echo "<script>swal('quiz title already exists');</script>";
}
else
{
$sql="insert into quiz_title values (NULL,'$title')";
if(mysqli_query($con,$sql))
{
    echo "<script>swal('quiz title added successfully');</script>";
}
else
{
    echo "<script>swal('Error to add quiz title');</script>";
}
}
}
?>
  </div>
</div>
  </li>
</ul>
<div class="container">
    <div class="row mt-4">
<!-- manage courses -->
<div class="col-md-6 offset-md-3">
<ul class="nav nav-tabs">

  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home">Add Quiz</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu1">Update quiz</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu2">Delete quiz</a>
  </li>
</ul>

<!-- Tab panes -->

<div class="tab-content">
  <div class="tab-pane container active" id="home">
<!-- Add courses start -->       
<div class="card">
  <div class="card-header bg-info"><h3 class="text-light">Add new Quiz</h3></div>
  <div class="card-body">
  <form action="" method="post" autocomplete="off">
  <div class="form-group">
  <label for="sel1" class="font-weight-bold">Select Quiz title:</label>
  <select class="form-control" id="sel1" name="topic_id">
<?php
include('../db.php');
$sql3="select * from quiz_title";
$result2=mysqli_query($con,$sql3);
if(mysqli_num_rows($result2)>0)
{
while($row=mysqli_fetch_assoc($result2))
{
    ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
    <?php
}
}
?>

  </select>
</div>
  <div class="form-group">
    <label for="name" class="font-weight-bold">Question:</label>
    <input type="text" class="form-control" placeholder="Enter question name" name="question" id="name" required>
  </div>
  <div class="form-group">
    <label for="name" class="font-weight-bold">Option A:</label>
    <input type="text" class="form-control" placeholder="Enter option 1" name="option1" id="option1" required>
  </div>
  <div class="form-group">
    <label for="name" class="font-weight-bold">Option B:</label>
    <input type="text" class="form-control" placeholder="Enter option 2" name="option2" id="option2" required>
  </div>
  <div class="form-group">
    <label for="name" class="font-weight-bold">Option C:</label>
    <input type="text" class="form-control" placeholder="Enter option 3" name="option3" id="option3" required>
  </div>
  <div class="form-group">
    <label for="name" class="font-weight-bold">Option D:</label>
    <input type="text" class="form-control" placeholder="Enter option 4" name="option4" id="option4" required>
  </div>
  <div class="form-group">
    <label for="name" class="font-weight-bold">Answer:</label>
    <input type="number" class="form-control" placeholder="Enter answer" name="answer" id="option4" required>
  </div>
  <button type="submit" name="add_quiz" class="btn btn-primary mt-2">Add Quiz</button>
</form>
<?php
if(isset($_POST["add_quiz"]))
{
  $quiz_title=$_POST["topic_id"];
  $question=$_POST["question"];
  $option1=$_POST['option1'];
  $option2=$_POST['option2'];
  $option3=$_POST['option3'];
  $option4=$_POST['option4'];
  $answer=$_POST["answer"];
  $sql2="insert into quiz values (NULL,$quiz_title,'$question','$option1','$option2','$option3','$option4','$answer')";
  include('../db.php');
  if(mysqli_query($con,$sql2))
  {
    echo "<script>swal('quiz added successfully');</script>";
  }
  else
  {
    echo "<script>swal('Error to add quiz');</script>";
  }
}
?>

<!-- Update courses end -->
  </div>
</div>
  </div>
  <div class="tab-pane container fade" id="menu1">
  <div class="card">
  <div class="card-header bg-info"><h3 class="text-light">Update Quiz</h3></div>
  <div class="card-body">

<table class="table table-bordered">
<tr class="bg-dark text-light">
  <th>Question</th>
  <th>option1</th>
  <th>Update</th>
</tr>
<?php
include('../db.php');
$sql2="select * from quiz";
$result2=mysqli_query($con,$sql2);
if(mysqli_num_rows($result2)>0)
{
  while($row2=mysqli_fetch_assoc($result2))
  {
    ?>
<tbody><tr>
<td><?php echo $row2["question"]; ?></td>
<td><?php echo $row2["option1"]; ?></td>
<td><a href="edit_quiz.php?id=<?php echo $row2['id']; ?>">Edit</a></td>
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
<div class="card-header bg-info text-light"><h3>Delete Quiz</h3></div>
<div class="card-body">
  <!-- delete course -->
  <table class="table table-bordered">
<tr class="bg-secondary text-light">
  <th>Question</th>
  <th>Option1</th>
  <th>Delete</th>
</tr>
<?php
include('../db.php');
$sql2="select * from quiz";
$result2=mysqli_query($con,$sql2);
if(mysqli_num_rows($result2)>0)
{
  while($row2=mysqli_fetch_assoc($result2))
  {
    ?>
<tr>
<td><?php echo $row2["question"]; ?></td>
<td><?php echo $row2["option1"]; ?></td>
<td><a href="delete_quiz.php?did=<?php echo $row2['id']; ?>">Delete</a></td>
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