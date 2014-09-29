<?php

/**
 * Description of AttemptAddDetalleAlimento
 * @author Florencia
 */

class AttemptAddDetalleAlimento extends TwigView {
    
    public function show() {
        
        echo self::getTwig()->render('AttemptAddDetalleAlimento.html.twig');
        
        
    }
    
}
