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
}
