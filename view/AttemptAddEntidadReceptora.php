<?php

/**
 * Description of AttemptAddEntidadReceptora
 *
 * @author Tino
 */

class AttemptAddEntidadReceptora extends TwigView {
    
    public function show() {
        
        echo self::getTwig()->render('attemptAddEntidadReceptora.html.twig');
        
        
    }
    
}
