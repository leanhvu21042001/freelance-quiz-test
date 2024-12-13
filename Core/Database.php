<?php
class Database
{
    const USERNAME = 'root';
    const PASSWORD = '';

    const DB_HOST = 'localhost:81';
    const DB_NAME = 'quiz_system';
    const DB_PORT = '3306';
    const DB_CHARSET = 'utf8';

    public static $connection;
    public function __construct()
    {
        if (!self::$connection) {
            self::$connection = new mysqli(self::DB_HOST, self::USERNAME, self::PASSWORD, self::DB_NAME, self::DB_PORT);
            self::$connection->set_charset(self::DB_CHARSET);
        }

        return self::$connection;
    }
}
