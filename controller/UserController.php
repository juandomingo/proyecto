<?php

/**
 * Description of UserControler
 *
 * @author Tino
 */
class UserController {
    
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

    private function serializar($objects){
        $serialized = [];
        foreach ($objects as $object) {
            $serialized[] = $object->serializar();
        }
        return $serialized;
    }

    public function login($name, $password ){
        ob_start();
        echo "peon";
        $user = UserRepository::getInstance()->getOne($name,$password);
        if(count($user) == 0) // User not found. So, redirect to login_form again.
        {
            header('Location:?action=login');
            echo "falla";
        }
        else{
        session_regenerate_id();
        $_SESSION['user'] = $user[0];
        $_SESSION['sess_user_id'] = $user[0]->getId();
        $_SESSION['sess_username'] = $user[0]->getName();
        $_SESSION['sess_user_type'] = $user[0]->getType();
        session_write_close();
        header('Location:?action=home');
       }
   }
    
    public function login1(){
        $view = new Login1();
        $view->show();
    }

    public function logout(){
        session_unset();
        session_destroy();
        header("location:");
        ResourceController::getInstance()->login();
    }

    public function addUser($name,$password,$type){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            UserRepository::getInstance()->addUser($name,$password,$type);
            $this->listUsuarios();
        }
    }

    public function attemptAddUser(){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $view = new AttemptAddUser();
            $view->show();
        }
    }
    public function attemptEditUser($id){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $user = $this->serializar(UserRepository::getInstance()->getUser($id));
            $view = new AttemptEditUser();

            $view->show($user[0]);
        }
    }
    public function modUser($id,$name,$password,$type){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            UserRepository::getInstance()->modUser($id,$name,$password,$type);
            $this->listUsuarios();
        }
    }

    public function listUsuarios(){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            $users = $this->serializar(UserRepository::getInstance()->listAll());
            $view = new ABMUsuarioList();
            $view->show($users);
        }
    }
    public function delUser($id){
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){
            UserRepository::getInstance()->delUser($id);
            $this->listUsuarios();
        }
    }

    public function cargarConfiguracion()
    {
        if ($this->check_auth($_SESSION['user']->getType(), array(1))){

        }
    }
}
