<?php

/**
 * Description of ResourceController
 *
 * @author Florencia
 */
class ResourceController {
    
    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    private function __construct() {
        
    }
    
    
    public function listResources(){
        $resources = ResourceRepository::getInstance()->listAll();
        $view = new SimpleResourceList();
        $view->show($resources);
    }

    public function listAlimentos(){
        $alimentos = AlimentoRepository::getInstance()->listAll();
        $view = new SimpleAlimentoList();
        $view->show($alimentos);
    }

    public function listDonantes(){
        $donantes = DonanteRepository::getInstance()->listAll();
        $view = new SimpleDonanteList();
        $view->show($donantes);
    }

    public function listEntidadesReceptoras(){
        $entidades_receptoras = EntidadReceptoraRepository::getInstance()->listAll();
        $view = new SimpleEntidadReceptoraList();
        $view->show($entidades_receptoras);
    }




    public function addAlimento($codigo,$descripcion){
        AlimentoRepository::getInstance()->addAlimento($codigo,$descripcion);
    }
    public function addDonante($id,$razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto){
        DonanteRepository::getInstance()->addDonante($id,$razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto);
    }
     public function addEntidadReceptora($id,$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id){
        EntidadReceptoraRepository::getInstance()->addEntidadReceptora($id,$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id);
    }

        public function modAlimento($codigo,$descripcion){
        AlimentoRepository::getInstance()->modAlimento($codigo,$descripcion);
    }
    public function modDonante($id,$razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto){
        DonanteRepository::getInstance()->modDonante($id,$razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto);
    }
     public function modEntidadReceptora($id,$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id){
        EntidadReceptoraRepository::getInstance()->modEntidadReceptora($id,$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id);
    }

        public function delAlimento($codigo){
        AlimentoRepository::getInstance()->delAlimento($codigo);
    }
    public function delDonante($id){
        DonanteRepository::getInstance()->delDonante($id);
    }
     public function delEntidadReceptora($id){
        EntidadReceptoraRepository::getInstance()->delEntidadReceptora($id);
    }

    
    public function home(){
        $view = new Home();
        $view->show();
    }
    
}
