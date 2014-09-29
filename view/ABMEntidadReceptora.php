<?php

/**
 * Description of ABMEntidadReceptora
 *
 * @author Tino
 */

class ABMEntidadReceptoraList extends TwigView {
    
    public function show($entidadeReceptoraArray) {
        
        echo self::getTwig()->render('abmEntidadesReceptoras.html.twig', array('entidades_receptoras' => $entidadeReceptoraArray));
        
        
    }
    
}
