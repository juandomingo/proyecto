<?php

/**
 * Description of AttemptEditDetalleAlimento
 *
 * @author Florencia
 */

class AttemptEditDetalleAlimento extends TwigView {
    
    public function show($selectedArray) {
        
        echo self::getTwig()->render('AttemptEditDetalleAlimento.html.twig',array('selected_array' => $selectedArray));
        
        
    }
    
}
