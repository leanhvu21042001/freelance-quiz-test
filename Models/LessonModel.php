<?php

class LessonModel extends BaseModel
{
  private $table = 'lessons';

  public function getLessons()
  {
    return $this->select("SELECT * FROM `$this->table`");
  }


  public function save($chapter_id, $lesson_name)
  {
    $sql = parent::$connection->prepare(
      "INSERT INTO `$this->table` (`lesson_name`, `chapter_id`) VALUES (?,?);"
    );

    $sql->bind_param('ss', $lesson_name, $chapter_id);
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

  public function update($lesson_name, $chapter_id, $lesson_id)
  {
    $sql = parent::$connection->prepare(
      "UPDATE `$this->table` SET `lesson_name`=?, `chapter_id`=? WHERE `id`=?"
    );

    $sql->bind_param('sii', $lesson_name, $chapter_id, $lesson_id);
    return $sql->execute();
  }
}
