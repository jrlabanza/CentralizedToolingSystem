<!DOCTYPE html>
<html lang="en">
<head>
  <title>CENTS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="public/css/font-awesome.min.css">
  <link rel="stylesheet" href="public/css/bootstrap4.0.0.min.css">
  <link rel="stylesheet" href="public/css/style.css">
  <link rel="stylesheet" href="public/js/date/jquery-ui.css">
  <script src="public/js/bootstrap/jquery-1.12.0.min.js"></script>
  <script src="public/js/bootstrap/bootstrap4.0.0.min.js"></script>
  <script src="public/js/pagiJsQuery-2.1.1.js"></script>
  <script src="public/js/jquery-1.7.2.js"></script>
</head>
<body>
      <?php require_once('controllers/navigation.php'); ?>
      <!-- Page Content Holder -->


    <!-- <div class="container"> -->



      <!-- <a href='index.php'>Home</a>
      <a href='?controller=posts&action=index'>Posts</a> -->



  <!-- <div class="container"> -->
    <?php require_once('controllers/routes.php'); ?>
  </div>
  </div>
    <!-- </div> -->
    <script src="public/js/jquery.form.js"></script> 
    <script type="text/javascript" src="public/js/ajax.js"></script>
    <?php
    if (!empty($_SESSION['loginError'])){
      echo '<script type="text/javascript">
  alert ("'.$_SESSION['loginError'].'");
       </script>';
    }
    unset ($_SESSION['loginError']);
    ?>
  </body>
</html>
