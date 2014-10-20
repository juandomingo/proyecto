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
    
    public function __construct($id, $razon_social, $telefono, $domicilio, $estado_entidad_id, $necesidad_entidad_id, $servicio_prestado_id) {
        $this->id = $id;
        $this->razon_social = $razon_social;
        $this->telefono = $telefono;
        $this->domicilio = $domicilio;
        $this->estado_entidad_id = $estado_entidad_id;
        $this->necesidad_entidad_id = $necesidad_entidad_id;
        $this->servicio_prestado_id = $servicio_prestado_id;
    }

    public function getId() {
        echo $this->id;
    }

    public function getRazon_social() {
        echo $this->razon_social;
    }

    public function getTelefono() {
        echo $this->telefono;
    }

    public function getDomicilio() {
        echo $this->domicilio;
    }

    public function getEstado_entidad_id() {
        echo $this->estado_entidad_id;
    }

    public function getNecesidad_entidad_id() {
        echo $this->necesidad_entidad_id;
    }

    public function getServicio_prestado_id() {
        echo $this->servicio_prestado_id;
    }

    public function getMapped_Estado_entidad_id() {
        switch ($this->estado_entidad_id) {
            case "1":
                echo "alta";
                break;
            case "2":
                echo "en trámite";
                break;
            case "3":
                echo "suspendida";
                break;
            case "4":
                echo "baja";
                break;
        }
    }

    public function getMappedNecesidad_entidad_id() {
        switch ($this->servicio_prestado_id) {
            case "1":
                echo "máxima";
                break;
            case "2":
                echo "mediana";
                break;
            case "3":
                echo "mínima";
                break;
        }
    }

    public function getMappedServicio_prestado_id() {
        switch ($this->servicio_prestado_id) {
            case "1":
                echo "hogar de día";
                break;
            case "2":
                echo "comedor infantil";
                break;
            case "3":
                echo "hogar de adolescentes";
                break;
            case "4":
                echo "jardín maternal";
                break;
        }

    }
}
