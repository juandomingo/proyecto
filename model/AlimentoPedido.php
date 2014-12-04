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
        return $this->pedido_numero;
    }

    public function getDetalle_alimento_id() {
        return $this->detalle_alimento_id;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getDetalleAlimento()
    {
        $detalle = DetalleAlimentoRepository::getInstance()->listAllporID($this->detalle_alimento_id);
        return $detalle;
    }
}
