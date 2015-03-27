<?php
App::uses('EntidadReceptora', 'Model');

/**
 * EntidadReceptora Test Case
 *
 */
class EntidadReceptoraTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.entidad_receptora',
		'app.pedido'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EntidadReceptora = ClassRegistry::init('EntidadReceptora');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EntidadReceptora);

		parent::tearDown();
	}

}
