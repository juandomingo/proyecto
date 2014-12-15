<?php

/**
 * Description of ResourceController
 *
 * @author Florencia
 */
class ResourceController {
 
    private static $instance;
    private static $arr = array(1);
    private static $type = '0';
    public $dias_vencimiento = '10'; 
    public $latitud = '-34.9211';
    public $longitud =  '-57.9544';
    public $clave_linkedin = '77hmwr84id5v3g';


    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();               
        }

        return self::$instance;
    }

    private function serializar($objects){
        $serialized = [];
        foreach ($objects as $object) {
            $serialized[] = $object->serializar();
        }
        return $serialized;
    }

    
    public function __construct() {
        $this->dias_vencimiento = ConfiguracionRepository::getInstance()->getValor('dias_vencimiento');
        $this->latitud = ConfiguracionRepository::getInstance()->getValor('latitud');
        $this->longitud =  ConfiguracionRepository::getInstance()->getValor('longitud');
        $this->clave_linkedin = ConfiguracionRepository::getInstance()->getValor('clave_linkedin');
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
            $pedidos = $this->serializar($pedidos);
            $view->show($pedidos);
        }
    }

    public function listAlimentos(){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $alimentos = AlimentoRepository::getInstance()->listAll();
            $alimentos = $this->serializar($alimentos);
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
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
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

    public function attemptEditAlimento($codigo){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $view = new AttemptEditAlimento();
            $alimento = AlimentoRepository::getInstance()->listAlimentoPorCodigo($codigo);
            $alimento = $this->serializar($alimento);
            $view->show($alimento[0]);
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
            $detalles_alimentos = $this->serializar($detalles_alimentos);
            $view->show($detalles_alimentos);
        }
    }
    public function addDetalleAlimento($alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            DetalleAlimentoRepository::getInstance()->addDetalleAlimento($alimento_codigo, $fecha_vencimiento, $contenido, $peso_unitario, $stock, $reservado);
            $this->listDetallesAlimentos();
        }
    }
    public function attemptEditDetalleAlimento($id){
        if( $this->check_auth($_SESSION['user']->getType(), array(1))){
            $view = new AttemptEditDetalleAlimento();
            $alimentos = AlimentoRepository::getInstance()->listAll();
            $alimentos = $this->serializar($alimentos);
            $detalleAlimento = DetalleAlimentoRepository::getInstance()->listAllporID($id);
            $detalleAlimento = $this->serializar($detalleAlimento);
            $view->show($detalleAlimento[0],$alimentos);
        }
    }
    public function attemptAddDetalleAlimento(){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $alimentos = AlimentoRepository::getInstance()->listAll();
            $alimentos = $this->serializar($alimentos);
            $view = new AttemptAddDetalleAlimento();
            $view-> show($alimentos);
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
            $donantes = $this->serializar($donantes);
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
    public function attemptEditDonante($id){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $donante = DonanteRepository::getInstance()->listAllById($id);
            $donante = $this->serializar($donante);
            $view = new AttemptEditDonante();
            $view->show($donante[0]);
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
            $entidades_receptoras = $this->serializar($entidades_receptoras);
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
            $entidad_receptora = EntidadReceptoraRepository::getInstance()->listPorId($id);
            $view = new AttemptEditEntidadReceptora();
            $entidad_receptora = $this->serializar($entidad_receptora);
            $view->show($entidad_receptora[0]);
        }
    }

    public function login(){
            $view = new Login();
            $view->show();
    }

    public function home(){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){     
            $turnos_entrega_hoy = TurnoEntregaRepository::getInstance()->listAllParaHoy();
            $alimentos = DetalleAlimentoRepository::getInstance()->listAlimentoPorVencerEn($this->dias_vencimiento);
            $entidades_receptoras = EntidadReceptoraRepository::getInstance()->listAll();
            $view = new Home();
            $entidades_receptoras = $this->serializar($entidades_receptoras);
            $alimentos = $this->serializar($alimentos);
            $turnos_entrega_hoy = $this->serializar($turnos_entrega_hoy);
            $view->show($alimentos,$turnos_entrega_hoy,$entidades_receptoras);
        }
    }

    public function addPedido($id_entidad_receptora,$hora,$fecha,$envio,$alimentos){
    #validame       
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){ 
            $turno_id = TurnoEntregaRepository::getInstance()->addTurnoEntrega( $fecha, $hora);
            $pedido_numero = PedidoRepository::getInstance()->createPedido($id_entidad_receptora,$turno_id,$envio);
            foreach ($alimentos as $alimento ) {
                AlimentoPedidoRepository::getInstance()->addAlimentoPedido($pedido_numero,$alimento,DetalleAlimentoRepository::getInstance()->listAllporID($alimento)[0]->getStock());
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
            $entidades_receptoras = $this->serializar($entidades_receptoras);
            $detalles_alimentos = $this->serializar($detalles_alimentos);
            $view = new AttemptAddPedido();
            $view->show($entidades_receptoras,$detalles_alimentos);
       }
    }

    public function attemptEditPedido($numero){
        if ($this->check_auth($_SESSION['user']->getType(), array(1)))
        {
            $entidades_receptoras = EntidadReceptoraRepository::getInstance()->listAll();
            $detalles_alimentos = $this->serializar(DetalleAlimentoRepository::getInstance()->listAll());
            $pedido = PedidoRepository::getInstance()->listPedidoByNumero($numero);
            $alimentos_pedidos = $pedido[0]->getAlimentosPedidos();
            $alimentos_pedidos = $this->serializar($alimentos_pedidos);
            $pedido = $this->serializar($pedido);
            $entidades_receptoras = $this->serializar($entidades_receptoras);
            $view = new AttemptEditPedido();
            $view->show($pedido[0],$entidades_receptoras,$alimentos_pedidos,$detalles_alimentos);
        }
    }
    public function modPedido($numero_pedido,$id_entidad_receptora,$fecha_ingreso_pedido,$fecha_entrega,$hora_entrega,$estado,$envio,$alimentos){
    #validame       
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){ 
            $pedido = PedidoRepository::getInstance()->listPedidoByNumero($numero_pedido);
            TurnoEntregaRepository::getInstance()->modTurnoEntrega($pedido[0]->getTurno_entrega_id(), $fecha_entrega, $hora_entrega);
            PedidoRepository::getInstance()->modPedido($numero_pedido,$id_entidad_receptora, $fecha_ingreso_pedido,$estado,$envio);
            AlimentoPedidoRepository::getInstance()->delAlimentosPedidosPor($numero_pedido);
            foreach ($alimentos as $alimento ) {
                AlimentoPedidoRepository::getInstance()->addAlimentoPedido($numero_pedido,DetalleAlimentoRepository::getInstance()->listAllporID($alimento)[0]->getID(),DetalleAlimentoRepository::getInstance()->listAllporID($alimento)[0]->getStock());
            }
            $this->listPedidos();
        }
    }

    public function entregasHoy($date)
    {
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){ 
            $pedidos = PedidoRepository::getInstance()->getPedidoDia($date);
            $directas = EntregaDirectaRepository::getInstance()->getEntregaDia($date);
            $start = strtotime(date("Y-m-d"));
            $end = strtotime($date);
            $between = ceil(abs($end - $start) / 86400);
            $pedidos = $this->serializar($pedidos);
            $directas = $this->serializar($directas);
            $view = new EntregaHoy();
            $view->show($pedidos,$directas, $between, [$this->latitud], [$this->longitud]);
        }
    }

    public function attemptAddEntregaDirecta($id)
    {
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $alimentos_por_vencer = DetalleAlimentoRepository::getInstance()->listAllporID($id);
            $entidades_receptoras = EntidadReceptoraRepository::getInstance()->listAll();
            $alimentos_por_vencer = $this->serializar($alimentos_por_vencer);
            $entidades_receptoras = $this->serializar($entidades_receptoras);
            $view = new AttemptAddEntregaDirecta();
            $view->show($alimentos_por_vencer, $entidades_receptoras);
        }
    }

    public function listEntregaDirecta()
    {   
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $entrega_directa = EntregaDirectaRepository::getInstance()->listAll();
            $entrega_directa = $this->serializar($entrega_directa);
            $view = new ABMEntregaDirecta();
            $view->show($entrega_directa);
        }
    }

    public function listAlimentosEntregaDirecta($id)
    {
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $alimentos_entrega_directa = AlimentoEntregaDirectaRepository::getInstance()->getAlimentoEntregaDirectaIdEntrega($id);
            $entrega_directa = EntregaDirectaRepository::getInstance()->getEntregaDirecta($id);
            $entrega_directa_serializado = $this->serializar($entrega_directa);
            $alimentos_entrega_directa = $this->serializar($alimentos_entrega_directa);
            $view = new ABMAlimentoEntregaDirecta();
            $view->show($entrega_directa_serializado, $alimentos_entrega_directa, $entrega_directa[0]->getEntidadReceptora()->getRazon_social());
        }
    }

    public function addAlimentoEntregaDirecta($detalle, $entidad_receptora, $entrega_directa_id)
    {   
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $detalle_alimento = DetalleAlimentoRepository::getInstance()->listAllporID($detalle);
            AlimentoEntregaDirectaRepository::getInstance()->addAlimentoEntregaDirecta($entrega_directa_id, $detalle, $detalle_alimento->getCantidad());
            $this->listAlimentosEntregaDirecta($entrega_directa_id);
        }
    }

    public function addEntregaDirecta($detalle, $entidad_receptora)
    {   
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $entrega = EntregaDirectaRepository::getInstance()->addEntregaDirecta($entidad_receptora, date("Y-m-d"));
            $detalle_alimento = DetalleAlimentoRepository::getInstance()->listAllporID($detalle);
            AlimentoEntregaDirectaRepository::getInstance()->addAlimentoEntregaDirecta($entrega, $detalle, $detalle_alimento->getStock());
            $this->listAlimentosEntregaDirecta($entrega);
        }
    }

    public function listMap()
    {
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $view = new ListMap();
            $view->show();
        }
    }

    public function cargarConfiguracion()
    {
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $this->dias_vencimiento  = ConfiguracionRepository::getInstance()->getValor('dias_vencimiento');
            $this->latitud = ConfiguracionRepository::getInstance()->getValor('latitud');
            $this->longitud  =  ConfiguracionRepository::getInstance()->getValor('longitud');
            $this->clave_linkedin = ConfiguracionRepository::getInstance()->getValor('clave_linkedin');
        }
    }

    public function listListadosYEstadisticas($dia_inicial, $dia_final)
    {
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $alimentos_pedidos_entre_dos_fechas = AlimentoPedidoRepository::getInstance()->getAlimentosTotalesPedidosEntreDosFechas($dia_inicial, $dia_final);
            $alimentos_por_entidad = EntidadReceptoraRepository::getInstance()->listAlimentosPorEntidadEntre($dia_inicial, $dia_final);
            $alimentos_vencidos_sin_entregar_entre_dos_fechas = AlimentoPedidoRepository::getInstance()->getAlimentosTotalesVencidosSinEntregarEntreDosFechas($dia_inicial, $dia_final);
            $alimentos_pedidos_entre_dos_fechas = $this->serializar($alimentos_pedidos_entre_dos_fechas);
            $alimentos_por_entidad = $this->serializar($alimentos_por_entidad);
            $alimentos_vencidos_sin_entregar_entre_dos_fechas = $this->serializar($alimentos_vencidos_sin_entregar_entre_dos_fechas);
            $view = new ListReportes();
            $view->show($alimentos_pedidos_entre_dos_fechas,$alimentos_por_entidad,$alimentos_vencidos_sin_entregar_entre_dos_fechas,$dia_inicial, $dia_final);
        }
    }

}

