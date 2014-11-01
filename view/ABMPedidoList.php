<?php

/**
 * Description of ABMPedidoList
 *
 * @author Florencia
 */

class ABMPedidoList extends TwigView {
    
    public function show($pedidoArray) {
        
        echo self::getTwig()->render('abmPedidos.html.twig', array('pedidos' => $pedidoArray));
        
        
    }
    
}