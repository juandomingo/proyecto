<?php
App::uses('AlimentosPedido', 'Model');

/**
 * AlimentosPedido Test Case
 *
 */
class AlimentosPedidoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.alimentos_pedido',
		'app.detalle_alimento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->AlimentosPedido = ClassRegistry::init('AlimentosPedido');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->AlimentosPedido);

		parent::tearDown();
	}

}
