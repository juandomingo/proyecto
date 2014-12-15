<?php

/**
 * Description of AttemptAddPedido
 * @author Tino
 */

class AttemptAddPedido extends TwigView {
    
    public function show($entidades_receptoras,$alimentos_disponibles) {
        
        echo self::getTwig()->render('attemptAddPedido.html.twig',array('entidades_receptoras' => $entidades_receptoras, 'alimentos' => $alimentos_disponibles));
        
        
    }
    
}
