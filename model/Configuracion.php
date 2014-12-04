<?php

/**
 * Description of Alimento
 *
 * @author Tino
 */
class Configuracion {
    
    private $id;
    private $clave;
    private $valor;
    
    public function __construct($id, $clave, $valor) {
        $this->id = $id
        $this->clave = $clave;
        $this->valor = $valor;
    }

    public function getID() {
        return $this->id;
    }

    public function getClave() {
        return $this->clave;
    }

    public function getValor() {
        return $this->valor;
    }
}
