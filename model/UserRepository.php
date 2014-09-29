<?php

/**
 * Description of ResourceRepository
 *
 * @author fede
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
            $user = new User($row['id'], $row['name'],  $row['password']);
            return $user;
        };

        $answer = $this->queryList(
                "select id, name, password from banco_alimentos.`user` where name=? AND password = ?;", [$name,$password], $mapper);
        return $answer;
    }
}
