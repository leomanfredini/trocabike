<?php


App::uses('AppController', 'Controller');


class ProposalsController extends AppController {


	public function index() {
		$conditions = array();
		$userId = $this->Auth->user('id');

		//if ($this->Auth->user('role') != 'admin'){
			$conditions['Proposal.buyer_id'] =  $userId;			

		//}

		$this->paginate = ['limit' => 10, 'order' => ['Proposal.date' => 'desc'],'conditions' => $conditions];

		$lista = $this->paginate();
		$this->set('proposals', $lista);
	}



	public function send($id = null) {
		$this->LoadModel('Product');
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException($this->Flash->error('PRODUTO INEXISTENTE'));
		} 
		if ($this->Product->field('user_id') == $this->Auth->user('id')) {
			throw new Exception($this->Flash->error('Ação Inválida. Você não pode enviar propostas aos seus próprios produtos!!'));
		}
		if ($this->Product->field('active') == 0) {
			throw new Exception('Este produto não pode receber propostas!!');
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Proposal->saveAll($this->request->data)) {
				$this->Flash->success('Proposta enviada.');
				$this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('ERRO!! A proposta não pôde ser enviada!!!');
			}
		} else {			
			$this->set('product', $this->Product->findById($id));
		}		
	}



	public function product_proposals($id = null) {
		$conditions = array();
		$userId = $this->Auth->user('id');

		$conditions['Proposal.user_id'] =  $userId;	
		$conditions['Proposal.product_id'] =  $id;			

		$this->paginate = ['limit' => 10, 'order' => ['Proposal.date' => 'desc'],'conditions' => $conditions];

		$lista = $this->paginate();
		if ($lista == null) {
			$this->set('proposals', $lista);
		} else {
			return null;
		} 

	}

	

	public function accept($id = null) {
		$this->Proposal->id = $id;
		//echo $this->Proposal->field('state');
		if (!$this->Proposal->exists()) {
			throw new NotFoundException($this->Flash->error('Proposta Inexistente!!!'));
		} else if ($this->Proposal->field('user_id') != $this->Auth->user('id')) {
			throw new Exception($this->Flash->error('Ação Não Permitida!!'));
		} else if ($this->Proposal->field('state') != 1) {			
			throw new Exception($this->Flash->error('Esta proposta já foi finalizada.'));
		} else {
			$this->Flash->success('Proposta aceita.');
			$this->Proposal->saveField('state', 2);
		}
		$this->redirect($this->referer());
	}



	public function reject($id = null) {
		$this->Proposal->id = $id;
		//echo $this->Proposal->field('state');
		if (!$this->Proposal->exists()) {
			throw new NotFoundException($this->Flash->error('Proposta Inexistente!!!'));
		} else if ($this->Proposal->field('user_id') != $this->Auth->user('id')) {
			throw new Exception($this->Flash->error('Ação Não Permitida!!'));
		} else if ($this->Proposal->field('state') != 1) {			
			throw new Exception($this->Flash->error('Esta proposta já foi finalizada.'));
		} else {
			$this->Flash->success('Proposta ' . $id . ' rejeitada.');
			$this->Proposal->saveField('state', 0);
		}
		$this->redirect($this->referer());
	}

}
