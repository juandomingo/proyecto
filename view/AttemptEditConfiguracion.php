<?php

/**
 * Description of AttemptEditConfiguraciones
 * @author Tino
 */

class AttemptEditConfiguracion extends TwigView {
    
    public function show($array_configuracion) {
        
        echo self::getTwig()->render('attemptEditConfiguracion.html.twig', array('configuracion' => $array_configuracion));
        
        
    }
    
}