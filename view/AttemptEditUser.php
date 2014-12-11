<?php

/**
 * Description of AttemptAddUser
 * @author Tino
 */

class AttemptEditUser extends TwigView {
    
    public function show($array_usuarios) {
        
        echo self::getTwig()->render('attemptEditUser.html.twig', array('usuarios' => $array_usuarios));
        
        
    }
    
}