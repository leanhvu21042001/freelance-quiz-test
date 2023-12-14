<?php

class BaseController
{
  const VIEWS_FOLDER_NAME = 'Views';
  const MODEL_FOLDER_NAME = 'Models';

  /**
   * Description:
   *  + path name (folder.file.name)
   *  + Lấy từ sau thư mục Views
   */
  protected function view($viewPath, array $data = [])
  {
    $this->protectedView($viewPath);

    /**
     
     $data = [
      'chapters' => $chapters,
      ]
     */

    foreach ($data as $key => $value) {
      $$key = $value;
    }
    require(self::VIEWS_FOLDER_NAME . '/' . str_replace('.', '/', $viewPath) . '.php');
  }

  protected function loadModel($modelPath)
  {
    require(self::MODEL_FOLDER_NAME . '/' . $modelPath . '.php');
  }

  private function protectedView($viewPath)
  {
    if (empty($_SESSION) && ($_SERVER['QUERY_STRING'] != "controller=user&action=login")) {
      return header('location: ?controller=user&action=login');
    } else if (!empty($_SESSION)) {
      $userId = $_SESSION['userId'];
      $username = $_SESSION['username'];
      $password = $_SESSION['password'];
      $role = $_SESSION['role']; // admin or student

      if ($userId && $username && $role && $password && $role == 'admin' && !strpos($viewPath, 'admin')) {
        return header('location: ?controller=admin&action=index');
      }

      if ($userId && $username && $role && $password && $role == 'student' && strpos($viewPath, 'admin')) {
        return header('location: ?controller=chapter&action=index');
      }
    }
  }
}
