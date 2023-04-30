<nav class="navbar navbar-expand-md bg-light navbar-dark" style="padding:3px;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar" style="border-bottom:2px solid green;">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-dark" href="index.php"><i class="fa-solid fa-house-chimney"></i></a>
      </li>
<?php
include('db.php');
$sql_select="select id,name from courses limit 12";
$result_select=mysqli_query($con,$sql_select);
if(mysqli_num_rows($result_select)>0)
{
  while($row_select=mysqli_fetch_assoc($result_select))
  {
    ?>
    <li class="nav-item">
        <a class="nav-link text-dark text-uppercase" href="content.php?id=<?php echo $row_select["id"]; ?>"><?php echo $row_select["name"]; ?></a>
      </li>
    <?php
  }
}
?>
      
    </ul>
  </div>
</nav>