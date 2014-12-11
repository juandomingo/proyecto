<?php

/**
 * Description of ABMUsuarioList
 *
 * @author Tino
 */

class ABMConfiguracionList extends TwigView {
    
    public function show($configuracionArray) {
        
        echo self::getTwig()->render('abmConfiguracion.html.twig', array('configuracion' => $configuracionArray));
        
        
    }
    
}