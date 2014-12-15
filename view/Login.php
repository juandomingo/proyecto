<?php

/**
 * Description of login.php
 *
 * @author Tino
 */


class Login extends TwigView {
    
    public function show($linkedin) {
        
        echo self::getTwig()->render('login.html.twig',array('linkedin' => $linkedin));
        
        
    }
    
}
