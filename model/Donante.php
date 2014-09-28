<?php



/**
 * Description of Donante
 *
 * @author Florencia
 */
class Donante {
    
    private $id;
    private $razon_social;
    private $apellido_contacto;
    private $nombre_contacto;
    private $telefono_contacto;
    private $mail_contacto;
    private $domicilio_contacto;
    
    public function __construct($id, $razon_social, $apellido_contacto, $nombre_contacto, $telefono_contacto, $mail_contacto, $domicilio_contacto) {
        $this->id = $id;
        $this->razon_social = $razon_social;
        $this->apellido_contacto = $apellido_contacto;
        $this->nombre_contacto = $nombre_contacto;
        $this->telefono_contacto = $telefono_contacto;
        $this->mail_contacto = $mail_contacto;
        $this->domicilio_contacto = $domicilio_contacto;
    }

    public function getId() {
        echo $this->id;
    }

    public function getRazon_social() {
        echo $this->razon_social;
    }

    public function getApellido_contacto() {
        echo $this->apellido_contacto;
    }

    public function getNombre_contacto() {
        echo $this->nombre_contacto;
    }

    public function getTelefono_contacto() {
        echo $this->telefono_contacto;
    }

    public function getMail_contacto() {
        echo $this->mail_contacto;
    }

    public function getDomicilio_contacto() {
        echo $this->domicilio_contacto;
    }
}
