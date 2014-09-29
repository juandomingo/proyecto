<?php

/**
 * Description of AlimentoRepository
 *
 * @author Florencia
 */
class AlimentoRepository extends PDORepository {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        
    }

    public function listAll() {

        $mapper = function($row) {
            $alimento = new Alimento($row['codigo'], $row['descripcion']);
            return $alimento;
        };

        $answer = $this->queryList(
                "select codigo, descripcion from alimento;", ['BASE TABLE'], $mapper);

        return $answer;
    }

    public function addAlimento($codigo, $descripcion){
        $this->touch(
            "INSERT INTO `banco_alimentos`.`alimento` (`codigo`, `descripcion`) VALUES (?, ?);",[$codigo, $descripcion]);
    }

    public function delAlimento($codigo){
        $this->touch(
            "DELETE FROM `banco_alimentos`.`alimento` WHERE `alimento`.`codigo` = ? ;",[$codigo]);
    }
    public function modAlimento($codigo,$descripcion){
        $this->touch(
            "UPDATE `banco_alimentos`.`alimento` SET `descripcion` = ? WHERE `alimento`.`codigo` = ?;",[$descripcion,$codigo]);


    }


}
