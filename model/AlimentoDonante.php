<?php

/**
 * Description of Alimento
 *
 * @author Tino
 */
class AlimentoDonante {
    
    private $detalle_alimento_id;
    private $donante_id;
    private $cantidad;
    
    public function __construct($detalle_alimento_id, $donante_id, $cantidad) {
        $this->detalle_alimento_id = $detalle_alimento_id
        $this->donante_id = $donante_id;
        $this->cantidad = $cantidad;
    }

    public function getDetalle_alimento_id() {
        return $this->detalle_alimento_id;
    }

    public function getDonante_id() {
        return $this->donante_id;
    }

    public function getCantidad() {
        return $this->cantidad;
    }
}
