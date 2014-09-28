<?php

/**
 * Description of SimpleResourceList
 *
 * @author fede
 */

class SimpleAlimentoList extends TwigView {
    
    public function show($alimentoArray) {
        
        echo self::getTwig()->render('listAlimentos.html.twig', array('alimentos' => $alimentoArray));
        
        
    }
    
}
