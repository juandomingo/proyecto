<?php

/**
 * Description of ResourceController
 *
 * @author Florencia
 */
class ResourceController {
    
    private static $instance;
    private static $arr = array(1);
    private static $type = 0;


    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    private function __construct() {
        
    }
    private function give_my_name()
    {
        return $_SESSION['sess_username'];
    }


    private function check_auth($type_, $arr_){
        
        if (in_array($type_, $arr_))
        {
            return true;
        }
        else
        {
            $view = new AuthFail();
            $view->show();
        }
    }

    public function listAlimentos(){
        if ($this->check_auth($_SESSION['user']->getType(), array(1, 2, 3))){
            $alimentos = AlimentoRepository::getInstance()->listAll();
            $view = new ABMAlimentoList();
            $view->show($alimentos);
        }
    }

    public function addAlimento($codigo,$descripcion){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            AlimentoRepository::getInstance()->addAlimento($codigo,$descripcion);
            $this->listAlimentos();
        }
    }

    public function delAlimento($codigo){
        if ($this->check_auth($_SESSION['user'], array(1))){
            AlimentoRepository::getInstance()->delAlimento($codigo);
            $this->listAlimentos();
        }
    }

    public function attemptAddAlimento(){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $view = new AttemptAddAlimento();
            $view->show();
        }
    }

    public function attemptEditAlimento($codigo,$descripcion){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $view = new AttemptEditAlimento();
            $view->show([$codigo,$descripcion]);
        }
    }

    public function modAlimento($codigo,$descripcion){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            AlimentoRepository::getInstance()->modAlimento($codigo,$descripcion);
            $this->listAlimentos();
        }
    }

    public function listDetallesAlimentos(){
        if ($this->check_auth($_SESSION['user']->getType(), array(1, 2))){
            $detalles_alimentos = DetalleAlimentoRepository::getInstance()->listAll();
            $view = new ABMDetalleAlimentoList();
            $view->show($detalles_alimentos);
        }
    }
    public function addDetalleAlimento($alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            DetalleAlimentoRepository::getInstance()->addDetalleAlimento($alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado);
            $this->listDetallesAlimentos();
        }
    }
    public function attemptEditDetalleAlimento($id, $alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado){
        if( $this->check_auth($_SESSION['user']->getType(), array(1))){
            $view = new AttemptEditDetalleAlimento();
            $view->show([$id, $alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado]);
        }
    }
    public function attemptAddDetalleAlimento(){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $view = new AttemptAddDetalleAlimento();
            $view->show();
        }
    }
    public function modDetalleAlimento($id, $alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){ 
            DetalleAlimentoRepository::getInstance()->modDetalleAlimento($id, $alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado);
            $this->listDetallesAlimentos();
        }
    }
    public function delDetalleAlimento($id){
        if($this->check_auth($_SESSION['user']->getType(), array(1))){
            DetalleAlimentoRepository::getInstance()->delDetalleAlimento($id);
            $this->listDetallesAlimentos();
        }
    }

    public function listDonantes(){
        if($this->check_auth($_SESSION['user']->getType(), array(1))){
            $donantes = DonanteRepository::getInstance()->listAll();
            $view = new ABMDonanteList();
            $view->show($donantes);
        }
    }
    public function addDonante($razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto){
        if($this->check_auth($_SESSION['user']->getType(), array(1))){
            DonanteRepository::getInstance()->addDonante($razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto);
            $this->listDonantes();
        }
    }
    public function attemptAddDonante(){
        if($this->check_auth($_SESSION['user']->getType(), array(1))){
            $view = new AttemptAddDonante();
            $view->show();
        }
    }
    public function attemptEditDonante($id,$razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $view = new AttemptEditDonante();
            $view->show([$id,$razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto]);
        }
    }
    public function modDonante($id,$razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            DonanteRepository::getInstance()->modDonante($id,$razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto);
            $this->listDonantes();
        }
    }
    public function delDonante($id){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){ 
            DonanteRepository::getInstance()->delDonante($id);
            $this->listDonantes();
        }
    }

    public function listEntidadesReceptoras(){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $entidades_receptoras = EntidadReceptoraRepository::getInstance()->listAll();
            $view = new ABMEntidadReceptoraList();
            $view->show($entidades_receptoras);
        }
    }

    public function addEntidadReceptora($razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            EntidadReceptoraRepository::getInstance()->addEntidadReceptora($razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id);
            $this->listEntidadesReceptoras();
        }
    }

    public function modEntidadReceptora($id,$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            EntidadReceptoraRepository::getInstance()->modEntidadReceptora($id,$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id);
            $this->listEntidadesReceptoras();
        }
    }

    public function delEntidadReceptora($id){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            EntidadReceptoraRepository::getInstance()->delEntidadReceptora($id);
            $this->listEntidadesReceptoras();
        }
    }

    public function attemptAddEntidadReceptora(){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $view = new AttemptAddEntidadReceptora();
            $view->show();
       }
    }
    public function attemptEditEntidadReceptora($id,$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $view = new AttemptEditEntidadReceptora();
            $view->show([$id,$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id]);
        }
    }

    public function login(){
            $view = new Login();
            $view->show();
    }

    public function home(){
            $view = new Home();
            $view->show([$_SESSION['user']-> getName()]);
    }
}
