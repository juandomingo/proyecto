<?php

/**
 * Description of AttempAddEntregaDirecta
 *
 * @author Tino
 */

class AttemptAddEntregaDirecta extends TwigView {
    
    public function show($alimentos_por_vencer, $entidades_receptoras) {
        
        echo self::getTwig()->render('attemptAddEntregaDirecta.html.twig', array('alimentos' => $alimentos_por_vencer, 'entidades' => $entidades_receptoras ));        
    }
    
}
