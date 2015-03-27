<?php
App::uses('AppController', 'Controller');
/**
 * TurnoEntregas Controller
 *
 * @property TurnoEntrega $TurnoEntrega
 * @property PaginatorComponent $Paginator
 */
class TurnoEntregasController extends AppController {

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
		$this->TurnoEntrega->recursive = 0;
		$this->set('turnoEntregas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TurnoEntrega->exists($id)) {
			throw new NotFoundException(__('Invalid turno entrega'));
		}
		$options = array('conditions' => array('TurnoEntrega.' . $this->TurnoEntrega->primaryKey => $id));
		$this->set('turnoEntrega', $this->TurnoEntrega->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TurnoEntrega->create();
			if ($this->TurnoEntrega->save($this->request->data)) {
				$this->Session->setFlash(__('The turno entrega has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The turno entrega could not be saved. Please, try again.'));
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
		if (!$this->TurnoEntrega->exists($id)) {
			throw new NotFoundException(__('Invalid turno entrega'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TurnoEntrega->save($this->request->data)) {
				$this->Session->setFlash(__('The turno entrega has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The turno entrega could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TurnoEntrega.' . $this->TurnoEntrega->primaryKey => $id));
			$this->request->data = $this->TurnoEntrega->find('first', $options);
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
		$this->TurnoEntrega->id = $id;
		if (!$this->TurnoEntrega->exists()) {
			throw new NotFoundException(__('Invalid turno entrega'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->TurnoEntrega->delete()) {
			$this->Session->setFlash(__('The turno entrega has been deleted.'));
		} else {
			$this->Session->setFlash(__('The turno entrega could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
