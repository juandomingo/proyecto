<?php

/**
 * Description of SimpleDetalleAlimentoList
 *
 * @author Florencia
 */

class SimpleDetalleAlimentoList extends TwigView {
    
    public function show($detalle_alimentoArray) {
        
        echo self::getTwig()->render('listDetalleAlimento.html.twig', array('donantes' => $detalle_alimentoArray));
        
        
    }
    
}
