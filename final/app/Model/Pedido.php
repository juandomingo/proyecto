<?php
App::uses('AppModel', 'Model');
/**
 * Pedido Model
 *
 * @property EntidadReceptora $EntidadReceptora
 * @property EstadoPedido $EstadoPedido
 * @property TurnoEntrega $TurnoEntrega
 * @property Alimento $Alimento
 */
class Pedido extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'entidad_receptora_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'fecha_ingreso' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'estado_pedido_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'turno_entrega_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'con_envio' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'del' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'EntidadReceptora' => array(
			'className' => 'EntidadReceptora',
			'foreignKey' => 'entidad_receptora_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'EstadoPedido' => array(
			'className' => 'EstadoPedido',
			'foreignKey' => 'estado_pedido_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'TurnoEntrega' => array(
			'className' => 'TurnoEntrega',
			'foreignKey' => 'turno_entrega_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Alimento' => array(
			'className' => 'Alimento',
			'joinTable' => 'alimentos_pedidos',
			'foreignKey' => 'pedido_id',
			'associationForeignKey' => 'alimento_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
