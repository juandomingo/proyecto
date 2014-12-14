<?php



/**
 * Description of ReporteEntidades
 *
 * @author tino
 */
class ReporteEntidades {
    private $id;
    private $total_kilos;
    private $razon_social;
    
    public function __construct($id, $total_kilos, $razon_social) {
        $this->id = $id;
        $this->total_kilos = $total_kilos;
        $this->razon_social = $razon_social;
    }

    public function getId() {
        return $this->id;
    }

    public function getTotal_kilos() {
        return $this->total_kilos;
    }

    public function getRazon_social(){
        return $this->razon_social;
    }
}