<?php

/**
 * Description of ListMap
 *
 * @author Tino
 */

class ListMap extends TwigView {
    
    public function show() {
        
        echo self::getTwig()->render('listMap.html.twig');        
    }
    
}
