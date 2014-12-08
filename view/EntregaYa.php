<?php

/**
 * Description of EntregaYa
 *
 * @author Tino
 */

class EntregaYa extends TwigView {
    
    public function show($alimentos_por_vencer, $entidades_receptoras) {
        
        echo self::getTwig()->render('entregarYa.html.twig', array('alimentos' => $alimentos_por_vencer, 'entidades' => $entidades_receptoras ));        
    }
    
}
