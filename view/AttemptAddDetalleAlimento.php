<?php

/**
 * Description of AttemptAddDetalleAlimento
 * @author Florencia
 */

class AttemptAddDetalleAlimento extends TwigView {
    
    public function show($alimentos) {
        
        echo self::getTwig()->render('attemptAddDetalleAlimento.html.twig',array('alimentos'=> $alimentos));
        
        
    }
    
}
