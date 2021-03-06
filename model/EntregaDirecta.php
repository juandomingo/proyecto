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
        $this->id = $id;
        $this->entidad_receptora_id = $entidad_receptora_id;
        $this->fecha = $fecha;
    }

    public function getID() {
        return $this->id;
    }

    public function getEntidad_receptora_id() {
        return $this->entidad_receptora_id;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getEntidadReceptora()
    {
        $result = EntidadReceptoraRepository::getInstance()->listPorId($this->entidad_receptora_id);
        return $result;
    }

    public function serializar()
    {
        $serialized = array(
                "id" => $this->id,
                "entidad_receptora_id" => $this->entidad_receptora_id,
                "fecha" => $this->fecha,
                "razon_social" => $this->getEntidadReceptora()[0]->getRazon_social(),
                "latitud" => $this->getEntidadReceptora()[0]->getLatitud(),
                "longitud" => $this->getEntidadReceptora()[0]->getLongitud(),

            );
        return $serialized;
    }
}
