<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

//We will require  every controller class
require_once('controller/ResourceController.php');
require_once('controller/UserController.php');

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



if (session_status() !== PHP_SESSION_ACTIVE)
	 {session_start();}

if(!isset($_SESSION['sess_user_id']) || (trim($_SESSION['sess_user_id']) == '')) {
	if(isset($_POST["action"]) && $_POST["action"] == 'login')
	{
    	UserController::getInstance()->login($_POST['name'],$_POST['password']);
    }
	elseif(isset($_GET["action"]) && $_GET["action"] == 'login')
	{
    	UserController::getInstance()->login1();
    }
    else{
    	ResourceController::getInstance()->login();
    }
}

elseif(!isset($_GET["action"]))
{
	ResourceController::getInstance()->home();
}

else{
	if( $_GET["action"] == 'logout'){
		UserController::getInstance()->logout();



	}elseif($_GET["action"] == 'addPedido'){
		$detalles_alimentos= [];
		foreach(array_slice($_GET, 5) as $name => $value) {
			$detalles_alimentos[] = $value;
		}
		ResourceController::getInstance()->addPedido($_GET["entidad"],$_GET["hora"],$_GET["dia"],$_GET["envio"],$detalles_alimentos);

	}elseif($_GET["action"] == 'attemptAddPedido'){
		ResourceController::getInstance()->attemptAddPedido();


	}elseif($_GET["action"] == 'listPedidos'){
		ResourceController::getInstance()->listPedidos();

	}elseif($_GET["action"] == 'listAlimentos'){
		ResourceController::getInstance()->listAlimentos();	
	}elseif( $_GET["action"] == 'delAlimento'){
		ResourceController::getInstance()->delAlimento($_GET["codigo"]);
	}elseif( $_GET["action"] == 'modAlimento'){
		ResourceController::getInstance()->modAlimento($_GET["codigo"],$_GET["descripcion"]);
	}elseif( $_GET["action"] == 'addAlimento'){
		ResourceController::getInstance()->addAlimento($_GET["codigo"],$_GET["descripcion"]);
	}elseif( $_GET["action"] == 'attemptAddAlimento'){
		ResourceController::getInstance()->attemptAddAlimento();	
	}elseif( $_GET["action"] == 'attemptEditAlimento'){
		ResourceController::getInstance()->attemptEditAlimento($_GET["codigo"],$_GET["descripcion"]);	

	}elseif($_GET["action"] == 'listDetallesAlimentos'){
		ResourceController::getInstance()->listDetallesAlimentos();
	}elseif( $_GET["action"] == 'delDetalleAlimento'){
		ResourceController::getInstance()->delDetalleAlimento($_GET["id"]);
	}elseif( $_GET["action"] == 'modDetalleAlimento'){
		ResourceController::getInstance()->modDetalleAlimento($_GET["id"],$_GET["alimento_codigo"],$_GET["fecha_vencimiento"],$_GET["contenido"],$_GET["peso_unitario"],$_GET["stock"],$_GET["reservado"]);
	}elseif( $_GET["action"] == 'addDetalleAlimento'){
		ResourceController::getInstance()->addDetalleAlimento($_GET["alimento_codigo"],$_GET["fecha_vencimiento"],$_GET["contenido"],$_GET["peso_unitario"],$_GET["stock"],$_GET["reservado"]);
	}elseif( $_GET["action"] == 'attemptAddDetalleAlimento'){
		ResourceController::getInstance()->attemptAddDetalleAlimento();	
	}elseif( $_GET["action"] == 'attemptEditDetalleAlimento'){
		ResourceController::getInstance()->attemptEditDetalleAlimento($_GET["id"],$_GET["alimento_codigo"],$_GET["fecha_vencimiento"],$_GET["contenido"],$_GET["peso_unitario"],$_GET["stock"],$_GET["reservado"]);	


	}elseif( $_GET["action"] == 'listEntidadesReceptoras'){
		ResourceController::getInstance()->listEntidadesReceptoras();
	}elseif( $_GET["action"] == 'delEntidadReceptora'){
		ResourceController::getInstance()->delEntidadReceptora($_GET["id"]);	
	}elseif( $_GET["action"] == 'modEntidadReceptora'){
		ResourceController::getInstance()->modEntidadReceptora($_GET["id"],$_GET["razon_social"],$_GET["telefono"],$_GET["domicilio"],$_GET["estado_entidad_id"],$_GET["necesidad_entidad_id"],$_GET["servicio_prestado_id"]);	
	}elseif( $_GET["action"] == 'addEntidadReceptora'){
		ResourceController::getInstance()->addEntidadReceptora($_GET["razon_social"],$_GET["telefono"],$_GET["domicilio"],$_GET["estado_entidad_id"],$_GET["necesidad_entidad_id"],$_GET["servicio_prestado_id"]);	
	}elseif( $_GET["action"] == 'attemptAddEntidadReceptora'){
		ResourceController::getInstance()->attemptAddEntidadReceptora();	
	}elseif( $_GET["action"] == 'attemptEditEntidadReceptora'){
		ResourceController::getInstance()->attemptEditEntidadReceptora($_GET["id"],$_GET["razon_social"],$_GET["telefono"],$_GET["domicilio"],$_GET["estado_entidad_id"],$_GET["necesidad_entidad_id"],$_GET["servicio_prestado_id"]);	


	}elseif( $_GET["action"] == 'listDonantes'){
		ResourceController::getInstance()->listDonantes();
	}elseif( $_GET["action"] == 'delDonante'){
		ResourceController::getInstance()->delDonante($_GET["id"]);
	}elseif( $_GET["action"] == 'modDonante'){
		ResourceController::getInstance()->modDonante($_GET["id"],$_GET["razon_social"],$_GET["apellido_contacto"],$_GET["nombre_contacto"],$_GET["telefono_contacto"],$_GET["mail_contacto"],$_GET["domicilio_contacto"]);
	}elseif( $_GET["action"] == 'addDonante'){
		ResourceController::getInstance()->addDonante($_GET["razon_social"],$_GET["apellido_contacto"],$_GET["nombre_contacto"],$_GET["telefono_contacto"],$_GET["mail_contacto"],$_GET["domicilio_contacto"]);
	}elseif( $_GET["action"] == 'attemptAddDonante'){
		ResourceController::getInstance()->attemptAddDonante();
	}elseif( $_GET["action"] == 'attemptEditDonante'){
		ResourceController::getInstance()->attemptEditDonante($_GET["id"],$_GET["razon_social"],$_GET["apellido_contacto"],$_GET["nombre_contacto"],$_GET["telefono_contacto"],$_GET["mail_contacto"],$_GET["domicilio_contacto"]);
	}
	elseif( $_GET["action"] == 'home'){
		ResourceController::getInstance()->home();
	}

	else{
	    ResourceController::getInstance()->home();
	}
}
