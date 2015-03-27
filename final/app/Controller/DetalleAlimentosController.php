<?php
App::uses('AppController', 'Controller');
/**
 * DetalleAlimentos Controller
 *
 * @property DetalleAlimento $DetalleAlimento
 * @property PaginatorComponent $Paginator
 */
class DetalleAlimentosController extends AppController {

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
		$this->DetalleAlimento->recursive = 0;
		$this->set('detalleAlimentos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DetalleAlimento->exists($id)) {
			throw new NotFoundException(__('Invalid detalle alimento'));
		}
		$options = array('conditions' => array('DetalleAlimento.' . $this->DetalleAlimento->primaryKey => $id));
		$this->set('detalleAlimento', $this->DetalleAlimento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DetalleAlimento->create();
			if ($this->DetalleAlimento->save($this->request->data)) {
				$this->Session->setFlash(__('The detalle alimento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detalle alimento could not be saved. Please, try again.'));
			}
		}
		$alimentos = $this->DetalleAlimento->Alimento->find('list');
		$this->set(compact('alimentos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->DetalleAlimento->exists($id)) {
			throw new NotFoundException(__('Invalid detalle alimento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DetalleAlimento->save($this->request->data)) {
				$this->Session->setFlash(__('The detalle alimento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detalle alimento could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DetalleAlimento.' . $this->DetalleAlimento->primaryKey => $id));
			$this->request->data = $this->DetalleAlimento->find('first', $options);
		}
		$alimentos = $this->DetalleAlimento->Alimento->find('list');
		$this->set(compact('alimentos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->DetalleAlimento->id = $id;
		if (!$this->DetalleAlimento->exists()) {
			throw new NotFoundException(__('Invalid detalle alimento'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DetalleAlimento->delete()) {
			$this->Session->setFlash(__('The detalle alimento has been deleted.'));
		} else {
			$this->Session->setFlash(__('The detalle alimento could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
