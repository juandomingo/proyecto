<?php

/**
 * Description of AttemptEditEntidadReceptora
 *
 * @author Tino
 */

class AttemptEditPedido extends TwigView {
    
    public function show($pedido,$entidades_receptoras,$alimentos_pedidos,$detalle_alimentos) {
        
        echo self::getTwig()->render('attemptEditPedido.html.twig',array('pedido' => $pedido, 'entidades_receptoras' => $entidades_receptoras, 'alimentos' => $alimentos_pedidos, 'detalles_alimentos' => $detalle_alimentos));
    }
    
}
