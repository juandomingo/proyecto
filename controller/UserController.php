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

    
}
