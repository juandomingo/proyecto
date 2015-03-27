<?php
App::uses('TurnoEntrega', 'Model');

/**
 * TurnoEntrega Test Case
 *
 */
class TurnoEntregaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.turno_entrega',
		'app.pedido',
		'app.entidad_receptora',
		'app.estado_pedido',
		'app.alimento',
		'app.alimentos_pedido'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TurnoEntrega = ClassRegistry::init('TurnoEntrega');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TurnoEntrega);

		parent::tearDown();
	}

}
