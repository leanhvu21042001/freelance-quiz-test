<?php

class AdminController extends BaseController
{
  private $userModel;
  private $chapterModel;
  private $lessonModel;
  private $questionModel;
  private $userAnswerModel;

  public function __construct()
  {
    $this->loadModel('UserModel');
    $this->loadModel('ChapterModel');
    $this->loadModel('LessonModel');
    $this->loadModel('QuestionModel');
    $this->loadModel('UserAnswerModel');

    $this->userModel = new UserModel;
    $this->chapterModel = new ChapterModel;
    $this->lessonModel = new LessonModel;
    $this->questionModel = new QuestionModel;
    $this->userAnswerModel = new UserAnswerModel;
  }

  public function index()
  {
    return $this->view('frontend.admin.index');
  }

  public function chapter()
  {
    // Thêm mới chapter.
    if (isset($_POST['save']) && $_POST['save'] == 'save') {
      $chapterName = $_POST['chapter_name'];
      $saved = $this->chapterModel->save($chapterName);
    }

    // Xóa chapter.
    if (isset($_POST['delete']) && $_POST['delete'] == 'delete') {
      $chapterId = $_POST['chapter_id'];
      $deleted = $this->chapterModel->delete($chapterId);
    }

    // Thêm mới chapter.
    if (isset($_POST['update']) && $_POST['update'] == 'update') {
      $chapterId = $_POST['chapter_id'];
      $chapterName = $_POST['chapter_name'];
      $updated = $this->chapterModel->update($chapterId, $chapterName);
    }

    $chapters = $this->chapterModel->getChapters();

    // frontend/admin/chapter.php
    return $this->view('frontend.admin.chapter', [
      'chapters' => $chapters,
    ]);
  }

  public function lesson()
  {
    // Thêm mới lesson.
    if (isset($_POST['save']) && $_POST['save'] == 'save') {
      $chapterId = $_POST['chapter_id'];
      $lessonName = $_POST['lesson_name'];
      $saved = $this->lessonModel->save($chapterId, $lessonName);
    }

    // Xóa lesson.
    if (isset($_POST['delete']) && $_POST['delete'] == 'delete') {
      $chapterId = $_POST['lesson_id'];
      $deleted = $this->lessonModel->delete($chapterId);
    }

    // cập nhập lesson.
    if (isset($_POST['update']) && $_POST['update'] == 'update') {
      $chapterId = $_POST['chapter_id'];
      $lessonName = $_POST['lesson_name'];
      $lessonId = $_POST['lesson_id'];
      $updated = $this->lessonModel->update($lessonName, $chapterId, $lessonId);
    }

    $lessons = $this->lessonModel->getLessons();
    $chapters = $this->chapterModel->getChapters();

    return $this->view('frontend.admin.lesson', [
      'lessons' => $lessons,
      'chapters' => $chapters,
    ]);
  }

  public function question()
  {
    // Thêm mới question.
    if (isset($_POST['save']) && $_POST['save'] == 'save') {

      $questionText = $_POST['question_text'];
      $optionA = $_POST['option_a'];
      $optionB = $_POST['option_b'];
      $optionC = $_POST['option_c'];
      $optionD = $_POST['option_d'];
      $correctAnswer = $_POST['correct_answer']; // Char: 'A' | 'B' | 'C' | 'D'
      $lessonId = $_POST['lesson_id'];

      $saved = $this->questionModel->save(
        $questionText,
        $optionA,
        $optionB,
        $optionC,
        $optionD,
        $correctAnswer,
        $lessonId,
      );
    }

    // Xóa question.
    if (isset($_POST['delete']) && $_POST['delete'] == 'delete') {
      $questionId = $_POST['question_id'];
      $deleted = $this->questionModel->delete($questionId);
    }

    // cập nhập question.
    if (isset($_POST['update']) && $_POST['update'] == 'update') {
      $questionId = $_POST['question_id'];
      $questionText = $_POST['question_text'];
      $optionA = $_POST['option_a'];
      $optionB = $_POST['option_b'];
      $optionC = $_POST['option_c'];
      $optionD = $_POST['option_d'];
      $correctAnswer = $_POST['correct_answer']; // Char: 'A' | 'B' | 'C' | 'D'
      $lessonId = $_POST['lesson_id'];

      $updated = $this->questionModel->update(
        $questionId,
        $questionText,
        $optionA,
        $optionB,
        $optionC,
        $optionD,
        $correctAnswer,
        $lessonId,
      );
    }

    $lessons = $this->lessonModel->getLessons();
    // $chapters = $this->chapterModel->getChapters();
    $questions = $this->questionModel->all();

    return $this->view('frontend.admin.question', [
      'questions' => $questions,
      'lessons' => $lessons,
      // 'chapters' => $chapters,
    ]);
  }

  public function result()
  {
    $userLessonStats = $this->userAnswerModel->getUserLessonStats();

    return $this->view('frontend.admin.result', [
      'userLessonStats' => $userLessonStats,
    ]);
  }
}
