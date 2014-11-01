<?php



/**
 * Description of Pedido
 *
 * @author Florencia
 */
class Pedido {
    
    private $numero;
    private $entidad_receptora_id;
    private $fecha_ingreso;
    private $estado_pedido_id;
    private $turno_entrega_id;
    private $con_envio;
    
    public function __construct($numero, $entidad_receptora_id, $fecha_ingreso, $estado_pedido_id, $turno_entrega_id, $con_envio){

        $this->numero = $numero;
        $this->entidad_receptora_id = $entidad_receptora_id;
        $this->fecha_ingreso = $fecha_ingreso;
        $this->estado_pedido_id = $estado_pedido_id;
        $this->turno_entrega_id = $turno_entrega_id;
        $this->con_envio = $con_envio;
    }

    public function getNumero() {
        echo $this->numero;
    }
    public function getEntidad_receptora_id() {
        echo $this->entidad_receptora_id;
    }
    public function getFecha_ingreso() {
        echo $this->fecha_ingreso;
    }
    public function getEstado_pedido_id() {
        echo $this->estado_pedido_id;
    }
    public function getTurno_entrega_id() {
        echo $this->turno_entrega_id;
    }
    public function getCon_envio() {
        echo $this->con_envio;
    }
}