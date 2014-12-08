<?php

/**
 * Description of ABMAlimentoEntregaDirecta
 *
 * @author Tino
 */

class ABMAlimentoEntregaDirecta extends TwigView {
    
    public function show($entrega_directa, $alimentos_entrega_directa, $razon_social) {
        
        echo self::getTwig()->render('ABMAlimentoEntregaDirecta.html.twig', array('entregas' => $entrega_directa, 'alimentos' => $alimentos_entrega_directa, 'razon_social' => $razon_social));
        
        
    }
    
}