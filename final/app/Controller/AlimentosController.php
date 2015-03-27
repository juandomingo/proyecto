<?php
App::uses('AppController', 'Controller');
/**
 * Alimentos Controller
 *
 * @property Alimento $Alimento
 * @property PaginatorComponent $Paginator
 */
class AlimentosController extends AppController {

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
		$this->Alimento->recursive = 0;
		$this->set('alimentos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Alimento->exists($id)) {
			throw new NotFoundException(__('Invalid alimento'));
		}
		$options = array('conditions' => array('Alimento.' . $this->Alimento->primaryKey => $id));
		$this->set('alimento', $this->Alimento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Alimento->create();
			if ($this->Alimento->save($this->request->data)) {
				$this->Session->setFlash(__('The alimento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alimento could not be saved. Please, try again.'));
			}
		}
		$pedidos = $this->Alimento->Pedido->find('list');
		$this->set(compact('pedidos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Alimento->exists($id)) {
			throw new NotFoundException(__('Invalid alimento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Alimento->save($this->request->data)) {
				$this->Session->setFlash(__('The alimento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The alimento could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Alimento.' . $this->Alimento->primaryKey => $id));
			$this->request->data = $this->Alimento->find('first', $options);
		}
		$pedidos = $this->Alimento->Pedido->find('list');
		$this->set(compact('pedidos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Alimento->id = $id;
		if (!$this->Alimento->exists()) {
			throw new NotFoundException(__('Invalid alimento'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Alimento->delete()) {
			$this->Session->setFlash(__('The alimento has been deleted.'));
		} else {
			$this->Session->setFlash(__('The alimento could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
