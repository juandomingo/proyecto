<?php
App::uses('AppController', 'Controller');
/**
 * EstadoPedidos Controller
 *
 * @property EstadoPedido $EstadoPedido
 * @property PaginatorComponent $Paginator
 */
class EstadoPedidosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->EstadoPedido->recursive = 0;
		$this->set('estadoPedidos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EstadoPedido->exists($id)) {
			throw new NotFoundException(__('Invalid estado pedido'));
		}
		$options = array('conditions' => array('EstadoPedido.' . $this->EstadoPedido->primaryKey => $id));
		$this->set('estadoPedido', $this->EstadoPedido->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EstadoPedido->create();
			if ($this->EstadoPedido->save($this->request->data)) {
				$this->Session->setFlash(__('The estado pedido has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estado pedido could not be saved. Please, try again.'));
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
		if (!$this->EstadoPedido->exists($id)) {
			throw new NotFoundException(__('Invalid estado pedido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EstadoPedido->save($this->request->data)) {
				$this->Session->setFlash(__('The estado pedido has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The estado pedido could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EstadoPedido.' . $this->EstadoPedido->primaryKey => $id));
			$this->request->data = $this->EstadoPedido->find('first', $options);
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
		$this->EstadoPedido->id = $id;
		if (!$this->EstadoPedido->exists()) {
			throw new NotFoundException(__('Invalid estado pedido'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EstadoPedido->delete()) {
			$this->Session->setFlash(__('The estado pedido has been deleted.'));
		} else {
			$this->Session->setFlash(__('The estado pedido could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
