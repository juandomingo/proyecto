<?php
App::uses('DetalleAlimento', 'Model');

/**
 * DetalleAlimento Test Case
 *
 */
class DetalleAlimentoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.detalle_alimento',
		'app.alimento',
		'app.pedido',
		'app.alimentos_pedido'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DetalleAlimento = ClassRegistry::init('DetalleAlimento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DetalleAlimento);

		parent::tearDown();
	}

}
