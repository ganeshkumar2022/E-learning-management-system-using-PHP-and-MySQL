<?php
session_start();
if(!isset($_SESSION["id"]))
{
    header("Location:login.php");
    exit;
}
?>
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
  <link rel="stylesheet" href="style.css">
</head>
</head>
<body class="on">
    <?php
include('header.php');

    ?>
<div class="container">
<form action="quiz.php" method="post">
<div class="form-group">
  <label for="sel1" class="font-weight-bold">Select Quiz title:</label>
  <select class="form-control" id="sel1" name="topic_id">
<?php
include('db.php');
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
<input type="submit" name="start_quiz" value="Start Quiz" class="btn btn-info">
</form>
<center>
<img src="download.jfif" style="margin-top:50px;">
</center>
</div>
</body>
</html>