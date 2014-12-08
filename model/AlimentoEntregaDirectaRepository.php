<?php

/**
 * Description of Alimento
 *
 * @author Tino
 */
class AlimentoEntregaDirectaRepository extends PDORepository{

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
            $alimentoPedido = new AlimentoEntregaDirecta($row['id'],$row['entrega_directa_id'], $row['detalle_alimento_id'],$row['cantidad']);
            return $alimentoPedido;
        };

        $answer = $this->queryList(
                "select id ,entrega_directa_id, detalle_alimento_id, cantidad from alimento_entrega_directa;", [], $mapper);
        return $answer;
    }

    public function addAlimentoEntregaDirecta($entrega_directa_id, $detalle_alimento_id, $cantidad){
        $result = $this->touch(
            "INSERT INTO `alimento_entrega_directa` (`id`,`entrega_directa_id`, `detalle_alimento_id`, `cantidad`) VALUES (?, ?, ?, ?);",[null,$entrega_directa_id, $detalle_alimento_id, $cantidad]);
        return $result;
    }

    public function delAlimentoEntregaDirecta($id){
        $this->touch(
            "DELETE FROM `alimento_entrega_directa` WHERE `id` = ?;",[$id]);
    }
    public function modAlimentoEntregaDirecta($id, $entrega_directa_id, $detalle_alimento_id, $cantidad){
        $this->touch(
            "UPDATE `entrega_directa` SET `entrega_directa_id` = ?, `detalle_alimento_id` = ?, `cantidad` = ?  WHERE `id` = ?;",[$entrega_directa_id, $detalle_alimento_id, $cantidad, $id]);
    }
    
    public function getAlimentoEntregaDirecta($id){
        $mapper = function($row) {
            $alimentoPedido = new AlimentoEntregaDirecta($row['id'],$row['entrega_directa_id'], $row['detalle_alimento_id'],$row['cantidad']);
            return $alimentoPedido;
        };

        $answer = $this->queryList(
                "select id ,entrega_directa_id, detalle_alimento_id, cantidad from alimento_entrega_directa where id = ?;", [$id], $mapper);
        return $answer;
    }

    public function getAlimentoEntregaDirectaIdEntrega($id){
        $mapper = function($row) {
            $alimentoPedido = new AlimentoEntregaDirecta($row['id'],$row['entrega_directa_id'], $row['detalle_alimento_id'],$row['cantidad']);
            return $alimentoPedido;
        };
        $answer = $this->queryList(
                "select id ,entrega_directa_id, detalle_alimento_id, cantidad from alimento_entrega_directa where entrega_directa_id = ?;", [$id], $mapper);
        return $answer;
    }

}

