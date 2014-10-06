<?php

/**
 * Description of SimpleResourceList
 *
 * @author fede
 */


class Home extends TwigView {
    
    public function show($user_name) {
        
        echo self::getTwig()->render('home.html.twig',array('user_name' => $user_name));
        
        
    }
    
}
