<?php


App::uses('AppController', 'Controller');



class ProductsController extends AppController {
	//public $uses = array('Correios.Frete');

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index', 'filter', 'view');

		// Change layout for Ajax requests
	    if ($this->request->is('ajax')) {
	        $this->layout = 'ajax';
	    }
	}



	public function index() {

		$conditions = array('Product.active' => true);

		$this->paginate = ['limit' => 9, 'conditions' => $conditions];

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

		if ($this->request->is('post')) {
			$this->Product->create();

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



    public function purchase($id = null, $price = null){
    	$this->render(false);
    	$this->Session->delete('proposal_id');
    	$this->Session->delete('buyer');
    	$this->Session->delete('price');
    	$this->Session->delete('ceporigem');
    	$this->Product->id = $id;
    	if ($this->Product->field('user_id') == $this->Auth->user('id')) {
			$this->Flash->error('Ação Inválida. Você não pode comprar seus próprios produtos!!');
			$this->redirect($this->referer());
		}
    	if ($this->Product->exists()) {
	    	$this->Session->write('product_id', $id);
	    	$this->Session->write('buyer', $this->Auth->user('id'));
	    	$this->Session->write('user_id', $this->Product->field('user_id'));
	    	if ($price == null){
	    		$this->Session->write('price', $this->Product->field('price'));
	    	}	    	
	    	$this->redirect(['controller'=>'transactions','action' => 'checkout']);	    	
	    } else {
	    	$this->Flash->error('Produto Inexistente.');
	    }
    }

}
