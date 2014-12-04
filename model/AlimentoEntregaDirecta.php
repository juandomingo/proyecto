<?php

/**
 * Description of Alimento
 *
 * @author Tino
 */
class AlimentoEntregaDirecta {
    
    private $entrega_directa_id;
    private $detalle_alimento_id;
    private $cantidad;
    
    public function __construct($entrega_directa_id, $detalle_alimento_id, $cantidad) {
        $this->entrega_directa_id = $entrega_directa_id
        $this->detalle_alimento_id = $detalle_alimento_id;
        $this->cantidad = $cantidad;
    }

    public function getEntrega_directa_id() {
        return $this->entrega_directa_id;
    }

    public function getDetalle_alimento_id() {
        return $this->detalle_alimento_id;
    }

    public function getCantidad() {
        return $this->cantidad;
    }
}
