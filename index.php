<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

require_once('controller/ResourceController.php');
require_once('controller/UserController.php');

require_once('model/PDORepository.php');
require_once('model/ResourceRepository.php');
require_once('model/Resource.php');

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
require_once('view/SimpleDonanteList.php');
require_once('view/SimpleEntidadReceptoraList.php');
require_once('view/Login.php');
require_once('view/Login1.php');
require_once('view/Home.php');


session_start();

if(isset($_POST["action"]) && $_POST["action"] == 'login'){
    UserController::getInstance()->login($_POST['name'],$_POST['password']);
}
if(isset($_GET["action"]) && $_GET["action"] == 'login'){
    UserController::getInstance()->login1();
}
else
{
//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset($_SESSION['sess_user_id']) || (trim($_SESSION['sess_user_id']) == '')) {
	ResourceController::getInstance()->login();;
	exit();
;}
else {

}

if(isset($_POST["action"]) && $_POST["action"] == 'login'){
    UserController::getInstance()->login($_POST['username'],$_POST['password']);

}elseif(isset($_GET["action"]) && $_GET["action"] == 'listAlimentos'){
	ResourceController::getInstance()->listAlimentos();
}elseif(isset($_GET["action"]) && $_GET["action"] == 'listDetallesAlimentos'){
	ResourceController::getInstance()->listDetallesAlimentos();
}elseif(isset($_GET["action"]) && $_GET["action"] == 'listDonantes'){
	ResourceController::getInstance()->listDonantes();


}elseif(isset($_GET["action"]) && $_GET["action"] == 'delAlimento'){
	ResourceController::getInstance()->delAlimento($_GET["codigo"]);
}elseif(isset($_GET["action"]) && $_GET["action"] == 'modAlimento'){
	ResourceController::getInstance()->modAlimento($_GET["codigo"],$_GET["descripcion"]);
}elseif(isset($_GET["action"]) && $_GET["action"] == 'addAlimento'){
	ResourceController::getInstance()->addAlimento($_GET["codigo"],$_GET["descripcion"]);
}elseif(isset($_GET["action"]) && $_GET["action"] == 'attemptAddAlimento'){
	ResourceController::getInstance()->attemptAddAlimento();	
}elseif(isset($_GET["action"]) && $_GET["action"] == 'attemptEditAlimento'){
	ResourceController::getInstance()->attemptEditAlimento($_GET["codigo"],$_GET["descripcion"]);	


}elseif(isset($_GET["action"]) && $_GET["action"] == 'delDetalleAlimento'){
	ResourceController::getInstance()->delDetalleAlimento($_GET["id"]);
}elseif(isset($_GET["action"]) && $_GET["action"] == 'modDetalleAlimento'){
	ResourceController::getInstance()->modDetalleAlimento($_GET["id"],$_GET["alimento_codigo"],$_GET["fecha_vencimiento"],$_GET["contenido"],$_GET["peso_unitario"],$_GET["stock"],$_GET["reservado"]);
}elseif(isset($_GET["action"]) && $_GET["action"] == 'addDetalleAlimento'){
	ResourceController::getInstance()->addDetalleAlimento($_GET["alimento_codigo"],$_GET["fecha_vencimiento"],$_GET["contenido"],$_GET["peso_unitario"],$_GET["stock"],$_GET["reservado"]);
}elseif(isset($_GET["action"]) && $_GET["action"] == 'attemptAddDetalleAlimento'){
	ResourceController::getInstance()->attemptAddDetalleAlimento();	
}elseif(isset($_GET["action"]) && $_GET["action"] == 'attemptEditDetalleAlimento'){
	ResourceController::getInstance()->attemptEditDetalleAlimento($_GET["id"],$_GET["alimento_codigo"],$_GET["fecha_vencimiento"],$_GET["contenido"],$_GET["peso_unitario"],$_GET["stock"],$_GET["reservado"]);	


}elseif(isset($_GET["action"]) && $_GET["action"] == 'listEntidadesReceptoras'){
	ResourceController::getInstance()->listEntidadesReceptoras();
}elseif(isset($_GET["action"]) && $_GET["action"] == 'delEntidadReceptora'){
	ResourceController::getInstance()->delEntidadReceptora($_GET["id"]);	
}elseif(isset($_GET["action"]) && $_GET["action"] == 'modEntidadReceptora'){
	ResourceController::getInstance()->modEntidadReceptora($_GET["id"],$_GET["razon_social"],$_GET["telefono"],$_GET["domicilio"],$_GET["estado_entidad_id"],$_GET["necesidad_entidad_id"],$_GET["servicio_prestado_id"]);	
}elseif(isset($_GET["action"]) && $_GET["action"] == 'addEntidadReceptora'){
	ResourceController::getInstance()->addEntidadReceptora($_GET["razon_social"],$_GET["telefono"],$_GET["domicilio"],$_GET["estado_entidad_id"],$_GET["necesidad_entidad_id"],$_GET["servicio_prestado_id"]);	
}elseif(isset($_GET["action"]) && $_GET["action"] == 'attemptAddEntidadReceptora'){
	ResourceController::getInstance()->attemptAddEntidadReceptora();	
}elseif(isset($_GET["action"]) && $_GET["action"] == 'attemptEditEntidadReceptora'){
	ResourceController::getInstance()->attemptEditEntidadReceptora($_GET["id"],$_GET["razon_social"],$_GET["telefono"],$_GET["domicilio"],$_GET["estado_entidad_id"],$_GET["necesidad_entidad_id"],$_GET["servicio_prestado_id"]);	


}elseif(isset($_GET["action"]) && $_GET["action"] == 'listDonantes'){
	ResourceController::getInstance()->listDonantes();
}elseif(isset($_GET["action"]) && $_GET["action"] == 'delDonante'){
	ResourceController::getInstance()->delDonante($_GET["id"]);
}elseif(isset($_GET["action"]) && $_GET["action"] == 'modDonante'){
	ResourceController::getInstance()->modDonante($_GET["id"],$_GET["razon_social"],$_GET["apellido_contacto"],$_GET["nombre_contacto"],$_GET["telefono_contacto"],$_GET["mail_contacto"],$_GET["domicilio_contacto"]);
}elseif(isset($_GET["action"]) && $_GET["action"] == 'addDonante'){
	ResourceController::getInstance()->addDonante($_GET["razon_social"],$_GET["apellido_contacto"],$_GET["nombre_contacto"],$_GET["telefono_contacto"],$_GET["mail_contacto"],$_GET["domicilio_contacto"]);
}elseif(isset($_GET["action"]) && $_GET["action"] == 'attemptAddDonante'){
	ResourceController::getInstance()->attemptAddDonante();
}elseif(isset($_GET["action"]) && $_GET["action"] == 'attemptEditDonante'){
	ResourceController::getInstance()->attemptEditDonante($_GET["id"],$_GET["razon_social"],$_GET["apellido_contacto"],$_GET["nombre_contacto"],$_GET["telefono_contacto"],$_GET["mail_contacto"],$_GET["domicilio_contacto"]);
}elseif(isset($_GET["action"]) && $_GET["action"] == 'logout'){
	UserController::getInstance()->logout();

}else{
    ResourceController::getInstance()->home();
}
}
//http://localhost/twig/?action=addEntidadReceptora&id=8&razon_social=Copergar&telefono=4224225&domicilio=Holis&estado_entidad_id=55&necesidad_entidad_id=55&servicio_prestado_id=117