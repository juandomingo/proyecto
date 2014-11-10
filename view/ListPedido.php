<?php

/**
 * Description of ListPedido
 *
 * @author Florencia
 */

class ListPedido extends TwigView {
    
    public function show($pedido) {
        
        echo self::getTwig()->render('listPedido.html.twig', array('pedido' => $pedido));
        
        
    }
    
}
