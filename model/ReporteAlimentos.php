<?php



/**
 * Description of ReporteAlimentos
 *
 * @author Tino
 */
class ReporteAlimentos{
    
    private $codigo;
    private $descripcion;
    private $cantidad;
    
    public function __construct($codigo, $descripcion, $cantidad) {
        $this->codigo = $codigo;
        $this->descripcion = $descripcion;
        $this->cantidad = $cantidad;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getCantidad() {
        return $this->cantidad;
    }
    public function serializar()
    {
        $serialized = array(
                "codigo" => $this->codigo,
                "descripcion" => $this->descripcion,
                "cantidad" => $this->cantidad,
            );
        return $serialized;
    }
}
