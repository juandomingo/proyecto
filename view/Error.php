<?php

/**
 * Description of Error
 *
 * @author Tino
 */

class Error extends TwigView {
    
    public function show($errorMessages) {
        
        echo self::getTwig()->render('errors.html.twig', array('errors' => $errorMessages));
        
    }
    
}