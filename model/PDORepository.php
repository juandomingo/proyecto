<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PDORepository
 *
 * @author fede
 */
abstract class PDORepository {
    
    const USERNAME = "proyecto";
    const PASSWORD = "yes";
	const HOST ="localhost";
	const DB = "banco_alimentos";
    
    
    private function getConnection(){
        $u=self::USERNAME;
        $p=self::PASSWORD;
        $db=self::DB;
        $host=self::HOST;
        $connection = new PDO("mysql:dbname=$db;host=$host", $u, $p);
        return $connection;
    }
    
    protected function queryList($sql, $args, $mapper){
        $connection = $this->getConnection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($args);
        $list = [];
        while($element = $stmt->fetch()){
            $list[] = $mapper($element);
        }
        $connection = null;
        return $list;
    }

    protected function touch($sql,$args)
{
    $connection = $this->getConnection();
    $stmt = $connection->prepare($sql);
    $stmt->execute($args);
    $connection = null;
}

}