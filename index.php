<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

//We will require every class from requires.php
require_once('requires.php');



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

    case 'delPedido':
        ResourceController::getInstance()->delPedido($_GET["numero"]);
    break;

    case 'modPedido':
        $detalles_alimentos= [];
                foreach(array_slice($_GET, 8) as $name => $value) {
                    $detalles_alimentos[] = $value;
                }
                ResourceController::getInstance()->modPedido($_GET["numero"],$_GET["entidad"],$_GET["ingreso"],$_GET["entrega"],$_GET["hora"],$_GET["estado"],$_GET["envio"],$detalles_alimentos);
    break;

    case "verPedido":

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
        ResourceController::getInstance()->attemptEditAlimento($_GET["codigo"]);
    break;

    case "listPedidos":
        ResourceController::getInstance()->listPedidos();
    break;

    case "attemptEditPedido":
        ResourceController::getInstance()->attemptEditPedido($_GET["numero"]);
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
        ResourceController::getInstance()->attemptEditDetalleAlimento($_GET["id"]);	
    break;

    case "listEntidadesReceptoras":
        ResourceController::getInstance()->listEntidadesReceptoras();
    break;

   	case "delEntidadReceptora":
    		ResourceController::getInstance()->delEntidadReceptora($_GET["id"]);
    break;

    case "modEntidadReceptora":
        ResourceController::getInstance()->modEntidadReceptora($_GET["id"],$_GET["razon_social"],$_GET["telefono"],$_GET["domicilio"],$_GET["estado_entidad_id"],$_GET["necesidad_entidad_id"],$_GET["servicio_prestado_id"],$_GET['latitud'],$_GET['longitud']);	
    break;

    case "addEntidadReceptora":
    		ResourceController::getInstance()->addEntidadReceptora($_GET["razon_social"],$_GET["telefono"],$_GET["domicilio"],$_GET["estado_entidad_id"],$_GET["necesidad_entidad_id"],$_GET["servicio_prestado_id"],$_GET['longitud'],$_GET['latitud']);	
    break;

    case "attemptAddEntidadReceptora":
    		ResourceController::getInstance()->attemptAddEntidadReceptora();	
    break;

    case "attemptEditEntidadReceptora":
    		ResourceController::getInstance()->attemptEditEntidadReceptora($_GET["id"]);		
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
    		ResourceController::getInstance()->attemptEditDonante($_GET["id"]);
    break;

    case "entregaHoy":
            ResourceController::getInstance()->entregasHoy($_GET["fecha"]);
    break;

    case "attemptAddEntregaDirecta":
            ResourceController::getInstance()->attemptAddEntregaDirecta($_GET["id"]);
    break;

    case "listEntregaDirecta":
            ResourceController::getInstance()->listEntregaDirecta();
    break;

    case "listAlimentosEntregaDirecta":
            ResourceController::getInstance()->listAlimentosEntregaDirecta($_GET["id"]);
    break;

    case "addEntregaDirecta":
             ResourceController::getInstance()->addEntregaDirecta($_GET["detalle"],$_GET["entidad"]);
    break;

    case "listMap":
            ResourceController::getInstance()->listMap();
    break;

    case "listUsuarios":
            UserController::getInstance()->listUsuarios();
    break;

    case "attemptEditUser":
            UserController::getInstance()->attemptEditUser($_GET['id']);
    break;

    case "attemptAddUser":
            UserController::getInstance()->attemptAddUser();
    break;

    case "addUser":
            UserController::getInstance()->addUser($_GET['name'],$_GET['password'],$_GET['type']);
    break;        

    case "modUser":
            UserController::getInstance()->modUser($_GET['id'],$_GET['name'],$_GET['password'],$_GET['type']);
    break;

    case "delUsuario":
            UserController::getInstance()->delUser($_GET['id']);
    break;

    case "listConfiguracion":
            ConfiguracionController::getInstance()->listConfiguraciones();
    break;

    case "attemptEditConfiguracion":
            ConfiguracionController::getInstance()->attemptEditConfiguracion($_GET['id']);
    break;

    case "listReportes":
            ResourceController::getInstance()->listListadosYEstadisticas($_GET['fecha_inicial'],$_GET['fecha_final']);
    break;

/*
    case "attemptAddConfiguracion":
            ConfiguracionController::getInstance()->attemptAddConfiguracion();
    break;

    case "addConfiguracion":
            ConfiguracionController::getInstance()->addConfiguracion($_GET['clave'],$_GET['valor'],$_GET['nombre']);
    break;  

    case "delConfiguracion":
            ConfiguracionController::getInstance()->delConfiguracion($_GET['id']);
    break;      
*/
    case "modConfiguracion":
            ConfiguracionController::getInstance()->modConfiguracion($_GET['id'],$_GET['valor'],$_GET['nombre']);
    break;


   
    default:
    		ResourceController::getInstance()->home();
	}
}
