<?php


//App::uses('AppController', 'Controller');



class UsersController extends AppController {
	public $helpers = ['Html', 'Form', 'Flash'];


	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('register');
		// $this->Auth->authError = ('Você precisa estar logado para acessar esta área.');
	}


	public function index() {
	
		
	}

	public function actions() {
	
		
	}



	public function login(){
		if ($this->request->is('post')) {
			if ($this->Auth->login()){
				$this->Session->write('User_id', $this->Auth->user('id'));
				$this->Session->write('User_name', $this->Auth->user('name'));
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error('Nome de usuario ou senha invalidos');
		}
		if ($this->Auth->user('id')){
			$this->redirect(['controller' => 'products', 'action' => 'index']);
		}		
	}

	

	public function logout(){
		if ($this->Session->valid()) {
		  $this->Session->destroy(); // Destrói		  
		}
		return $this->redirect($this->Auth->logout());
	}




	//Registrar Usuario
	public function register() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('Usuário cadastrado com sucesso.'));
				return $this->redirect(array('controller' => 'products' , 'action' => 'index'));
			} else {
				$this->Flash->error('Erro nos dados informados. Verifique abaixo');
			}
		}
		// $categories = $this->Product->Category->find('list');
		// $this->set(compact('categories'));
	}




	//Visualizar Usuario
	public function view($id = null) {
		$this->request->data = $this->User->read(null, $id);
		$dados = $this->User->findById($id);
		$this->set('user',$dados);
		if (!$this->User->exists()) {
			throw new NotFoundException('Usuário Inexistente');
		}	
		// $this->User->id = $id;
		// if((!$this->User->exists($id)) && !($this->User->id == $this->Auth->user('id')))  {
		// 	throw new Exception('Usuario Invalido');
		// }		
		// $this->request->data = $this->User->read(null, $id);
		
	}


	//Editar Usuario
	public function edit($id = null) {
		$this->User->id = $id;
		if((!$this->User->exists($id)) && !($this->User->id == $this->Auth->user('id')))  {
			throw new Exception('Usuario Invalido');
		}		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success('Dados alterados com sucesso.');
				$this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('ERRO!! Dados não alterados!!!');
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}

}
