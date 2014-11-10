<?php

/**
 * Description of AlimentoPedidoRepository
 *
 * @author Tino
 */
class AlimentoPedidoRepository extends PDORepository {

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
            $alimentoPedido = new AlimentoPedido($row['pedido_numero'], $row['detalle_alimento_id'],$row['cantidad']);
            return $alimentoPedido;
        };

        $answer = $this->queryList(
                "select pedido_numero, detalle_alimento_id, cantidad from alimento_pedido;", [], $mapper);

        return $answer;
    }

    public function addAlimentoPedido($pedido_numero, $detalle_alimento_id, $cantidad){
        $this->touch(
            "INSERT INTO `alimento_pedido` (`pedido_numero`, `detalle_alimento_id`, `cantidad`) VALUES (?, ?, ?);",[$pedido_numero, $detalle_alimento_id, $cantidad]);
    }

    public function delAlimentoPedido($pedido_numero, $detalle_alimento_id, $cantidad){
        $this->touch(
            "DELETE FROM `alimento_pedido` WHERE `alimento_pedido`.`pedido_numero` = ?, `alimento_pedido`.`detalle_alimento_id` = ?, `alimento_pedido`.`cantidad` = ? ;",[$pedido_numero, $detalle_alimento_id, $cantidad]);
    }
    public function modAlimentoPedido($codigo,$descripcion){
        $this->touch(
            "UPDATE `alimento` SET `descripcion` = ? WHERE `alimento`.`codigo` = ?;",[$descripcion,$codigo]);
    }
    
}

