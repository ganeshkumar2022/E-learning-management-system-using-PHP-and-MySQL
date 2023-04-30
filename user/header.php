<?php
session_start();
if(!isset($_SESSION["id"]))
{
  header("Location:../login.php");
  exit();
}
?>
<nav>
<ul class="nav justify-content-center p-4 bg-primary">
  <li class="nav-item" style="margin-top:-7px;">
    <a class="nav-link text-white font-weight-bold" href="#"><b style="font-size:25px;font-family:verdana;">E-Learning System</b></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white font-weight-bold" href="#"></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white font-weight-bold" href="#"></a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white font-weight-bold" href="index.php">Dashoboard</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white font-weight-bold" href="#">Edit Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white font-weight-bold" href="services.php">Our services</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white font-weight-bold" href="#">About us</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white font-weight-bold btn roun" href="login.php" style="">Logout</a>
  </li>
</ul>
</nav>