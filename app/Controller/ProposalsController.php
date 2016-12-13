<?php


App::uses('AppController', 'Controller');


class ProposalsController extends AppController {


	public function index() {
		$conditions = array();
		$userId = $this->Auth->user('id');

		$conditions['Proposal.buyer_id'] =  $userId;			

		$this->paginate = ['limit' => 20, 'order' => ['Proposal.date' => 'desc'],'conditions' => $conditions];

		$lista = $this->paginate();
		$this->set('proposals', $lista);
	}



	public function send($id = null) {
		$this->LoadModel('Product');
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			$this->Flash->error('PRODUTO INEXISTENTE');
			$this->redirect($this->referer());
		} 
		if ($this->Product->field('user_id') == $this->Auth->user('id')) {
			$this->Flash->error('Ação Inválida. Você não pode enviar propostas aos seus próprios produtos!!');
			$this->redirect($this->referer());
		}
		if ($this->Product->field('active') == 0) {
			$this->Flash->error('Este produto não pode receber propostas!!');
			$this->redirect($this->referer());
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Proposal->saveAll($this->request->data)) {
				$this->Flash->success('Proposta enviada com sucesso.');
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
		$this->set('proposals', $lista);
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



	public function purchase($id = null){
		$this->Session->delete('proposal_id');
		$this->Session->delete('product_id');
		$this->Session->delete('price');
		$this->Session->delete('buyer');
		$this->Session->delete('frete');
		$this->Session->delete('ceporigem');
		$this->LoadModel('Product');
		$this->Proposal->id = $id;
		$this->Product->id = $this->Proposal->field('product_id');

		if (!$this->Proposal->exists()) {
			throw new NotFoundException($this->Flash->error('Proposta Inexistente!!!'));
		}
		if ($this->Proposal->field('state') != 2) {
			throw new NotFoundException($this->Flash->error('Operação não permitida para esta proposta.'));
		}
		if ($this->Proposal->field('buyer_id') != $this->Auth->user('id')) {
			throw new Exception($this->Flash->error('Esta proposta não pertence ao seu usuário.'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			//$this->Session->write('user_id', $this->Product->field('user_id'));
			$this->Session->write('product_id', $this->Proposal->field('product_id'));
	    	$this->Session->write('buyer', $this->Auth->user('id'));
	    	$this->Session->write('price', $this->Proposal->field('price'));
	    	$this->Session->write('proposal_id', $this->Proposal->field('id'));
	    	$this->Session->write('frete', 0);
	    	$this->Session->write('user_id', $this->Product->field('user_id'));
	    	$this->redirect(['controller'=>'transactions','action' => 'checkout']);
		} else {
			$this->set('product', $this->Product->findById($this->Proposal->field('product_id')));
			$this->set('proposal', $this->Proposal->findById($id));
		}

	}

}
