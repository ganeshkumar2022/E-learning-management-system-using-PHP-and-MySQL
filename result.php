<?php
session_start();
$j=$_SESSION['j'];
if(isset($_POST["submit"]))
{
    $result=0;
    for($i=1;$i<=$j;$i++)
    {
        $answer=$_POST['answer'.$i];
        $option=$_POST['option'.$i];
        if($answer==$option)
        {
            $result+=1;
        }
    }
}
echo "<script>alert('Your score is $result/$j');window.location.replace('start_quiz.php');</script>";
?>