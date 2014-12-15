<?php



/**
 * Description of AlimentoDisponible
 *
 * @author Tino
 */
class AlimentoDisponible {
    
    private $codigo;
    private $descripcion;
    private $contenido;
    private $actual;
    private $disponible;
    private $detalle_alimento_id;
    
    public function __construct($detalle_alimento_id,$codigo, $descripcion, $contenido, $actual, $disponible) {
        $this->detalle_alimento_id = $detalle_alimento_id;
        $this->codigo = $codigo;
        $this->contenido = $contenido;
        $this->actual = $actual;
        $this->disponible = $disponible;
        $this->detalle_alimento_id = $detalle_alimento_id;
    }

    public function getDetalle_alimento_id() {
        return $this->detalle_alimento_id;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getActual() {
        return $this->actual;
    }

    public function getDisponible() {
        return $this->disponible;
    }

    public function getDetalle_alimento_id() {
        return $this->detalle_alimento_id;
    }

    public function serializar()
    {
        $serialized = array(
                "codigo" => $this->codigo,
                "descripcion" => $this->descripcion,
                "contenido" => $this->contenido,
                "actual" => $this->actual,
                "disponible" => $this->disponible,
                "detalle_alimento_id" => $this->detalle_alimento_id,
            );
        return $serialized;
    }   
}


/*
SELECT `alimento`.codigo as codigo, `alimento`.descripcion as descripcion, `detalle_alimento`.contenido as contenido ,IFNULL(t2.cantidad,0) as actual ,(`detalle_alimento`.stock - `detalle_alimento`.reservado + IFNULL(t2.cantidad,0)) as disponible, `detalle_alimento`.id as detalle_alimento_id
from `detalle_alimento` 
LEFT JOIN
(
SELECT `alimento_pedido`.detalle_alimento_id as detalle_alimento_id, `alimento_pedido`.cantidad as cantidad
FROM `alimento_pedido`
where `alimento_pedido`.pedido_numero = 20
) as t2
ON t2.detalle_alimento_id = `detalle_alimento`.id
inner join alimento
on `alimento`.codigo = `detalle_alimento`.alimento_codigo
*/