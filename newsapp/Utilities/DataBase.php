<?php


class DataBase {
  
    public static function getConnection()
		{
			$paramsPath = './Config/dbParams.php';
			$params = include($paramsPath);


			$dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
			$db = new PDO($dsn, $params['user'], $params['password']);

			return $db;
		}

}
