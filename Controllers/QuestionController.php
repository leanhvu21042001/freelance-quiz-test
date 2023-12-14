<?php

class QuestionController extends BaseController
{
  private $questionModel;
  private $userAnswerModel;

  public function __construct()
  {
    $this->loadModel('QuestionModel');
    $this->loadModel('UserAnswerModel');
    $this->questionModel = new QuestionModel;
    $this->userAnswerModel = new UserAnswerModel;
  }

  public function index()
  {

    if (!empty($_GET) && !empty($_GET['lesson_id'])) {

      $result = [];
      $lessonId = $_GET['lesson_id'];

      if (!empty($_POST) && !empty($_SESSION)) {
        $userId = $_SESSION['userId'];
        $answersSelected = $_POST;
        $isDone = $this->userAnswerModel->save($answersSelected, $userId);

        if ($isDone) $result = $this->userAnswerModel->getResultOfUserByLessonId($userId, $lessonId);
      }

      $questions = $this->questionModel->getQuestions($lessonId);

      return $this->view("frontend.questions.index", [
        'questions' => $questions,
        'result' => $result
      ]);
    }
  }
}
