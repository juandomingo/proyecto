<?php

/**
 * Description of ConfiguracionController
 *
 * @author Tino
 */
class ConfiguracionController {
    
    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    private function __construct() {
        
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

    public function addConfiguracion($clave,$valor,$nombre){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            ConfiguracionRepository::getInstance()->addConfiguracion($clave,$valor,$nombre);
            $this->configurarSistema();
            $this->listConfiguraciones();
        }
    }

    public function attemptAddConfiguracion(){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $view = new AttemptAddConfiguracion();
            $view->show();
        }
    }
    public function attemptEditConfiguracion($id){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $configuracion = ConfiguracionRepository::getInstance()->getConfiguracion($id);
            $view = new AttemptEditConfiguracion();
            $view->show([$configuracion->getId(),$configuracion->getClave(),$configuracion->getValor(),$configuracion->getNombre()]);
        }
    }
    public function modConfiguracion($id,$clave,$valor,$nombre){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            ConfiguracionRepository::getInstance()->modConfiguracion($id,$clave,$valor,$nombre);
            $this->configurarSistema();
            $this->listConfiguraciones();
        }
    }

    public function listConfiguraciones(){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $configuracion = ConfiguracionRepository::getInstance()->listAll();
            $view = new ABMConfiguracionList();
            $view->show($configuracion);
        }
    }
    public function delConfiguracion($id){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            ConfiguracionRepository::getInstance()->delConfiguracion($id);
            $this->configurarSistema();
            $this->listConfiguraciones();
        }
    }
 

    private function configurarSistema()
        {
            if ($this->check_auth($_SESSION['user']->getType(), array(1))){
                $configuracion = ConfiguracionRepository::getInstance()->listAll();
                ResourceController::getInstance()->cargarConfiguracion();
                UserController::getInstance()->cargarConfiguracion();
            }
        }

}
