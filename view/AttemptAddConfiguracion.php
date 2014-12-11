<?php

/**
 * Description of AttemptAddConfiguracion
 * @author Tino
 */

class AttemptAddConfiguracion extends TwigView {
    
    public function show() {
        
        echo self::getTwig()->render('attemptAddConfiguracion.html.twig');
        
        
    }
    
}
