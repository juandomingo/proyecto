<?php
App::uses('AppController', 'Controller');
/**
 * EntidadReceptoras Controller
 *
 * @property EntidadReceptora $EntidadReceptora
 * @property PaginatorComponent $Paginator
 */
class EntidadReceptorasController extends AppController {

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
		$this->EntidadReceptora->recursive = 0;
		$this->set('entidadReceptoras', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EntidadReceptora->exists($id)) {
			throw new NotFoundException(__('Invalid entidad receptora'));
		}
		$options = array('conditions' => array('EntidadReceptora.' . $this->EntidadReceptora->primaryKey => $id));
		$this->set('entidadReceptora', $this->EntidadReceptora->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EntidadReceptora->create();
			if ($this->EntidadReceptora->save($this->request->data)) {
				$this->Session->setFlash(__('The entidad receptora has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entidad receptora could not be saved. Please, try again.'));
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
		if (!$this->EntidadReceptora->exists($id)) {
			throw new NotFoundException(__('Invalid entidad receptora'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EntidadReceptora->save($this->request->data)) {
				$this->Session->setFlash(__('The entidad receptora has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entidad receptora could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EntidadReceptora.' . $this->EntidadReceptora->primaryKey => $id));
			$this->request->data = $this->EntidadReceptora->find('first', $options);
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
		$this->EntidadReceptora->id = $id;
		if (!$this->EntidadReceptora->exists()) {
			throw new NotFoundException(__('Invalid entidad receptora'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EntidadReceptora->delete()) {
			$this->Session->setFlash(__('The entidad receptora has been deleted.'));
		} else {
			$this->Session->setFlash(__('The entidad receptora could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
