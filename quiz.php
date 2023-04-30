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
<h3 class=" py-2 text-center" style="color:#007bff;">Quiz test</h3>
<form action="result.php" method="post">
<?php
$quiz_title=$_POST['topic_id'];
include('db.php');
$sql="select * from quiz where quiz_title=$quiz_title";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
$i=1;
while($row=mysqli_fetch_assoc($result))
{
    ?>
<div class="card py-2 my-2" style="border:none;">
<div class="card-body">
<input type="hidden" name="answer<?php echo $i; ?>" value="<?php echo $row['answer'];?>">
<h4><?php echo "$i. ".$row['question']; ?></h4>
<p><input type="radio" name="option<?php echo $i; ?>" value="1"> <?php echo $row['option1']; ?></p>
<p><input type="radio" name="option<?php echo $i; ?>" value="2"> <?php echo $row['option2']; ?></p>
<p><input type="radio" name="option<?php echo $i; ?>" value="3"> <?php echo $row['option3']; ?></p>
<p><input type="radio" name="option<?php echo $i; ?>" value="4"> <?php echo $row['option4']; ?></p>
</div>
</div>
    <?php
    $i++;
}
}
else
{
    echo "no datas found";
}
?>
<center>
<input type="submit" name="submit" value="Finish quiz" class="btn btn-primary text-white my-2">
</center>
</form>
<?php $j=$i-1; $_SESSION['j']=$j; ?>
</div>
</body>
</html>