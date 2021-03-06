<?php

/**
 * Description of DonanteRepository
 *
 * @author Florencia
 */
class DonanteRepository extends PDORepository {

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
            $donante = new Donante($row['id'], $row['razon_social'], $row['apellido_contacto'], $row['nombre_contacto'], $row['telefono_contacto'], $row['mail_contacto'], $row['domicilio_contacto']);
            return $donante;
        };

        $answer = $this->queryList(
                "select id, razon_social, apellido_contacto, nombre_contacto, telefono_contacto, mail_contacto, domicilio_contacto from donante;", ['BASE TABLE'], $mapper);

        return $answer;
    }

    public function addDonante($razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto){
        $this->touch(
            "INSERT INTO `donante`
             (`id`,`razon_social`, `apellido_contacto`, `nombre_contacto`, `telefono_contacto`, `mail_contacto`, `domicilio_contacto`) 
             VALUES (?, ?, ?, ?, ?, ?, ?);",
             [null,$razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto]);

    }

    public function modDonante($id,$razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto){
        $this->touch("UPDATE `donante`
         SET `razon_social` = ?, `apellido_contacto` = ?, `nombre_contacto` = ?, telefono_contacto = ?, mail_contacto = ?, domicilio_contacto = ?
         WHERE `donante`.`id` = ?;",
         [$razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto,$id]
         );
    }

    public function delDonante($codigo){
        $this->touch(
            "DELETE FROM `donante` WHERE `donante`.`id` = ? ;",[$codigo]);
    }
    
    public function listAllById($id) {

        $mapper = function($row) {
            $donante = new Donante($row['id'], $row['razon_social'], $row['apellido_contacto'], $row['nombre_contacto'], $row['telefono_contacto'], $row['mail_contacto'], $row['domicilio_contacto']);
            return $donante;
        };

        $answer = $this->queryList(
                "select id, razon_social, apellido_contacto, nombre_contacto, telefono_contacto, mail_contacto, domicilio_contacto from donante where id = ?;", [$id], $mapper);

        return $answer;
    }
    

}
