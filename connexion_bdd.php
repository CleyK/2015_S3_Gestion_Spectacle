<?php
class Connexion{
	public static function connect(){
        $dsn = 'mysql:host='.hostname.';dbname='.database.";charset=utf8";
        $user = username;
        $password = password;
        try {
            $ma_connexion_mysql = new PDO($dsn, $user, $password);
            $ma_connexion_mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $ma_connexion_mysql->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,'SET NAMES utf8');
            $ma_connexion_mysql->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC); 
            return $ma_connexion_mysql;

        } catch (PDOException $e) {
            echo "Connexion à MySQL impossible : ", $e->getMessage();
            die();
        }


    }
}
