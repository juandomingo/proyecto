<?php

/**
 * Description of Alimento
 *
 * @author Tino
 */
class AlimentoPedido {
    private $id;
    private $pedido_numero;
    private $detalle_alimento_id;
    private $cantidad;
    
    public function __construct($id,$pedido_numero, $detalle_alimento_id, $cantidad) {
        $this->id = $id;
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

    public function getId()
    {
        return $this->id;
    }
    public function getCantidad() {
        return $this->cantidad;
    }

    public function getDetalleAlimento()
    {
        $detalle = DetalleAlimentoRepository::getInstance()->listAllporID($this->detalle_alimento_id);
        return $detalle[0];
    }

    public function serializar()
    {
        $serialized = array(
                "id" => $this->id,
                "pedido_numero" => $this->pedido_numero,
                "detalle_alimento_id" => $this->detalle_alimento_id,
                "descripcion" => $this->getDetalleAlimento()->getAlimento()->getDescripcion(),
                "cantidad" => $this->cantidad,
            );
        return $serialized;
    }
}
