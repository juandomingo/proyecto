<?php

/**
 * Description of login.php
 *
 * @author Tino
 */


class Login extends TwigView {
    
    public function show() {
        
        echo self::getTwig()->render('login.html.twig');
        
        
    }
    
}
