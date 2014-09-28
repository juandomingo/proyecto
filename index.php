<?php
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

require_once('controller/ResourceController.php');

require_once('model/PDORepository.php');
require_once('model/ResourceRepository.php');
require_once('model/Resource.php');

require_once('model/Alimento.php');
require_once('model/AlimentoRepository.php');

require_once('model/Donante.php');
require_once('model/DonanteRepository.php');

require_once('model/EntidadReceptora.php');
require_once('model/EntidadReceptoraRepository.php');

require_once('view/TwigView.php');
require_once('view/SimpleResourceList.php');
require_once('view/SimpleAlimentoList.php');
require_once('view/SimpleDonanteList.php');
require_once('view/SimpleEntidadReceptoraList.php');
require_once('view/Home.php');



if(isset($_GET["action"]) && $_GET["action"] == 'listResources'){
    ResourceController::getInstance()->listResources();

}elseif(isset($_GET["action"]) && $_GET["action"] == 'listAlimentos'){
	ResourceController::getInstance()->listAlimentos();
}elseif(isset($_GET["action"]) && $_GET["action"] == 'listDonantes'){
	ResourceController::getInstance()->listDonantes();
}elseif(isset($_GET["action"]) && $_GET["action"] == 'listEntidadesReceptoras'){
	ResourceController::getInstance()->listEntidadesReceptoras();

}elseif(isset($_GET["action"]) && $_GET["action"] == 'addAlimento'){
	ResourceController::getInstance()->addAlimento($_GET["codigo"],$_GET["descripcion"]);
}elseif(isset($_GET["action"]) && $_GET["action"] == 'addEntidadReceptora'){
	ResourceController::getInstance()->addEntidadReceptora($_GET["id"],$_GET["razon_social"],$_GET["telefono"],$_GET["domicilio"],$_GET["estado_entidad_id"],$_GET["necesidad_entidad_id"],$_GET["servicio_prestado_id"]);	
}elseif(isset($_GET["action"]) && $_GET["action"] == 'addDonante'){
	ResourceController::getInstance()->addDonante($_GET["id"],$_GET["razon_social"],$_GET["apellido_contacto"],$_GET["nombre_contacto"],$_GET["telefono_contacto"],$_GET["mail_contacto"],$_GET["domicilio_contacto"]);

}elseif(isset($_GET["action"]) && $_GET["action"] == 'modAlimento'){
	ResourceController::getInstance()->modAlimento($_GET["codigo"],$_GET["descripcion"]);
}elseif(isset($_GET["action"]) && $_GET["action"] == 'modEntidadReceptora'){
	ResourceController::getInstance()->modEntidadReceptora($_GET["id"],$_GET["razon_social"],$_GET["telefono"],$_GET["domicilio"],$_GET["estado_entidad_id"],$_GET["necesidad_entidad_id"],$_GET["servicio_prestado_id"]);	
}elseif(isset($_GET["action"]) && $_GET["action"] == 'modDonante'){
	ResourceController::getInstance()->modDonante($_GET["id"],$_GET["razon_social"],$_GET["apellido_contacto"],$_GET["nombre_contacto"],$_GET["telefono_contacto"],$_GET["mail_contacto"],$_GET["domicilio_contacto"]);

}elseif(isset($_GET["action"]) && $_GET["action"] == 'delAlimento'){
	ResourceController::getInstance()->delAlimento($_GET["codigo"]);
}elseif(isset($_GET["action"]) && $_GET["action"] == 'delEntidadReceptora'){
	ResourceController::getInstance()->delEntidadReceptora($_GET["id"]);	
}elseif(isset($_GET["action"]) && $_GET["action"] == 'delDonante'){
	ResourceController::getInstance()->delDonante($_GET["id"]);


}else{
    ResourceController::getInstance()->home();
}

