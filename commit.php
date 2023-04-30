<?php
        if(isset($_POST["submit"]))
        {
            $comment=$_POST["comment"];
            include('db.php');
            $sql="insert into comments (comment) values ('$comment')";
            if(mysqli_query($con,$sql))
            {
                echo "<script>swal('comment sended successfully...');</script>";
            }
            else
            {
                echo "<script>swal('Error to sent a comment');</script>";
            }
        }
        ?>