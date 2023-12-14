<?php

class UserController extends BaseController
{
  private $userModel;
  public function __construct()
  {
    $this->loadModel('UserModel');
    $this->userModel = new UserModel;
  }

  public function index()
  {
    return $this->view('frontend.users.index', [
      'title' => "User title page"
    ]);
  }

  public function login()
  {
    if (!empty($_POST)) {
      $username = $_POST["username"];
      $password = $_POST["password"];

      $userFound = $this->userModel->getUserByUsername($username);

      if (!empty($userFound)) {
        $passwordUserFound = $userFound['password'];
        $roleUserFound = $userFound['role'];
        $idUserFound = $userFound['id'];

        if ($passwordUserFound == $password) {

          $_SESSION['userId'] = $idUserFound;
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;
          $_SESSION['role'] = $roleUserFound;

          if ($roleUserFound == 'admin') {
            header("location: ?controller=admin&action=index");
          } else {
            header("location: ?controller=chapter&action=index");
          }
        }
      }
    }

    if (!empty($_SESSION)) {
      return header('location: ?controller=chapter&action=index');
    }
    return $this->view('frontend.users.login');
  }

  public function logout()
  {
    if (!empty($_POST) && $_POST['logout']) {
      session_unset();
      session_destroy();
      return header('location: ?controller=user&action=login');
    }
  }
}
