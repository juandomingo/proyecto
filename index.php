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
require_once('view/AttemptEditPedido.php');



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

switch ($_GET["action"]) {
		
		case 'logout':
				UserController::getInstance()->logout();
		break;

    case 'addPedido':
        $detalles_alimentos= [];
				foreach(array_slice($_GET, 5) as $name => $value) {
					$detalles_alimentos[] = $value;
				}
				ResourceController::getInstance()->addPedido($_GET["entidad"],$_GET["hora"],$_GET["dia"],$_GET["envio"],$detalles_alimentos);
    break;

    case "attemptAddPedido":
        ResourceController::getInstance()->attemptAddPedido();
    break;

    case "listAlimentos":
        ResourceController::getInstance()->listAlimentos();	
    break;

    case "delAlimento":
        ResourceController::getInstance()->delAlimento($_GET["codigo"]);
    break;

    case "modAlimento":
        ResourceController::getInstance()->modAlimento($_GET["codigo"],$_GET["descripcion"]);
    break;

    case "addAlimento":
        ResourceController::getInstance()->addAlimento($_GET["codigo"],$_GET["descripcion"]);
    break;

    case "attemptAddAlimento":
        ResourceController::getInstance()->attemptAddAlimento();
    break;

    case "attemptEditAlimento":
        ResourceController::getInstance()->attemptEditAlimento($_GET["codigo"],$_GET["descripcion"]);
    break;

    case "listPedidos":
        ResourceController::getInstance()->listPedidos();
    break;

    case "attemptEditPedido":
        ResourceController::getInstance()->attemptEditPedido($_GET["numero"]);
    break;

    case "modPedido":
        ResourceController::getInstance()->modPedido();
    break;

    case "listDetallesAlimentos":
        ResourceController::getInstance()->listDetallesAlimentos();
    break;

   	case "delDetalleAlimento":
    		ResourceController::getInstance()->delDetalleAlimento($_GET["id"]);
    break;

    case "modDetalleAlimento":
        ResourceController::getInstance()->modDetalleAlimento($_GET["id"],$_GET["alimento_codigo"],$_GET["fecha_vencimiento"],$_GET["contenido"],$_GET["peso_unitario"],$_GET["stock"],$_GET["reservado"]);
    break;

    case "addDetalleAlimento":
        ResourceController::getInstance()->addDetalleAlimento($_GET["alimento_codigo"],$_GET["fecha_vencimiento"],$_GET["contenido"],$_GET["peso_unitario"],$_GET["stock"],$_GET["reservado"]);
    break;

   	case "attemptAddDetalleAlimento":
    		ResourceController::getInstance()->attemptAddDetalleAlimento();	
    break;

    case "attemptEditDetalleAlimento":
        ResourceController::getInstance()->attemptEditDetalleAlimento($_GET["id"],$_GET["alimento_codigo"],$_GET["fecha_vencimiento"],$_GET["contenido"],$_GET["peso_unitario"],$_GET["stock"],$_GET["reservado"]);	
    break;

    case "listEntidadesReceptoras":
        ResourceController::getInstance()->listEntidadesReceptoras();
    break;

   	case "delEntidadReceptora":
    		ResourceController::getInstance()->delEntidadReceptora($_GET["id"]);
    break;

    case "modEntidadReceptora":
        ResourceController::getInstance()->modEntidadReceptora($_GET["id"],$_GET["razon_social"],$_GET["telefono"],$_GET["domicilio"],$_GET["estado_entidad_id"],$_GET["necesidad_entidad_id"],$_GET["servicio_prestado_id"]);	
    break;

    case "addEntidadReceptora":
    		ResourceController::getInstance()->addEntidadReceptora($_GET["razon_social"],$_GET["telefono"],$_GET["domicilio"],$_GET["estado_entidad_id"],$_GET["necesidad_entidad_id"],$_GET["servicio_prestado_id"]);	
    break;

    case "attemptAddEntidadReceptora":
    		ResourceController::getInstance()->attemptAddEntidadReceptora();	
    break;

    case "attemptEditEntidadReceptora":
    		ResourceController::getInstance()->attemptEditEntidadReceptora($_GET["id"],$_GET["razon_social"],$_GET["telefono"],$_GET["domicilio"],$_GET["estado_entidad_id"],$_GET["necesidad_entidad_id"],$_GET["servicio_prestado_id"]);		
    break;

    case "listDonantes":
    		ResourceController::getInstance()->listDonantes();	
    break;

    case "delDonante":
    		ResourceController::getInstance()->delDonante($_GET["id"]);
    break;

    case "modDonante":
    		ResourceController::getInstance()->modDonante($_GET["id"],$_GET["razon_social"],$_GET["apellido_contacto"],$_GET["nombre_contacto"],$_GET["telefono_contacto"],$_GET["mail_contacto"],$_GET["domicilio_contacto"]);
    break;

    case "addDonante":
    		ResourceController::getInstance()->addDonante($_GET["razon_social"],$_GET["apellido_contacto"],$_GET["nombre_contacto"],$_GET["telefono_contacto"],$_GET["mail_contacto"],$_GET["domicilio_contacto"]);
    break;

    case "delDonante":
    		ResourceController::getInstance()->delDonante($_GET["id"]);
    break;

    case "attemptAddDonante":
    		ResourceController::getInstance()->attemptAddDonante();
    break;

    case "attemptEditDonante":
    		ResourceController::getInstance()->attemptEditDonante($_GET["id"],$_GET["razon_social"],$_GET["apellido_contacto"],$_GET["nombre_contacto"],$_GET["telefono_contacto"],$_GET["mail_contacto"],$_GET["domicilio_contacto"]);
    break;


    default:
    		ResourceController::getInstance()->home();
    		echo "dfgdsghs";
	}
}
