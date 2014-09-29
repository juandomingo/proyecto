<?php

/**
 * Description of EntidadReceptoraRepository
 *
 * @author Florencia
 */
class EntidadReceptoraRepository extends PDORepository {

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
            $entidad_receptora = new EntidadReceptora($row['id'], $row['razon_social'], $row['telefono'], $row['domicilio'], $row['estado_entidad_id'], $row['necesidad_entidad_id'], $row['servicio_prestado_id']);
            return $entidad_receptora;
        };

        $answer = $this->queryList(
                "select id, razon_social, telefono, domicilio, estado_entidad_id, necesidad_entidad_id, servicio_prestado_id from entidad_receptora;", ['BASE TABLE'], $mapper);

        return $answer;
    }

    public function addEntidadReceptora($razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id){
        $this->touch(
            "INSERT INTO `banco_alimentos`.`entidad_receptora` 
            (`id`, `razon_social`, `telefono`, `domicilio`, `estado_entidad_id`, `necesidad_entidad_id`, `servicio_prestado_id`) 
            VALUES (?, ?, ?, ?, ?, ?, ?);",
             [null,$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id]);
    }

    public function delEntidadReceptora($codigo){
        $this->touch(
            "DELETE FROM `banco_alimentos`.`entidad_receptora` WHERE `entidad_receptora`.`id` = ? ;",[$codigo]);
    }

    public function modEntidadReceptora($id,$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id){
        $this->touch("UPDATE `banco_alimentos`.`entidad_receptora`
         SET `razon_social` = ?, `telefono` = ?, `domicilio` = ?, estado_entidad_id = ?, necesidad_entidad_id = ?, servicio_prestado_id = ?
         WHERE `entidad_receptora`.`id` = ?;",
         [$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id,$id]
         );
    }
}