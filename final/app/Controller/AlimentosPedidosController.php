<?php
App::uses('AppController', 'Controller');
/**
 * AlimentosPedidos Controller
 *
 * @property AlimentosPedido $AlimentosPedido
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AlimentosPedidosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AlimentosPedido->recursive = 0;
		$this->set('alimentosPedidos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AlimentosPedido->exists($id)) {
			throw new NotFoundException(__('Invalid alimentos pedido'));
		}
		$options = array('conditions' => array('AlimentosPedido.' . $this->AlimentosPedido->primaryKey => $id));
		$this->set('alimentosPedido', $this->AlimentosPedido->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AlimentosPedido->create();
			if ($this->AlimentosPedido->save($this->request->data)) {
				$this->Session->setFlash(__('The alimentos pedido has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alimentos pedido could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AlimentosPedido->exists($id)) {
			throw new NotFoundException(__('Invalid alimentos pedido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AlimentosPedido->save($this->request->data)) {
				$this->Session->setFlash(__('The alimentos pedido has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alimentos pedido could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AlimentosPedido.' . $this->AlimentosPedido->primaryKey => $id));
			$this->request->data = $this->AlimentosPedido->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->AlimentosPedido->id = $id;
		if (!$this->AlimentosPedido->exists()) {
			throw new NotFoundException(__('Invalid alimentos pedido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->AlimentosPedido->delete()) {
			$this->Session->setFlash(__('The alimentos pedido has been deleted.'));
		} else {
			$this->Session->setFlash(__('The alimentos pedido could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
