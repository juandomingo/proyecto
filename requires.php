<?php
require_once('controller/ResourceController.php');
require_once('controller/UserController.php');
require_once('controller/ConfiguracionController.php');


//We will require  every model class
require_once('model/PDORepository.php');
require_once('model/Alimento.php');
require_once('model/AlimentoRepository.php');
require_once('model/User.php');
require_once('model/UserRepository.php');
require_once('model/DetalleAlimento.php');
require_once('model/DetalleAlimentoRepository.php');
require_once('model/Donante.php');
require_once('model/DonanteRepository.php');
require_once('model/EntidadReceptora.php');
require_once('model/EntidadReceptoraRepository.php');
require_once('model/Pedido.php');
require_once('model/PedidoRepository.php');
require_once('model/TurnoEntrega.php');
require_once('model/TurnoEntregaRepository.php');
require_once('model/AlimentoPedido.php');
require_once('model/AlimentoPedidoRepository.php');
require_once('model/AlimentoEntregaDirecta.php');
require_once('model/AlimentoEntregaDirectaRepository.php');
require_once('model/EntregaDirecta.php');
require_once('model/EntregaDirectaRepository.php');
require_once('model/LinkedInRepository.php');
require_once('model/Configuracion.php');
require_once('model/ConfiguracionRepository.php');

//We will require  every view class
require_once('view/TwigView.php');
require_once('view/SimpleResourceList.php');
require_once('view/SimpleAlimentoList.php');
require_once('view/SimpleDetalleAlimentoList.php');
require_once('view/AttemptAddEntidadReceptora.php');
require_once('view/AttemptEditEntidadReceptora.php');
require_once('view/AttemptAddDetalleAlimento.php');
require_once('view/AttemptEditDetalleAlimento.php');
require_once('view/AttemptAddDonante.php');
require_once('view/AttemptEditDonante.php');
require_once('view/AttemptAddAlimento.php');
require_once('view/AttemptEditAlimento.php');
require_once('view/ABMAlimentoList.php');
require_once('view/ABMDonanteList.php');
require_once('view/ABMDetalleAlimentoList.php');
require_once('view/ABMEntidadReceptora.php');
require_once('view/ABMPedidoList.php');
require_once('view/SimpleDonanteList.php');
require_once('view/SimpleEntidadReceptoraList.php');
require_once('view/Login.php');
require_once('view/Login1.php');
require_once('view/Home.php');
require_once('view/AuthFail.php');
require_once('view/AttemptAddPedido.php');
require_once('view/ListPedido.php');
require_once('view/AttemptEditPedido.php');
require_once('view/EntregaHoy.php');
require_once('view/EntregaYa.php');
require_once('view/AttemptAddEntregaDirecta.php');
require_once('view/ABMEntregaDirecta.php');
require_once('view/ABMAlimentoEntregaDirecta.php');
require_once('view/ListMap.php');
require_once('view/ABMUsuarioList.php');
require_once('view/AttemptEditUser.php');
require_once('view/AttemptAddUser.php');
require_once('view/ABMConfiguracion.php');
require_once('view/AttemptEditConfiguracion.php');
require_once('view/AttemptAddConfiguracion.php');

