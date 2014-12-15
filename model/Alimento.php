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
        return $this->codigo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function serializar()
    {
        $serialized = array(
                "codigo" => $this->codigo,
                "descripcion" => $this->descripcion,
            );
        return $serialized;
    }
}
