<?php

/**
 * Description of AttemptAddPedido
 * @author Tino
 */

class AttemptAddPedido extends TwigView {
    
    public function show($entidades_receptoras,$detalles_alimentos) {
        
        echo self::getTwig()->render('attemptAddPedido.html.twig',array('entidades_receptoras' => $entidades_receptoras, 'detalles_alimentos' => $detalles_alimentos));
        
        
    }
    
}
