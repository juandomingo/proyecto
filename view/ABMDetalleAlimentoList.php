<?php

/**
 * Description of ABMDetalleAlimentoList
 *
 * @author Tino
 */

class ABMDetalleAlimentoList extends TwigView {
    
    public function show($detalleAlimentoArray) {
        
        echo self::getTwig()->render('abmDetallesAlimentos.html.twig', array('detalles_alimentos' => $detalleAlimentoArray));
        
        
    }
    
}
