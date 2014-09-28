<?php

/**
 * Description of SimpleEntidadReceptoraList
 *
 * @author Florencia
 */

class SimpleEntidadReceptoraList extends TwigView {
    
    public function show($entidad_receptoraArray) {
        
        echo self::getTwig()->render('listEntidadesReceptoras.html.twig', array('entidades_receptoras' => $entidad_receptoraArray));
        
        
    }
    
}
