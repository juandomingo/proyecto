<?php

/**
 * Description of UserRepository
 *
 * @author Tino
 */
class UserRepository extends PDORepository {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        
    }

    public function getOne($name,$password) {

        $mapper = function($row) {
            $user = new User($row['id'], $row['name'],  $row['password'], $row['type']);
            return $user;
        };

        $answer = $this->queryList(
                "select id, name, password, type from user where name=? AND password = ?;", [$name,$password], $mapper);
        
        return $answer;
    }

    public function listAll(){
        $mapper = function($row) {
            $user = new User($row['id'], $row['name'],  $row['password'], $row['type']);
            return $user;
        };

        $answer = $this->queryList(
                "select id, name, password, type from user;", [], $mapper);
        
        return $answer;
    }

    public function getUser($id){
        $mapper = function($row) {
            $user = new User($row['id'], $row['name'],  $row['password'], $row['type']);
            return $user;
        };

        $answer = $this->queryList(
                "select id, name, password, type from user where id = ?;", [$id], $mapper);
        
        return $answer[0];
    }

    public function addUser($name,$password,$type){
        $this->touch(
            "INSERT INTO `user` (`id`, `name`,`password`, `type`) VALUES (?, ?, ?, ?);",[null, $name, $password, $type]);
    }

    public function delUser($id){
        $this->touch(
            "DELETE FROM `user` WHERE `user`.`id` = ? ;",[$id]);
    }

    public function modUser($id,$name,$password,$type){
        echo "holis";
        $this->touch(
            "UPDATE `user` SET `name` = ?,`password` = ? ,`type` = ? WHERE `user`.`id` = ?;",[$name, $password, $type, $id]);
    }


}
