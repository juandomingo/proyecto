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
    private $nombre;
    
    public function __construct($id, $clave, $valor, $nombre) {
        $this->id = $id;
        $this->clave = $clave;
        $this->valor = $valor;
        $this->nombre = $nombre;
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
    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function serializar()
    {
        $serialized = array(
                "id" => $this->id,
                "clave" => $this->clave,
                "valor" => $this->valor,
                "nombre" => $this->nombre,
            );
        return $serialized;
    }
}
