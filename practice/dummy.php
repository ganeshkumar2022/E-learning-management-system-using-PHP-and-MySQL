<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Handling</title>
</head>
<body>
    <h1>Registration Form</h1>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        Name:<input type="text" name="name"><br><br>
        Email:<input type="email" name="email"><br><br>
        Website:<input type="text" name="website"><br><br>
        Gender:<input type="radio" name="gender" value="male">Male<input type="radio" name="gender" value="female">Female<br><br>
        Comment:<br/><textarea rows="5" cols="40"></textarea><br><br>
        <input type="submit"> 
</form>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(!empty($_POST["name"]))
    {
    $name=$_POST["name"];
    $name=str_replace(["<",">","/"],"",$name);
if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
  $nameErr = "Only letters and white space allowed";
  echo $nameErr;
}
else
{
    echo $name;
}
    
    }
    else
    {
        echo "empty";
        
    }

}

?>
</body>
</html>