<?php

/**
 * Description of AttemptAddDonante
 * @author Florencia
 */

class AttemptAddDonante extends TwigView {
    
    public function show() {
        
        echo self::getTwig()->render('attemptAddDonante.html.twig');
        
        
    }
    
}
