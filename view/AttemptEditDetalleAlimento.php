<?php

/**
 * Description of AttemptEditDetalleAlimento
 *
 * @author Florencia
 */

class AttemptEditDetalleAlimento extends TwigView {
    
    public function show($selectedArray,$alimentos) {
        
        echo self::getTwig()->render('attemptEditDetalleAlimento.html.twig',array('selected_array' => $selectedArray, 'alimentos' => $alimentos));
        
        
    }
    
}
