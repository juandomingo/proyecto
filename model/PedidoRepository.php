<?php

/**
 * Description of PedidoRepository
 *
 * @author Florencia
 */
class PedidoRepository extends PDORepository {

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
            $pedido = new Pedido($row['numero'], $row['entidad_receptora_id'], $row['fecha_ingreso'], $row['estado_pedido_id'], $row['turno_entrega_id'], $row['con_envio']);
            return $pedido;
        };

        $answer = $this->queryList(
                "select numero, entidad_receptora_id, fecha_ingreso, estado_pedido_id, turno_entrega_id, con_envio from pedido;", ['BASE TABLE'], $mapper);

        return $answer;
    }

    public function addPedido($entidad_receptora_id, $fecha_ingreso, $estado_pedido_id, $turno_entrega_id, $con_envio){
        $this->touch(
            "INSERT INTO `pedido` (`numero`, `entidad_receptora_id`, `fecha_ingreso`, `estado_pedido_id`, `turno_entrega_id`, `con_envio) VALUES (?, ?, ?, ?, ?, ?);",[null, $entidad_receptora_id, $fecha_ingreso, $estado_pedido_id, $turno_entrega_id, $con_envio]);
    }

    public function delPedido($numero){
        $this->touch(
            "DELETE FROM `pedido` WHERE `pedido`.`numero` = ? ;",[$numero]);
    }
    public function modPedido($numero,$entidad_receptora_id,$fecha_ingreso, $estado_pedido_id, $con_envio){
        $this->touch(
            "UPDATE `pedido` SET `entidad_receptora_id` = ?, `fecha_ingreso` = ?, `estado_pedido_id` = ?, `turno_entrega_id` = ?, `con_envio` = ? WHERE `pedido`.`numero` = ?;",[$numero, $entidad_receptora_id, $fecha_ingreso, $estado_pedido_id, $turno_entrega_id, $con_envio]);


    }


}
