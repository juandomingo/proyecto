<?php

/**
 * Description of login.php
 *
 * @author Tino
 */


class Login1 extends TwigView {
    
    public function show() {
        
        echo self::getTwig()->render('login1.html.twig');
        
        
    }
    
}
