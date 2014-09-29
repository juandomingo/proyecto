<?php

/**
 * Description of ABMDonantes
 *
 * @author Tino
 */

class ABMDonanteList extends TwigView {
    
    public function show($donanteArray) {
        
        echo self::getTwig()->render('abmDonantes.html.twig', array('donantes' => $donanteArray));
        
        
    }
    
}
