<?php

/**
 * Description of EntregaHoy
 *
 * @author Tino
 */

class EntregaHoy extends TwigView {
    
    public function show($pedido,$directas) {
        echo self::getTwig()->render('entregaHoy.html.twig', array('pedido' => $pedido, 'directas' => $directas));
         
    }
    
}
