<?php

/**
 * Description of ConfiguracionRepository
 *
 * @author Tino
 */


class ConfiguracionRepository extends PDORepository {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        
    }

    public function listAll(){
        $mapper = function($row) {
            $configuracion = new Configuracion($row['id'], $row['clave'],  $row['valor'], $row['nombre']);
            return $configuracion;
        };

        $answer = $this->queryList(
                "select id, clave, valor, nombre from configuracion;", [], $mapper);
        
        return $answer;
    }

    public function getConfiguracion($id){
        $mapper = function($row) {
            $configuracion = new Configuracion($row['id'], $row['clave'],  $row['valor'], $row['nombre']);
            return $configuracion;
        };

        $answer = $this->queryList(
                "select id, clave, valor, nombre  from configuracion where id = ?;", [$id], $mapper);
        
        return $answer[0];
    }

    public function addConfiguracion($clave,$valor,$nombre){
        $this->touch(
            "INSERT INTO `configuracion` (`id`, `clave`,`valor`,`nombre`) VALUES ( ?, ?, ?,?);",[null, $clave, $valor, $nombre]);
    }

    public function delConfiguracion($id){
        $this->touch(
            "DELETE FROM `configuracion` WHERE `configuracion`.`id` = ? ;",[$id]);
    }

    public function modConfiguracion($id,$clave,$valor,$nombre){
        $this->touch(
            "UPDATE `configuracion` SET `clave` = ?,`valor` = ?, `nombre` = ? WHERE `configuracion`.`id` = ?;",[$clave, $valor, $nombre, $id]);
    }

    public function getValor($clave){
        $mapper = function($row) {
            $configuracion = new Configuracion($row['id'], $row['clave'],  $row['valor'], $row['nombre']);
            return $configuracion;
        };

        $answer = $this->queryList(
                "select id, clave, valor, nombre  from configuracion where clave = ?;", [$clave], $mapper);
        
        return $answer[0]->getValor();
    }
}
