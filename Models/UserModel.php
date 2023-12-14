<?php

class UserModel extends BaseModel
{
    private $table = 'users';

    public function getUserByUsername($username)
    {
        $users = $this->select("SELECT * FROM `$this->table` WHERE `username`='$username'");
        if (count($users) == 0) return NULL;
        return $users[0];
    }
}
