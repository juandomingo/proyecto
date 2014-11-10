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
        echo $this->id;
    }

    public function getClave() {
        echo $this->clave;
    }

    public function getValor() {
        echo $this->valor;
    }
}
