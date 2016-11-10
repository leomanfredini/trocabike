<?php


App::uses('AppController', 'Controller');



class ProductsController extends AppController {

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index', 'filter', 'view');
	}


	public function index() {

		$conditions = array('Product.active' => true);

		$this->paginate = ['conditions' => $conditions];

		$lista = $this->paginate();
		$this->set('products', $lista);	
	}




	public function filter($id = null) {
		$options = array(			
			'conditions' => array('Product.category_id' => $id),			
			'limit' => 10
		);

		$this->paginate = $options;

		$lista = $this->paginate('Product');
		$this->set('products', $lista);
	
	}




	public function view($id = null) {
		$this->Product->id = $id;
		// if(!$this->product->exists()) {
		// 	throw new Exception('Produto Inexistente');
		// }
		$this->set('product', $this->Product->findById($id));
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


	public function myproducts() {
		$userId = $this->Auth->user('id');
		$conditions['Product.user_id'] =  $userId;
		$this->paginate = ['conditions' => $conditions];
		$lista = $this->paginate();
		$this->set('products', $lista);	
	}

}
