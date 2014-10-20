<?php

/**
 * Description of AuthFail
 *
 * @author Tino
 */

class AuthFail extends TwigView {
    
    public function show() {
        
        echo self::getTwig()->render('authFail.html.twig');
        
    }
    
}
