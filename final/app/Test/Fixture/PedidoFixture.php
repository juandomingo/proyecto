<?php
/**
 * PedidoFixture
 *
 */
class PedidoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'numero' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'entidad_receptora_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'fecha_ingreso' => array('type' => 'date', 'null' => false, 'default' => null),
		'estado_pedido_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'turno_entrega_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'con_envio' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'del' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'numero', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'numero' => 1,
			'entidad_receptora_id' => 1,
			'fecha_ingreso' => '2015-03-25',
			'estado_pedido_id' => 1,
			'turno_entrega_id' => 1,
			'con_envio' => 1,
			'del' => 1
		),
	);

}
