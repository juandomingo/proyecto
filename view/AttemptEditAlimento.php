<?php

/**
 * Description of AttemptEditAlimento
 *
 * @author Florencia
 */

class AttemptEditAlimento extends TwigView {
    
    public function show($selectedArray) {
        
        echo self::getTwig()->render('attemptEditAlimento.html.twig',array('selected_array' => $selectedArray));
        
        
    }
    
}
