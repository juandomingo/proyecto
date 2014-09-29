<?php

/**
 * Description of SimpleResourceList
 *
 * @author fede
 */

class ABMDetalleAlimentoList extends TwigView {
    
    public function show($alimentoArray) {
        
        echo self::getTwig()->render('abmDetallesAlimentos.html.twig', array('alimentos' => $alimentoArray));
        
        
    }
    
}
