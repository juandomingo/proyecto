<?php

/**
 * Description of AttemptAddUser
 * @author Florencia
 */

class AttemptAddUser extends TwigView {
    
    public function show() {
        
        echo self::getTwig()->render('attemptAddUser.html.twig');
        
        
    }
    
}