<?php
session_start();
define('HOST_URL', 'http://localhost/freelance-quiz-test');
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="<?= HOST_URL ?>/assets/bootstrap/bootstrap.min.css">

  <title>Hello, world!</title>
</head>

<body>


  <?php
  require_once('./Core/Database.php');
  require_once('./Models/BaseModel.php');
  require_once('./Controllers/BaseController.php');

  // Load controller
  $controllerName = ucfirst(strtolower($_REQUEST['controller'] ?? 'Welcome')) . 'Controller';
  require_once "./Controllers/$controllerName.php"; // AdminController
  // Load action
  $actionName = $_REQUEST['action'] ?? 'index';

  // Create controller and run action
  $controllerObject = new $controllerName;
  $controllerObject->$actionName();
  ?>

  <?php if (!empty($_SESSION)) : ?>
    <form action="?controller=user&action=logout" method="post" class="mt-5">
      <p class="text-center p-3">
        <button class="btn btn-danger" name="logout" value="logout">
          Đăng xuất
        </button>
      </p>
    </form>
  <?php endif; ?>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="<?= HOST_URL ?>/assets/bootstrap/bootstrap.bundle.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>