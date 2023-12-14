<?php

class ChapterModel extends BaseModel
{
  private $table = 'chapters';

  public function getChapters()
  {
    return $this->select("SELECT * FROM `$this->table`");
  }

  public function save($chapter_name)
  {
    $sql = parent::$connection->prepare(
      "INSERT INTO `$this->table` (`chapter_name`) VALUES (?);"
    );

    $sql->bind_param('s', $chapter_name);
    return $sql->execute();
  }

  public function delete($chapterId)
  {
    $sql = parent::$connection->prepare(
      "DELETE FROM `$this->table` WHERE `id`=?"
    );

    $sql->bind_param('i', $chapterId);
    return $sql->execute();
  }


  public function update($chapter_id, $chapter_name)
  {
    $sql = parent::$connection->prepare(
      "UPDATE `$this->table` SET `chapter_name`=? WHERE `id`=?"
    );

    $sql->bind_param('si', $chapter_name, $chapter_id);
    return $sql->execute();
  }
}
