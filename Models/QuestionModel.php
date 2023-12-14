<?php

class QuestionModel extends BaseModel
{
  private $table = 'questions';

  public function all()
  {
    return $this->select("SELECT * FROM `$this->table`");
  }

  public function getQuestions($lessonId)
  {
    return $this->select("SELECT * FROM `$this->table` WHERE `lesson_id`=$lessonId");
  }

  public function save($questionText, $optionA, $optionB, $optionC, $optionD, $correctAnswer, $lessonId)
  {
    $sql = parent::$connection->prepare(
      "INSERT INTO `$this->table` (`question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`, `lesson_id`) VALUES (?,?,?,?,?,?,?);"
    );
    $sql->bind_param('ssssssi', $questionText, $optionA, $optionB, $optionC, $optionD, $correctAnswer, $lessonId);

    return $sql->execute();
  }

  public function delete($lessonId)
  {
    $sql = parent::$connection->prepare(
      "DELETE FROM `$this->table` WHERE `id`=?"
    );

    $sql->bind_param('i', $lessonId);
    return $sql->execute();
  }

  public function update($questionId, $questionText, $optionA, $optionB, $optionC, $optionD, $correctAnswer, $lessonId)
  {
    $sql = parent::$connection->prepare(
      "UPDATE `$this->table` SET `question_text`=?, `option_a`=?, `option_b`=?, `option_c`=?, `option_d`=?, `correct_answer`=?, `lesson_id`=? WHERE `id`=?"
    );

    $sql->bind_param('ssssssii', $questionText, $optionA, $optionB, $optionC, $optionD, $correctAnswer, $lessonId, $questionId);
    return $sql->execute();
  }
}
