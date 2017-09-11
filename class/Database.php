<?php
class Database{
    public $db;
    public $conf = 'default';
    public $confdb = Conf::$databases[$conf];
    public function __construct()
    {
        try {
            $pdo = new PDO(
                'mysql:host=' . $this->confdb['host'] . ';dbname=' . $this->confdb['databasename'] . ';',
                $this->confdb['login'],
                $this->confdb['password'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('Impossible de se connecter à la base de donnée');
        }
    }
}