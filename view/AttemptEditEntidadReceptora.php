<?php

/**
 * Description of AttemptEditEntidadReceptora
 *
 * @author Tino
 */

class AttemptEditEntidadReceptora extends TwigView {
    
    public function show($selectedArray) {
        
        echo self::getTwig()->render('attemptEditEntidadReceptora.html.twig',array('selected_array' => $selectedArray));
        
    }
    
}
