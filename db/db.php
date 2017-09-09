<?php
include 'config/conf.php';
    $conf = 'default';
    $confdb = $databases[$conf];
        try {
            $pdo = new PDO(
                'mysql:host=' . $confdb['host'] . ';dbname=' . $confdb['databasename'] . ';',
                $confdb['login'],
                $confdb['password'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('Impossible de se connecter à la base de donnée');
        }


