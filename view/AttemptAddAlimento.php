<?php

/**
 * Description of AttemptAddAlimento
 * @author Florencia
 */

class AttemptAddAlimento extends TwigView {
    
    public function show() {
        
        echo self::getTwig()->render('AttemptAddAlimento.html.twig');
        
        
    }
    
}
