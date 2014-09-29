<?php



/**
 * Description of Alimento
 *
 * @author Florencia
 */
class Alimento {
    
    private $codigo;
    private $descripcion;
    
    public function __construct($codigo, $descripcion) {
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
    }

    public function getCodigo() {
        echo $this->codigo;
    }

    public function getDescripcion() {
        echo $this->descripcion;
    }
}
