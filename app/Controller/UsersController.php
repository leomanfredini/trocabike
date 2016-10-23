<?php


//App::uses('AppController', 'Controller');


class UsersController extends AppController {


	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('register');
	}


	public function index() {
	
		
	}



	public function view($id = null) {
		$this->User->id = $id;
		if(!$this->User->exists($id)) {
			throw new Exception('Usuario Invalido');
		}
		$this->set('user', $this->User->findById($id));
		
	}



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



	public function login(){
		if ($this->request->is('post')) {
			if ($this->Auth->login()){
				$this->Session->write('User_id', $this->Auth->user('id'));
				$this->Session->write('User_name', $this->Auth->user('name'));
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error('Nome de Usuario ou senha invalidos');
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

}
