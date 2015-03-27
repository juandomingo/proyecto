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
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index','view');
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


	private function getAlimentosTotalesPedidosEntreDosFechas($dia_inicial, $dia_final){
        $db = $this->getDataSource();
		$db->fetchAll(
                "SELECT `alimento`.codigo as codigo,`alimento`.descripcion as descripcion, IFNULL(T2.total,0) as cantidad
                FROM `alimento`
                LEFT JOIN (
                    SELECT `alimento`.codigo as codigo, SUM(`alimento_pedido`.cantidad) as total,`alimento`.descripcion
                    FROM `turno_entrega`,`pedido`,`alimento_pedido`,`detalle_alimento`,`alimento`
                    WHERE `alimento_pedido`.pedido_numero = `pedido`.numero 
                    AND `turno_entrega`.id = `pedido`.turno_entrega_id
                    AND `alimento_pedido`.detalle_alimento_id = `detalle_alimento`.id
                    AND `alimento`.codigo = `detalle_alimento`.alimento_codigo
                    AND `turno_entrega`.fecha BETWEEN ? AND ?
                    GROUP BY `alimento`.descripcion
                ) as T2
                on `alimento`.codigo = T2.codigo", array($fecha_inicial, $fecha_final));
        return $answer;
        }



private function getAlimentosTotalesVencidosSinEntregarEntreDosFechas($dia_inicial, $dia_final){
        $db = $this->getDataSource();
		$db->fetchAll(
                "SELECT `alimento`.codigo as codigo,`alimento`.descripcion as descripcion, IFNULL(T2.total,0) as cantidad
                FROM `alimento`
                LEFT JOIN (
                    SELECT `alimento`.codigo as codigo, SUM(`alimento_pedido`.cantidad) as total,`alimento`.descripcion
                    FROM `turno_entrega`,`pedido`,`alimento_pedido`,`detalle_alimento`,`alimento`
                    WHERE `turno_entrega`.fecha BETWEEN ? AND ?
                        AND `pedido`.estado_pedido_id = 0
                        AND `turno_entrega`.id = `pedido`.turno_entrega_id
                        AND `pedido`.numero = `alimento_pedido`.pedido_numero
                        AND `alimento_pedido`.detalle_alimento_id = `detalle_alimento`.id
                        AND `alimento`.codigo = `detalle_alimento`.alimento_codigo
                    GROUP BY `alimento`.descripcion
                ) as T2
                on `alimento`.codigo = T2.codigo", array($fecha_inicial, $fecha_final));

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
                AND `alimentos`.codigo = `detalle_alimentos`.alimento_id
                AND `turno_entregas`.fecha BETWEEN ? AND ?
                GROUP BY `pedidos`.entidad_receptora_id
                ) AS t2
                ON t2.entidad_id = `entidad_receptoras`.ID",
                array($fecha_inicial, $fecha_final));
		//pr($this->ParseDateTime($fecha_final));
        return $answer;
    }

	public function view() {
		$fecha_inicial = $this->ParseDateTime($this->request->data['reportes']['fecha_inicial']);
		$fecha_final = $this->ParseDateTime($this->request->data['reportes']['fecha_final']);
		$alimentos_entidad = $this->listAlimentosPorEntidadEntre($fecha_inicial,$fecha_final);
		//pr($this->request->data);
		//$alimentos_entidad = $this->getAlimentosEntidadReporte();
		$this->set('alimentos_entidad', $alimentos_entidad);
	}

	public function index(){
	}

}
