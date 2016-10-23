<?php


App::uses('AppController', 'Controller');



class ProductsController extends AppController {

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index');
	}


	public function index() {
		$conditions = array();
		//$userId = $this->Auth->user('id');

		// if ($this->Auth->user('role') != 'admin'){
		// 	$conditions['Exam.user_id'] =  $userId;			
		// }

		$this->paginate = ['conditions' => $conditions];

		$lista = $this->paginate();
		$this->set('products', $lista);	
	}





	public function add() {

		// form posted
		if ($this->request->is('post')) {
			// create
			$this->Product->create();

			// attempt to save
			if ($this->Product->save($this->request->data)) {
				$this->Flash->success('Produto cadastrado com sucesso.');
				$this->redirect(array('action' => 'index'));
			}
		}
		$categories = $this->Product->Category->find('list', ['order' => 'Category.name ASC']);
		$this->set(compact('categories'));

	}

}
