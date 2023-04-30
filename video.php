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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>
<style>
    a
    {
        text-decoration:none;
        color:black;
    }
    a:hover
    {
        text-decoration:none;
        color:black;
    }
</style>
</head>
<body class="" style="background-color:lightgray;">
<?php
include('userheader.php');
?>
<div class="container-fluid">
<div class="row">
    <div class="col-md-8" style="margin-bottom:40px;margin-top:40px;">
        <?php
        include('db.php');
        $id=$_GET['id'];
        $sql="select * from videos where id=$id";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        $path=$row['video_path'];
        ?>
        <iframe src="<?=$path?>" style="width:100%;height:400px;"></iframe>
        <form method="post" action="">
        <div class="form-group">
        <label for="comment">Comment:</label>
        <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Comment">
        </form>
        <?php
        if(isset($_POST["submit"]))
        {
            $comment=$_POST["comment"];
            include('db.php');
            $comment_id=$_GET['id'];
            $sql2="select * from comments where comment='$comment'";
            $result=mysqli_query($con,$sql2);
            if(mysqli_num_rows($result)>0)
            {

            }
            else
            {
            $sql="insert into comments (comment,video_id) values ('$comment',$comment_id)";
            if(mysqli_query($con,$sql))
            {
                echo "<script>swal('comment sended successfully...');</script>";
            }
            else
            {
                echo "<script>swal('Error to sent a comment');</script>";
            }
        }
        }
        ?>
    </div>
    <div class="col-md-4" style="margin-bottom:40px;margin-top:40px;">
    <div style="height:600px;overflow-y:scroll;">
    <p class="text-muted">Popular Videos</p>
    <table style="">
    
    <?php
include('db.php');
$sql="select * from videos";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
        ?>
<tr for="one">
    <th style="width:40%"><a href="video.php?id=<?php echo $row['id']; ?>"><img src="admin/<?php echo $row['myimage']; ?>" style="width:100%;"></a></th>
    <th style="width:60%"><a href="video.php?id=<?php echo $row['id']; ?>"><p><?php echo $row['topic_title']; ?></p></a></th>
</tr>
<a href="video.php?id=<?php echo $row['id']; ?>" style="display:none;" id="one">
        <?php
    }
}
    ?>
    </table>
    </div>
</div>
</div>
</div>
</body>
</html>