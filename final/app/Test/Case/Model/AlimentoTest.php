<?php
App::uses('Alimento', 'Model');

/**
 * Alimento Test Case
 *
 */
class AlimentoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
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
		$this->Alimento = ClassRegistry::init('Alimento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Alimento);

		parent::tearDown();
	}

}
