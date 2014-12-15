<?php



/**
 * Description of Pedido
 *
 * @author Florencia
 */
class Pedido {
    
    private $numero;
    private $entidad_receptora_id;
    private $fecha_ingreso;
    private $estado_pedido_id;
    private $turno_entrega_id;
    private $con_envio;
    
    public function __construct($numero, $entidad_receptora_id, $fecha_ingreso, $estado_pedido_id, $turno_entrega_id, $con_envio){

        $this->numero = $numero;
        $this->entidad_receptora_id = $entidad_receptora_id;
        $this->fecha_ingreso = $fecha_ingreso;
        $this->estado_pedido_id = $estado_pedido_id;
        $this->turno_entrega_id = $turno_entrega_id;
        $this->con_envio = $con_envio;
    }

    public function getNumero() {
        return $this->numero;
    }
    public function getEntidad_receptora_id() {
        return $this->entidad_receptora_id;
    }
    public function getFecha_ingreso() {
        return $this->fecha_ingreso;
    }
    public function getEstado_pedido_id() {
        return $this->estado_pedido_id;
    }
    public function getTurno_entrega_id() {
        return $this->turno_entrega_id;
    }
    public function getCon_envio() {
        return $this->con_envio;
    }
    public function getTurnoEntrega(){
        $turno = TurnoEntregaRepository::getInstance()->listPorId($this->turno_entrega_id);
        return $turno[0];
    }
    public function getEntidadReceptora(){
        $entidad_recetora = EntidadReceptoraRepository::getInstance()->listPorId($this->entidad_receptora_id);
        return $entidad_recetora[0];
    }
    public function getEstado(){
        if ($this->estado_pedido_id == 0)
            {return "no entregado";}
        else
            {return "entregado";}
    }

    public function getAlimentosPedidos()
    {
        $detalles = AlimentoPedidoRepository::getInstance()->getAlimentosPedido($this->numero);
        return $detalles;
    }
    public function getEnvio(){
        if ($this->con_envio == 1)
            {return "Si";}
        else
            {return "No";}
    }

    public function serializar()
    {
        $serialized = array(
                "numero" => $this->numero,
                "entidad_receptora_id" => $this->entidad_receptora_id,
                "razon_social" => $this->getEntidadReceptora()->getRazon_social(),
                "fecha_ingreso" => $this->fecha_ingreso,
                "estado_pedido_id" => $this->estado_pedido_id,
                "estado" => $this->getEstado(),
                "hora_entrega" => $this->getTurnoEntrega()->getHora(),
                "fecha_entrega" => $this->getTurnoEntrega()->getFecha(),
                "turno_entrega_id" => $this->turno_entrega_id,
                "con_envio" => $this->con_envio,
                "envio" => $this->getEnvio(),
                "latitud" => $this->getEntidadReceptora()->getLatitud(),
                "longitud" => $this->getEntidadReceptora()->getLongitud(),
            );
        return $serialized;
    }
}
