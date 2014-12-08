<?php

/**
 * Description of ABMEntregaDirecta
 *
 * @author Tino
 */

class ABMEntregaDirecta extends TwigView {
    
    public function show($entrega_directa) {
        
        echo self::getTwig()->render('abmEntregaDirecta.html.twig', array('entregas' => $entrega_directa));
        
        
    }
    
}