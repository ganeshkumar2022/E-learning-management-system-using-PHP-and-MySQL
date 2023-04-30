<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nicedit</title>
</head>
<body>
<div id="sample">
  <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script> 
  <script type="text/javascript">
 
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  </script>
  <form action="" method="post">
  <h4>Description</h4>
<textarea name="area1" cols="40" rows="10"></textarea><br>
<input type="submit" name="submit" value="add">
</form>
</div>
</body>
</html>
<?php
if(isset($_POST["submit"]))
{
    $description=$_POST["area1"];
    echo $description;
    file_put_contents("123.php",$description);
}

?>