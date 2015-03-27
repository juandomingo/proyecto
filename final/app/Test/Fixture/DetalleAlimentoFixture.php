<?php
/**
 * DetalleAlimentoFixture
 *
 */
class DetalleAlimentoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'alimento_id' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'contenido' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'fecha_vencimiento' => array('type' => 'date', 'null' => false, 'default' => null),
		'stock' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'peso_unitario' => array('type' => 'float', 'null' => false, 'default' => null, 'length' => '6,2', 'unsigned' => false),
		'reservado' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'id' => 1,
			'alimento_id' => 'Lorem ip',
			'contenido' => 'Lorem ipsum dolor sit amet',
			'fecha_vencimiento' => '2015-03-25',
			'stock' => 1,
			'peso_unitario' => 1,
			'reservado' => 1
		),
	);

}
