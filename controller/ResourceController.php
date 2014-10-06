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
    private function give_my_name()
    {
        return $_SESSION['sess_username'];
    }
    public function listAlimentos(){
        $alimentos = AlimentoRepository::getInstance()->listAll();
        $view = new ABMAlimentoList();
        
        $view->show($alimentos);
    }
    public function addAlimento($codigo,$descripcion){
        AlimentoRepository::getInstance()->addAlimento($codigo,$descripcion);
        $this->listAlimentos();
    }
      public function delAlimento($codigo){
        AlimentoRepository::getInstance()->delAlimento($codigo);
        $this->listAlimentos();
    }
    public function attemptAddAlimento(){
        $view = new AttemptAddAlimento();
        $view->show();
    }
        public function attemptEditAlimento($codigo,$descripcion){
        $view = new AttemptEditAlimento();
        $view->show([$codigo,$descripcion]);
    }
        public function modAlimento($codigo,$descripcion){
        AlimentoRepository::getInstance()->modAlimento($codigo,$descripcion);
        $this->listAlimentos();
    }

    public function listDetallesAlimentos(){
        $detalles_alimentos = DetalleAlimentoRepository::getInstance()->listAll();
        $view = new ABMDetalleAlimentoList();
        $view->show($detalles_alimentos);
    }
    public function addDetalleAlimento($alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado){
        DetalleAlimentoRepository::getInstance()->addDetalleAlimento($alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado);
        $this->listDetallesAlimentos();
    }
    public function attemptEditDetalleAlimento($id, $alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado){
        $view = new AttemptEditDetalleAlimento();
        $view->show([$id, $alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado]);
    }
    public function attemptAddDetalleAlimento(){
        $view = new AttemptAddDetalleAlimento();
        $view->show();
    }
    public function modDetalleAlimento($id, $alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado){
        DetalleAlimentoRepository::getInstance()->modDetalleAlimento($id, $alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado);
        $this->listDetallesAlimentos();
    }
    public function delDetalleAlimento($id){
        DetalleAlimentoRepository::getInstance()->delDetalleAlimento($id);
        $this->listDetallesAlimentos();
    }

    public function listDonantes(){
        $donantes = DonanteRepository::getInstance()->listAll();
        $view = new ABMDonanteList();
        $view->show($donantes);
    }
    public function addDonante($razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto){
        DonanteRepository::getInstance()->addDonante($razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto);
        $this->listDonantes();
    }
    public function attemptAddDonante(){
        $view = new AttemptAddDonante();
        $view->show();
    }
    public function attemptEditDonante($id,$razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto){
        $view = new AttemptEditDonante();
        $view->show([$id,$razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto]);
    }
    public function modDonante($id,$razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto){
        DonanteRepository::getInstance()->modDonante($id,$razon_social,$apellido_contacto,$nombre_contacto,$telefono_contacto,$mail_contacto,$domicilio_contacto);
        $this->listDonantes();
    }
    public function delDonante($id){
        DonanteRepository::getInstance()->delDonante($id);
        $this->listDonantes();
    }

    public function listEntidadesReceptoras(){
        $entidades_receptoras = EntidadReceptoraRepository::getInstance()->listAll();
        $view = new ABMEntidadReceptoraList();
        $view->show($entidades_receptoras);
    }
     public function addEntidadReceptora($razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id){
        EntidadReceptoraRepository::getInstance()->addEntidadReceptora($razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id);
        $this->listEntidadesReceptoras();
    }
    public function modEntidadReceptora($id,$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id){
        EntidadReceptoraRepository::getInstance()->modEntidadReceptora($id,$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id);
        $this->listEntidadesReceptoras();
    }
    public function delEntidadReceptora($id){
        EntidadReceptoraRepository::getInstance()->delEntidadReceptora($id);
        $this->listEntidadesReceptoras();
    }
    public function attemptAddEntidadReceptora(){
        $view = new AttemptAddEntidadReceptora();
        $view->show();
    }
    public function attemptEditEntidadReceptora($id,$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id){
        $view = new AttemptEditEntidadReceptora();
        $view->show([$id,$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id]);
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
