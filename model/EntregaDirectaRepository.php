<?php

/**
 * Description of EntregaDirectaRepository
 *
 * @author Tino
 */
class EntregaDirectaRepository extends PDORepository {

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
            $alimentoPedido = new EntregaDirecta($row['id'], $row['entidad_receptora_id'],$row['fecha']);
            return $alimentoPedido;
        };

        $answer = $this->queryList(
                "select id, entidad_receptora_id, fecha from entrega_directa;", [], $mapper);
        return $answer;
    }

    public function addEntregaDirecta($entidad_receptora_id, $fecha){
        $entrega = $this->touch(
            "INSERT INTO `entrega_directa` (`id`, `entidad_receptora_id`, `fecha`) VALUES (?, ?, ?);",[null, $entidad_receptora_id, $fecha]);
        return $entrega;
    }

    public function delEntregaDirecta($id){
        $this->touch(
            "DELETE FROM `entrega_directa` WHERE `id` = ?;",[$id]);
    }
    public function modEntregaDirecta($id, $entidad_receptora_id, $fecha){
        $this->touch(
            "UPDATE `entrega_directa` SET `entidad_receptora_id` = ?, `fecha` = ?  WHERE `id` = ?;",[$entidad_receptora_id,$fecha,$id]);
    }
    
    public function getEntregaDirecta($id){
        $mapper = function($row) {
            $alimentoPedido = new EntregaDirecta($row['id'], $row['entidad_receptora_id'],$row['fecha']);
            return $alimentoPedido;
        };

        $answer = $this->queryList(
                "select id, entidad_receptora_id, fecha from entrega_directa where id = id;", [$id], $mapper);

        return $answer;
    }

    public function getAlimentoEntregaDirectaAsociados($id){
        $alimentos = AlimentoEntregaDirecta::getInstace()->getAlimentoEntregaDirectaIdEntrega($id);
        return $alimentos;
    }



    public function getEntregaDia($date){
        $mapper = function($row) {
            $alimentoPedido = new EntregaDirecta($row['id'], $row['entidad_receptora_id'],$row['fecha']);
            return $alimentoPedido;
        };

        $answer = $this->queryList(
                "select id, entidad_receptora_id, fecha from entrega_directa where fecha = ?;", [$date], $mapper);
        return $answer;
    }
}

