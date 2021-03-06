<?php

/**
 * Description of Alimento
 *
 * @author Tino
 */
class TurnoEntrega {
    
    private $id;
    private $fecha;
    private $hora;
    
    public function __construct($id, $fecha, $hora) {
        $this->id = $id;
        $this->fecha = $fecha;
        $this->hora = $hora;
    }

    public function getID() {
        return $this->id;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getHora() {
        return $this->hora;
    }

    public function atrasado() {
        if (($this->hora) < (date("H:i:s")))
            {return "atrasado";}
        else
            {return "hay tiempo";}
    }

    public function getPedido()
    {
        $pedido = PedidoRepository::getInstance()->listPorTurnoEntrega($this->id);
        return $pedido[0];
    }

    public function serializar()
    {
        $serialized = array(
                "id" => $this->id,
                "fecha" => $this->fecha,
                "hora" => $this->hora,
                "atrasado" => $this->atrasado(),
                "numero" => $this->getPedido()->getNumero(),
                "razon_social" => $this->getPedido()->getEntidadReceptora()->getRazon_social(),
            );
        return $serialized;
    }
}