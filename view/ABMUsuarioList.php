<?php

/**
 * Description of ABMUsuarioList
 *
 * @author Florencia
 */

class ABMUsuarioList extends TwigView {
    
    public function show($userArray) {
        
        echo self::getTwig()->render('abmUser.html.twig', array('user' => $userArray));
        
        
    }
    
}