<?php

/**
 * Description of Alimento
 *
 * @author Tino
 */
class EntregaDirecta {
    
    private $id;
    private $entidad_receptora_id;
    private $fecha;
    
    public function __construct($id, $entidad_receptora_id, $fecha) {
        $this->id = $id
        $this->entidad_receptora_id = $entidad_receptora_id;
        $this->fecha = $fecha;
    }

    public function getID() {
        echo $this->id;
    }

    public function getEntidad_receptora_id() {
        echo $this->entidad_receptora_id;
    }

    public function getFecha() {
        echo $this->fecha;
    }
}
