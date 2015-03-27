<?php
App::uses('AppController', 'Controller');
App::uses('CakeTime', 'Utility');
/**
 * Alimentos Controller
 *
 * @property Alimento $Alimento
 * @property PaginatorComponent $Paginator
 */
class ReportesController extends AppController {
	public function isAuthorized($user){
    if(in_array($this->action, array('index','view'))){
            if ($this->Auth->loggedIn()){
                return true;
            }
        }
    }
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
private function  ParseDateTime($dateField) {
         $datestring = $dateField['year'] . '-' .$dateField['month'] . '-' . $dateField['day'];
         return $datestring;
    }


	private function getAlimentosTotalesPedidosEntreDosFechas($fecha_inicial, $fecha_final){
        $Alimento = ClassRegistry::init('Alimento');
        $answer = $Alimento->query(
                "SELECT `alimentos`.id as id,`alimentos`.descripcion as descripcion, IFNULL(T2.total,0) as cantidad
                FROM `alimentos`
                LEFT JOIN (
                    SELECT `alimentos`.id as id, SUM(`alimentos_pedidos`.cantidad) as total,`alimentos`.descripcion
                    FROM `turno_entregas`,`pedidos`,`alimentos_pedidos`,`detalle_alimentos`,`alimentos`
                    WHERE `alimentos_pedidos`.pedido_id = `pedidos`.id 
                    AND `turno_entregas`.id = `pedidos`.turno_entrega_id
                    AND `alimentos_pedidos`.detalle_alimento_id = `detalle_alimentos`.id
                    AND `alimentos`.id = `detalle_alimentos`.alimento_id
                    AND `turno_entregas`.fecha BETWEEN ? AND ?
                    GROUP BY `alimentos`.descripcion
                ) as T2
                on `alimentos`.id = T2.id", array($fecha_inicial, $fecha_final));
        return $answer;
        }



private function getAlimentosTotalesVencidosSinEntregarEntreDosFechas($fecha_inicial, $fecha_final){
        $Alimento = ClassRegistry::init('Alimento');
        $answer = $Alimento->query(
                "SELECT `alimentos`.id as id,`alimentos`.descripcion as descripcion, IFNULL(T2.total,0) as cantidad
                FROM `alimentos`
                LEFT JOIN (
                    SELECT `alimentos`.id as id, SUM(`alimentos_pedidos`.cantidad) as total,`alimentos`.descripcion
                    FROM `turno_entregas`,`pedidos`,`alimentos_pedidos`,`detalle_alimentos`,`alimentos`
                    WHERE `turno_entregas`.fecha BETWEEN ? AND ?
                        AND `pedidos`.estado_pedido_id = 0
                        AND `turno_entregas`.id = `pedidos`.turno_entrega_id
                        AND `pedidos`.id = `alimentos_pedidos`.pedido_id
                        AND `alimentos_pedidos`.detalle_alimento_id = `detalle_alimentos`.id
                        AND `alimentos`.id = `detalle_alimentos`.alimento_id
                    GROUP BY `alimentos`.descripcion
                ) as T2
                on `alimentos`.id = T2.id", array($fecha_inicial, $fecha_final));

        return $answer;
        }

    public function listAlimentosPorEntidadEntre($fecha_inicial, $fecha_final){
        //selecciona aquellos pedidos cuya fecha de vencimiento esté entre las ingresadas por 
        //parámetro, las agrupa según la entidad que hizo el pdido y luego obtiene el total
        //en kilo de alimentos que pidió la entidad
        //$db =  $this->Model->getDataSource();
    	//$db = ConnectionManager::getDataSource("default"); 
    	//$this->$EntidadReceptora->
    	$EntidadReceptora = ClassRegistry::init('EntidadReceptora');
		$answer = $EntidadReceptora->query(
                "SELECT `entidad_receptoras`.id as id, IFNULL(t2.total,0) as total_kilos, `entidad_receptoras`.razon_social as razon_social
                FROM `entidad_receptoras`         
                LEFT JOIN   
                (
                SELECT `pedidos`.entidad_receptora_id as entidad_id, SUM(`alimentos_pedidos`.cantidad) as total
                FROM `turno_entregas`,`pedidos`,`alimentos_pedidos`,`detalle_alimentos`,`alimentos`
                WHERE `alimentos_pedidos`.pedido_id = `pedidos`.id 
                AND `turno_entregas`.id = `pedidos`.turno_entrega_id
                AND `alimentos_pedidos`.detalle_alimento_id = `detalle_alimentos`.id
                AND `alimentos`.id = `detalle_alimentos`.alimento_id
                AND `turno_entregas`.fecha BETWEEN ? AND ?
                GROUP BY `pedidos`.entidad_receptora_id
                ) AS t2
                ON t2.entidad_id = `entidad_receptoras`.ID",
                array($fecha_inicial, $fecha_final));
		//pr($this->ParseDateTime($fecha_final));
        return $answer;
    }

	public function view() {
        if ($this->request->is(array('post', 'put'))) {
    		$fecha_inicial = $this->ParseDateTime($this->request->data['reportes']['fecha_inicial']);
    		$fecha_final = $this->ParseDateTime($this->request->data['reportes']['fecha_final']);
    		$alimentos_entidad = $this->listAlimentosPorEntidadEntre($fecha_inicial,$fecha_final);
    		$alimentos_pedidos = $this->getAlimentosTotalesPedidosEntreDosFechas($fecha_inicial,$fecha_final);
            $alimentos_vencidos = $this->getAlimentosTotalesVencidosSinEntregarEntreDosFechas($fecha_inicial,$fecha_final);
            //pr($alimentos_pedidos);
    		//$alimentos_entidad = $this->getAlimentosEntidadReporte();
            $this->set('alimentos_pedidos', $alimentos_pedidos);
            $this->set('alimentos_vencidos', $alimentos_vencidos);
    		$this->set('alimentos_entidad', $alimentos_entidad);
            $this->set('fecha_inicial', $fecha_inicial);
            $this->set('fecha_final', $fecha_final);
        }else{
            $this->Session->setFlash(__('Por favor ingrese las fechas a consultar'));
            return $this->redirect(array('action' => 'index'));
        }
    }
        
	public function index(){
	}

}
