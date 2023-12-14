<?php

class BaseModel extends Database
{
  public function select($sql)
  {
    $items = [];
    $sqlPrepared = self::$connection->prepare($sql);
    $sqlPrepared->execute();
    $items = $sqlPrepared->get_result()->fetch_all(MYSQLI_ASSOC);
    return $items;
  }
}
