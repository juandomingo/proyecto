<?php

/**
 * Description of Alimento
 *
 * @author Tino
 */
class AlimentoEntregaDirecta {
    private $id;
    private $entrega_directa_id;
    private $detalle_alimento_id;
    private $cantidad;
    
    public function __construct($id,$entrega_directa_id, $detalle_alimento_id, $cantidad) {
        $this->entrega_directa_id = $entrega_directa_id;
        $this->detalle_alimento_id = $detalle_alimento_id;
        $this->cantidad = $cantidad;
    }

    public function getId()
    {return $this->$id;}
    
    public function getEntrega_directa_id() {
        return $this->entrega_directa_id;
    }

    public function getDetalle_alimento_id() {
        return $this->detalle_alimento_id;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getAlimento() {
        $detalle = DetalleAlimentoRepository::getInstance()->listAllporID($this->detalle_alimento_id);
        $alimento = AlimentoRepository::getInstance()->listAlimentoPorCodigo($detalle[0]->getAlimento_codigo());
        return $alimento;
    }

    public function serializar()
    {
        $serialized = array(
                "id" => $this->id,
                "entrega_directa_id" => $this->entrega_directa_id,
                "detalle_alimento_id" => $this->detalle_alimento_id,
                "descripcion" => $this->getAlimento()[0]->getDescripcion(),
                "cantidad" => $this->cantidad,
            );
        return $serialized;
    }
}
