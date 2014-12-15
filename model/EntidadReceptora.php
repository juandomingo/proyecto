<?php



/**
 * Description of EntidadReceptora
 *
 * @author Florencia
 */
class EntidadReceptora {
    
    private $id;
    private $razon_social;
    private $telefono;
    private $domicilio;
    private $estado_entidad_id;
    private $necesidad_entidad_id;
    private $servicio_prestado_id;
    private $latitud;
    private $longitud;
    
    public function __construct($id, $razon_social, $telefono, $domicilio, $estado_entidad_id, $necesidad_entidad_id, $servicio_prestado_id, $latitud, $longitud){
        $this->id = $id;
        $this->razon_social = $razon_social;
        $this->telefono = $telefono;
        $this->domicilio = $domicilio;
        $this->estado_entidad_id = $estado_entidad_id;
        $this->necesidad_entidad_id = $necesidad_entidad_id;
        $this->servicio_prestado_id = $servicio_prestado_id;
        $this->latitud = $latitud;
        $this->longitud = $longitud;
    }

    public function getId() {
        return $this->id;
    }

    public function getRazon_social() {
        return $this->razon_social;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getDomicilio() {
        return $this->domicilio;
    }

    public function getEstado_entidad_id() {
        return $this->estado_entidad_id;
    }

    public function getNecesidad_entidad_id() {
        return $this->necesidad_entidad_id;
    }

    public function getServicio_prestado_id() {
        return $this->servicio_prestado_id;
    }

    public function getLatitud() {
        return $this->latitud;
    }

    public function getLongitud() {
        return $this->longitud;
    }

    public function getMapped_Estado_entidad_id() {
        switch ($this->estado_entidad_id) {
            case "1":
                return "alta";
                break;
            case "2":
                return "en trámite";
                break;
            case "3":
                return "suspendida";
                break;
            case "4":
                return "baja";
                break;
        }
    }

    public function getMappedNecesidad_entidad_id() {
        switch ($this->necesidad_entidad_id) {
            case "1":
                return "máxima";
                break;
            case "2":
                return "mediana";
                break;
            case "3":
                return "mínima";
                break;
        }
    }

    public function getMappedServicio_prestado_id() {
        switch ($this->servicio_prestado_id) {
            case "1":
                return "hogar de día";
                break;
            case "2":
                return "comedor infantil";
                break;
            case "3":
                return "hogar de adolescentes";
                break;
            case "4":
                return "jardín maternal";
                break;
        }

    }

    public function serializar()
    {
        $serialized = array(
                "id" => $this->id,
                "razon_social" => $this->razon_social,
                "telefono" => $this->telefono,
                "domicilio" => $this->domicilio,
                "estado_entidad_id" => $this->estado_entidad_id,
                "estado_entidad" => $this->getMapped_Estado_entidad_id(),
                "necesidad_entidad_id" => $this->necesidad_entidad_id,
                "necesidad_entidad" => $this->getMappedNecesidad_entidad_id(),
                "servicio_prestado_id" => $this->servicio_prestado_id,
                "servicio_prestado" => $this->getMappedServicio_prestado_id(),
                "latitud" => $this->latitud,
                "longitud" => $this->longitud,
            );
        return $serialized;
    }
}
