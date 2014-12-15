<?php

/**
 * Description of AttemptEditEntidadReceptora
 *
 * @author Tino
 */

class AttemptEditPedido extends TwigView {
    
    public function show($pedido,$entidades_receptoras,$alimentos_disponibles) {
        
        echo self::getTwig()->render('attemptEditPedido.html.twig',array('pedido' => $pedido, 'entidades_receptoras' => $entidades_receptoras, 'alimentos' => $alimentos_disponibles));
    }
    
}
