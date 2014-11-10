<?php

/**
 * Description of Alimento
 *
 * @author Tino
 */
class AlimentoPedido {
    
    private $pedido_numero;
    private $detalle_alimento_id;
    private $cantidad;
    
    public function __construct($pedido_numero, $detalle_alimento_id, $cantidad) {
        $this->pedido_numero = $pedido_numero;
        $this->detalle_alimento_id = $detalle_alimento_id;
        $this->cantidad = $cantidad;
    }

    public function getPedido_numero() {
        echo $this->pedido_numero;
    }

    public function getDetalle_alimento_id() {
        echo $this->detalle_alimento_id;
    }

    public function getCantidad() {
        echo $this->cantidad;
    }
}
