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
    public $configuraciones = array('dias_vencimiento' => 100 ); 


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

    public function listPedidos(){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $pedidos = PedidoRepository::getInstance()->listAll();
            $view = new ABMPedidoList();
            $view->show($pedidos);
        }
    }

    public function listAlimentos(){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
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
            $alimentos = AlimentoRepository::getInstance()->listAll();
            $view = new AttemptAddDetalleAlimento();
            $view->show($alimentos);
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

    public function addEntidadReceptora($razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id,$longitud,$latitud){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            EntidadReceptoraRepository::getInstance()->addEntidadReceptora($razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id,$longitud,$latitud);
            $this->listEntidadesReceptoras();
        }
    }

    public function modEntidadReceptora($id,$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id,$latitud,$longitud){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            EntidadReceptoraRepository::getInstance()->modEntidadReceptora($id,$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id,$latitud,$longitud);
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
    public function attemptEditEntidadReceptora($id){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $view = new AttemptEditEntidadReceptora();
            $view->show([$id,$razon_social,$telefono,$domicilio,$estado_entidad_id,$necesidad_entidad_id,$servicio_prestado_id]);
        }
    }

    public function login(){
            //$datos = LinkedInRepository::getInstance()->getData();
            //echo $datos;
            $view = new Login();
            $view->show();
    }

    public function home(){
            $turnos_entrega_hoy = TurnoEntregaRepository::getInstance()->listAllParaHoy();
            $alimentos = DetalleAlimentoRepository::getInstance()->listAlimentoPorVencerEn($this->configuraciones['dias_vencimiento']);
            $entidades_receptoras = EntidadReceptoraRepository::getInstance()->listAll();
            $view = new Home();
            $view->show($alimentos,$turnos_entrega_hoy,$entidades_receptoras);
    }

    public function addPedido($id_entidad_receptora,$hora,$fecha,$envio,$alimentos){
    #validame       
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){ 
            $turno_id = TurnoEntregaRepository::getInstance()->addTurnoEntrega( $fecha, $hora);
            $pedido_numero = PedidoRepository::getInstance()->createPedido($id_entidad_receptora,$turno_id,$envio);
            foreach ($alimentos as $alimento ) {
                AlimentoPedidoRepository::getInstance()->addAlimentoPedido($pedido_numero,$alimento,DetalleAlimentoRepository::getInstance()->listAllporID($alimento)->getStock());
            }
            $this->listPedidos();
        }
    }

    public function delPedido($numero)
    {
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            AlimentoPedidoRepository::getInstance()->delAlimentosPedidosPor($numero);
            PedidoRepository::getInstance()->delPedido($numero);
            
            $this->listPedidos();

        }   
    }

    public function attemptAddPedido(){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $entidades_receptoras = EntidadReceptoraRepository::getInstance()->listAll();
            $detalles_alimentos = DetalleAlimentoRepository::getInstance()->listAll();
            $view = new AttemptAddPedido();
            $view->show($entidades_receptoras,$detalles_alimentos);
       }
    }

    public function attemptEditPedido($numero){
        if ($this->check_auth($_SESSION['user']->getType(), array(1)))
        {
            $entidades_receptoras = EntidadReceptoraRepository::getInstance()->listAll();
            $pedido = PedidoRepository::getInstance()->listPedidoByNumero($numero);
            $view = new AttemptEditPedido();
            $view->show($pedido[0],$entidades_receptoras );
        }
    }
    public function modPedido($numero_pedido,$id_entidad_receptora,$fecha_ingreso_pedido,$fecha_entrega,$hora_entrega,$estado,$envio,$alimentos){
    #validame       
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){ 
            $pedido = PedidoRepository::getInstance()->listPedidoByNumero($numero_pedido);
            TurnoEntregaRepository::getInstance()->modTurnoEntrega($pedido[0]->getTurno_entrega_id(), $fecha_entrega, $hora_entrega);
            PedidoRepository::getInstance()->modPedido($numero_pedido,$id_entidad_receptora,$estado,$envio);
            AlimentoPedidoRepository::getInstance()->delAlimentosPedidosPor($numero_pedido);
            foreach ($alimentos as $alimento ) {
                AlimentoPedidoRepository::getInstance()->addAlimentoPedido($numero_pedido,DetalleAlimentoRepository::getInstance()->listAllporID($alimento)->getID(),DetalleAlimentoRepository::getInstance()->listAllporID($alimento)->getStock());
            }
            $this->listPedidos();
        }
    }

    public function entregasHoy($date)
    {
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){ 
            $pedidos = PedidoRepository::getInstance()->getPedidoDia($date);
            $directas = EntregaDirectaRepository::getInstance()->getEntregaDia($date);
            $view = new EntregaHoy();

            $view->show($pedidos,$directas, date("Y-m-d"));
        }
    }

    public function attemptAddEntregaDirecta($id)
    {
        $alimentos_por_vencer = DetalleAlimentoRepository::getInstance()->listAllporID($id);
        $entidades_receptoras = EntidadReceptoraRepository::getInstance()->listAll();
        $view = new AttemptAddEntregaDirecta();
        $view->show($alimentos_por_vencer, $entidades_receptoras);
    }

    public function listEntregaDirecta()
    {
        $entrega_directa = EntregaDirectaRepository::getInstance()->listAll();
        $view = new ABMEntregaDirecta();
        $view->show($entrega_directa);
    }

    public function listAlimentosEntregaDirecta($id)
    {
        $alimentos_entrega_directa = AlimentoEntregaDirectaRepository::getInstance()->getAlimentoEntregaDirectaIdEntrega($id);
        $entrega_directa = EntregaDirectaRepository::getInstance()->getEntregaDirecta($id);
        $view = new ABMAlimentoEntregaDirecta();
        $view->show($entrega_directa, $alimentos_entrega_directa, $entrega_directa[0]->getEntidadReceptora()->getRazon_social());
    
    }

    public function addAlimentoEntregaDirecta($detalle, $entidad_receptora, $entrega_directa_id)
    {   $detalle_alimento = DetalleAlimentoRepository::getInstance()->listAllporID($detalle);
        AlimentoEntregaDirectaRepository::getInstance()->addAlimentoEntregaDirecta($entrega_directa_id, $detalle, $detalle_alimento->getCantidad());
        $this->listAlimentosEntregaDirecta($entrega_directa_id);
    }

    public function addEntregaDirecta($detalle, $entidad_receptora)
    {   $entrega = EntregaDirectaRepository::getInstance()->addEntregaDirecta($entidad_receptora, date("Y-m-d"));
        $detalle_alimento = DetalleAlimentoRepository::getInstance()->listAllporID($detalle);
        AlimentoEntregaDirectaRepository::getInstance()->addAlimentoEntregaDirecta($entrega, $detalle, $detalle_alimento->getStock());
        $this->listAlimentosEntregaDirecta($entrega);
    }

    public function listMap()
    {
        $view = new ListMap();
        $view->show();
    }

}

