<?php

/**
 * Description of SimpleDonanteList
 *
 * @author Florencia
 */

class SimpleDonanteList extends TwigView {
    
    public function show($donanteArray) {
        
        echo self::getTwig()->render('listDonantes.html.twig', array('donantes' => $donanteArray));
        
        
    }
    
}
