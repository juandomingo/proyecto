<?php

/**
 * Description of AttemptEditDonante
 *
 * @author Florencia
 */

class AttemptEditDonante extends TwigView {
    
    public function show($selectedArray) {
        
        echo self::getTwig()->render('attemptEditDonante.html.twig',array('selected_array' => $selectedArray));
        
        
    }
    
}
