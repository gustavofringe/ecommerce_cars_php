<?php

class Db
{
    public $db;
    public $conf = 'default';

    public function __construct()
    {
        $conf = Conf::$databases[$this->conf];
        try {
            $pdo = new PDO(
                'mysql:host=' . $conf['host'] . ';dbname=' . $conf['databasename'] . ';',
                $conf['login'],
                $conf['password'],
                [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']
            );
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->db = $pdo;
        } catch (PDOException $e) {
            die('Impossible de se connecter à la base de donnée');
        }
    }
}
