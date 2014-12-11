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
                "select numero, entidad_receptora_id, fecha_ingreso, estado_pedido_id, turno_entrega_id, con_envio from pedido where del <> 1;", ['BASE TABLE'], $mapper);

        return $answer;
    }

    public function addPedido($entidad_receptora_id, $fecha_ingreso, $estado_pedido_id, $turno_entrega_id, $con_envio){
        $id = $this->touch(
            "INSERT INTO `pedido` (`numero`, `entidad_receptora_id`, `fecha_ingreso`, `estado_pedido_id`, `turno_entrega_id`, `con_envio`) VALUES (?, ?, ?, ?, ?, ?)",[null, $entidad_receptora_id, $fecha_ingreso, $estado_pedido_id, $turno_entrega_id, $con_envio]);
        return $id;
    }

    public function delPedido($numero){
        $this->touch(
            "UPDATE `pedido` SET `del` = 1 WHERE `pedido`.`numero` = ?;",[$numero]);
    }
    public function modPedido($numero_pedido,$id_entidad_receptora,$estado,$envio){
        $this->touch(
            "UPDATE `pedido` SET `entidad_receptora_id` = ?,  `estado_pedido_id` = ?, `con_envio` = ? WHERE `pedido`.`numero` = ?;",[$id_entidad_receptora, $estado, $envio, $numero_pedido]);
    }
    public function listPorTurnoEntrega($id){

        $mapper = function($row) {
            $pedido = new Pedido($row['numero'], $row['entidad_receptora_id'], $row['fecha_ingreso'], $row['estado_pedido_id'], $row['turno_entrega_id'], $row['con_envio']);
            return $pedido;
        };

        $answer = $this->queryList(
                "select numero, entidad_receptora_id, fecha_ingreso, estado_pedido_id, turno_entrega_id, con_envio from pedido where turno_entrega_id = ?;", [$id], $mapper);

        return $answer;
    }

    public function listPedidoByNumero($numero)
    {
        $mapper = function($row) {
            $pedido = new Pedido($row['numero'], $row['entidad_receptora_id'], $row['fecha_ingreso'], $row['estado_pedido_id'], $row['turno_entrega_id'], $row['con_envio']);
            return $pedido;
        };

        $answer = $this->queryList(
                "select numero, entidad_receptora_id, fecha_ingreso, estado_pedido_id, turno_entrega_id, con_envio from pedido where numero = ?;", [$numero], $mapper);

        return $answer;
    }

    public function listPedidoByElse($id_entidad_receptora, $fecha_ingreso, $estado_pedido_id, $turno_entrega_id, $con_envio)
    {
        
        $mapper = function($row) {
            $pedido = new Pedido($row['numero'], $row['entidad_receptora_id'], $row['fecha_ingreso'], $row['estado_pedido_id'], $row['turno_entrega_id'], $row['con_envio']);
            return $pedido;
        };

        $answer = $this->queryList(
                "select numero, entidad_receptora_id, fecha_ingreso, estado_pedido_id, turno_entrega_id, con_envio from pedido where id_entidad_receptora = ? and fecha_ingreso = ? and estado_pedido_id = ? and turno_entrega_id = ? and con_envio = ?;", [$id_entidad_receptora, $fecha_ingreso, $estado_pedido_id, $turno_entrega_id, $con_envio], $mapper);

        return $answer;
    }

    public function createPedido($id_entidad_receptora,$turno_entrega_id,$con_envio)
    {
        $estado_pedido_id = 0;
        $fecha_ingreso = date("Y-m-d");
        $id = $this->addPedido($id_entidad_receptora, $fecha_ingreso, $estado_pedido_id, $turno_entrega_id, $con_envio);
        return $id;
    }

    public function listPorTurnoEntregaId($id_pedido)
    {
        $mapper = function($row) {
        $pedido = new Pedido($row['numero'], $row['entidad_receptora_id'], $row['fecha_ingreso'], $row['estado_pedido_id'], $row['turno_entrega_id'], $row['con_envio']);
            return $pedido;
        };

        $answer = $this->queryList(
                "select numero, entidad_receptora_id, fecha_ingreso, estado_pedido_id, turno_entrega_id, con_envio from pedido where turno_entrega_id = ? and del <> 1;", [$id_pedido], $mapper);
        return $answer;
    }

    public function getPedidoDia($date)
    {
        $turnosPedidos = TurnoEntregaRepository::getInstance()->listPorDia($date);
        $pedidos_hoy = [];
        foreach ($turnosPedidos as $turnoPedido) {
            $pedidos_hoy = PedidoRepository::getInstance()->listPorTurnoEntregaId($turnoPedido->getID());
        }
        return $pedidos_hoy;
    }

}
