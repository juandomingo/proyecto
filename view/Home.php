<?php

/**
 * Description of SimpleResourceList
 *
 * @author fede
 */


class Home extends TwigView {
    
    public function show($alimentos, $turnos_entrega_hoy, $entidades_receptoras) {

        echo self::getTwig()->render('home.html.twig',array('user' => [$_SESSION['user']],'detalles_alimentos' =>$alimentos, 'turnos_entrega_hoy' => $turnos_entrega_hoy, 'entidades_receptoras' => $entidades_receptoras));
       
    }
    
}
