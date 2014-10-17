<?php

/**
 * Description of ABMAlimentoList
 *
 * @author Florencia
 */

class ABMAlimentoList extends TwigView {
    
    public function show($alimentoArray) {
        
        echo self::getTwig()->render('abmAlimentos.html.twig', array('alimentos' => $alimentoArray));
        
        
    }
    
}
