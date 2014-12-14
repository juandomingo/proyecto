<?php

/**
 * Description of ListReportes
 *
 * @author Tino
 */

class ListReportes extends TwigView {
    
    public function show($alimentos_pedidos_entre_dos_fechas,
    					$alimentos_por_entidad,
    					$alimentos_vencidos_sin_entregar_entre_dos_fechas,
    					$dia_inicial, $dia_final)
    {
        echo self::getTwig()->render('viewReportes.html.twig',
        	array('alimentos_pedidos' => $alimentos_pedidos_entre_dos_fechas,
        		'alimentos_entidad' => $alimentos_por_entidad,
        		'alimentos_vencidos'=> $alimentos_vencidos_sin_entregar_entre_dos_fechas,
        		'fecha_inicial' => [$dia_inicial],
        		'fecha_final' => [$dia_final]));        
    }
    
}
