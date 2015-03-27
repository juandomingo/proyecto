<?php
App::uses('EstadoPedido', 'Model');

/**
 * EstadoPedido Test Case
 *
 */
class EstadoPedidoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.estado_pedido',
		'app.pedido'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EstadoPedido = ClassRegistry::init('EstadoPedido');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EstadoPedido);

		parent::tearDown();
	}

}
