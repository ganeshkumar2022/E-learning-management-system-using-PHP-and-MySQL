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
</head>
</head>
<body>
    <?php
include('header.php');
    ?>
<div class="container">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6 text-center">
<h3 class="font-weight-bold">SERVICES</h3>
<h5 class="text-secondary">these are the services are provided by us . and we also provide training program for students</h5>
</div>
<div class="col-md-3"></div>
</div>
<div class="row mt-4">
    <div class="col-md-4">
    <a href="programming.php" class="text-decoration-none text-dark">
    <div class="card py-4">
        <div class="card-body text-center">
        <h1><i class="fa-solid fa-book"></i></h1>
        <h4>Programming Tutorials</h4>
        <p style="text-align:justify;">Here you will see the Ebook tutorials related to the programming languages</p>
    </div>
    </div>
    </a>
    </div>
    <div class="col-md-4">
    <a href="video.php" class="text-decoration-none text-dark">
    <div class="card py-4">
        <div class="card-body text-center">
        <h1><i class="fa-solid fa-video"></i></h1>
        <h4>Video Tutorials</h4>
        <p style="text-align:justify;">Here you will see the Video tutorials related to the programming languages</p>
    </div>
    </div></a></div>
    <div class="col-md-4">
    <a href="exercise.php" class="text-decoration-none text-dark">
    <div class="card py-4">
        <div class="card-body text-center">
        <h1><i class="fa-solid fa-book-open"></i></h1>
        <h4>Exercise</h4>
        <p style="text-align:justify;">Here you will see the Exercises related to the programming languages</p>
    </div>
    </div>
    </a>
    </div>
    
</div>
</div>
</body>
</html>