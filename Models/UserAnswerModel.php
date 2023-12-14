<?php

class UserAnswerModel extends BaseModel
{
  private $table = 'user_answers';

  public function getUserLessonStats()
  {
    return $this->select("
    SELECT
    u.username AS student_name,
    l.lesson_name,
    COUNT(q.id) AS total_questions,
    ua.attempt_count,
    COUNT(CASE WHEN ua.selected_answer = q.correct_answer THEN 1 ELSE NULL END) AS correct_answers,
    COUNT(CASE WHEN ua.selected_answer != q.correct_answer THEN 1 ELSE NULL END) AS incorrect_answers,
    CASE
        WHEN COUNT(CASE WHEN ua.selected_answer = q.correct_answer THEN 1 ELSE NULL END) < 3 THEN 'Yếu'
        WHEN COUNT(CASE WHEN ua.selected_answer = q.correct_answer THEN 1 ELSE NULL END) BETWEEN 3 AND 5 THEN 'Trung bình'
        WHEN COUNT(CASE WHEN ua.selected_answer = q.correct_answer THEN 1 ELSE NULL END) BETWEEN 6 AND 7 THEN 'Khá'
        WHEN COUNT(CASE WHEN ua.selected_answer = q.correct_answer THEN 1 ELSE NULL END) BETWEEN 8 AND 10 THEN 'Giỏi'
        ELSE 'Không xác định'
    END AS performance_evaluation
    FROM
        users u
    JOIN user_answers ua ON u.id = ua.user_id
    JOIN questions q ON ua.question_id = q.id
    JOIN lessons l ON q.lesson_id = l.id
    WHERE
        u.role = 'student'
    GROUP BY
        u.username, l.lesson_name, ua.attempt_count;
    ");
  }
  public function getMaxAttemptCount()
  {
    $data = $this->select("SELECT MAX(attempt_count) AS max_attempt_count FROM `$this->table`");
    if (count($data) == 0) return 0;
    return $data[0]['max_attempt_count'];
  }

  public function getResultOfUserByLessonId($userId, $lessonId)
  {
    $result = $this->select("
        SELECT
    u.username AS student_name,
    l.lesson_name,
    COUNT(q.id) AS total_questions,
    ua.attempt_count,
    COUNT(CASE WHEN ua.selected_answer = q.correct_answer THEN 1 ELSE NULL END) AS correct_answers,
    COUNT(CASE WHEN ua.selected_answer != q.correct_answer THEN 1 ELSE NULL END) AS incorrect_answers,
    CASE
        WHEN COUNT(CASE WHEN ua.selected_answer = q.correct_answer THEN 1 ELSE NULL END) < 3 THEN 'Yếu'
        WHEN COUNT(CASE WHEN ua.selected_answer = q.correct_answer THEN 1 ELSE NULL END) BETWEEN 3 AND 5 THEN 'Trung bình'
        WHEN COUNT(CASE WHEN ua.selected_answer = q.correct_answer THEN 1 ELSE NULL END) BETWEEN 6 AND 7 THEN 'Khá'
        WHEN COUNT(CASE WHEN ua.selected_answer = q.correct_answer THEN 1 ELSE NULL END) BETWEEN 8 AND 10 THEN 'Giỏi'
        ELSE 'Không xác định'
    END AS performance_evaluation
    FROM
        users u
    JOIN user_answers ua ON u.id = ua.user_id
    JOIN questions q ON ua.question_id = q.id
    JOIN lessons l ON q.lesson_id = l.id
    WHERE
        u.role = 'student' AND ua.user_id = $userId
        AND q.lesson_id = $lessonId
    GROUP BY
        u.username, l.lesson_name, ua.attempt_count
    ORDER BY
        ua.attempt_count ASC;
    ");

    $lastItem = end($result);


    $totalCorrect = $lastItem['correct_answers'];
    $totalIncorrect = $lastItem['incorrect_answers'];
    $performance_evaluation = $lastItem['performance_evaluation'];

    return [
      'totalCorrect' => $totalCorrect,
      'totalIncorrect' => $totalIncorrect,
      'performance_evaluation' => $performance_evaluation,
    ];
  }

  public function save($answers, $userId)
  {
    $maxAttemptCount = $this->getMaxAttemptCount();
    $upAttemptCount = $maxAttemptCount + 1;

    $sql = parent::$connection->prepare(
      "INSERT INTO `$this->table` (`user_id`, `question_id`, `selected_answer`, `attempt_count`) VALUES (?, ?, ?, ?);"
    );

    foreach ($answers as $questionId => $answer) {
      $sql->bind_param('iisi', $userId, $questionId,  $answer, $upAttemptCount);
      $result = $sql->execute();

      if (!$result) {
        return false;
      }
    }

    return true;
  }

  // Delete all before 
  // public function save($answers, $userId)
  // {

  //   $isDestroy = $this->destroyByUserId($userId);

  //   if ($isDestroy) {
  //     $sql = parent::$connection->prepare(
  //       "INSERT INTO `$this->table` (`user_id`, `question_id`, `selected_answer`) VALUES (?, ?, ?);"
  //     );

  //     foreach ($answers as $questionId => $answer) {
  //       $sql->bind_param('iis', $userId, $questionId,  $answer);
  //       $result = $sql->execute();

  //       if (!$result) {
  //         return false;
  //       }
  //     }

  //     return true;
  //   }
  // }

  // private function destroyByUserId($userId)
  // {
  //   $sql = parent::$connection->prepare("DELETE FROM `$this->table` WHERE `user_id`=$userId;");
  //   return $sql->execute();
  // }
}
