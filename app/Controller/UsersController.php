<?php


//App::uses('AppController', 'Controller');



class UsersController extends AppController {
	public $helpers = ['Html', 'Form', 'Flash'];
	public $components = ['Recaptcha.Recaptcha'];


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
			// Destrói	a sessão
			$this->Session->destroy(); 	  
		}
		return $this->redirect($this->Auth->logout());
	}




	//Registrar Usuario
	public function register() {
		if ($this->request->is('post')) {
			//Valida a verificação reCaptcha
			if ($this->Recaptcha->verify()) {
				$this->User->create();
				if ($this->User->save($this->request->data)) {
					$this->Flash->success(__('Usuário cadastrado com sucesso.'));
					return $this->redirect(array('controller' => 'products' , 'action' => 'index'));
				} else {
					$this->Flash->error('Erro nos dados informados. Verifique abaixo');
				}
			} else {
				//Erro retornado da API reCaptcha, caso falhe a validação
				$this->Flash->error($this->Recaptcha->error);
			}
		}
		
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
				$this->redirect(['controller' => 'users', 'action' => 'actions']);
			} else {
				$this->Flash->error('ERRO!! Dados não alterados!!!');
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}


	public function view_user($id = null) {
		if (AuthComponent::user('role') == 'admin'){
			$this->User->id = $id;
			$this->request->data = $this->User->read(null, $id);
			$dados = $this->User->findById($id);
			$this->set('user',$dados);
			if (!$this->User->exists()) {
			throw new NotFoundException('Usuário Inexistente');
		}	
		} else {
			$this->Flash->error('Sem premissão para acessar esta área!');
			$this->redirect($this->referer());
		}	


		
	}




}
