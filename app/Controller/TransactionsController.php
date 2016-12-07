<?php


App::uses('AppController', 'Controller');


class TransactionsController extends AppController {
	public $uses = array('Correios.Frete');

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index', 'filter', 'view');

		// Change layout for Ajax requests
	    if ($this->request->is('ajax')) {
	        $this->layout = 'ajax';
	    }
	}



	public function index() {
		
	}



	public function checkout() {
		$this->LoadModel('Product');
		$this->LoadModel('Proposal');
		$this->LoadModel('User');
		
		if ($this->Session->read('proposal_id') != null){
			$this->Product->id = $this->Session->read('product_id');
			$this->Proposal->id = $this->Session->read('proposal_id');
			$this->set('product', $this->Product->findById($this->Proposal->field('product_id')));
			$this->set('proposal', $this->Proposal->findById($this->Session->read('proposal_id')));
		} else {
			$this->Product->id = $this->Session->read('product_id');
			$this->set('product', $this->Product->findById($this->Product->field('id')));
		}

		//CALCULO DO FRETE VIA WS CORREIOS
		if ($this->request->is('post')) {
			$this->User->id = $this->Product->field('user_id');
			$ceporigem = $this->User->field('cep');
			$this->Session->write('ceporigem', $ceporigem);
			$this->Frete->set($this->request->data);
			$cep = $this->request->data['Checkout']['cep'];
			$dados = ['conditions' => [
				'altura' => $this->Product->field('height'), 
				'comprimento' => $this->Product->field('length'), 
				'largura' => $this->Product->field('width'), 
				'peso' => ($this->Product->field('weight') / 1000), 
				'servicos' => ['PAC'], 
				'ceporigem' => $ceporigem, 
				'cep' => $cep
			]];
			$return = $this->Frete->find('all', $dados);
	        if ($return['0']['Frete']['Erro'] == 0){
	        	$this->Session->write('frete', $return['0']['Frete']['Valor']);
	        	$this->redirect(['controller'=>'transactions','action' => 'checkout_final']);
	        } else {
	        	$this->Flash->error($return['0']['Frete']['MsgErro']);
	        }
	    }		
	}



	public function checkout_final() {
		$this->LoadModel('Product');
		$this->LoadModel('Proposal');
		$this->LoadModel('User');
		
		if ($this->Session->read('proposal_id') != null){
			$this->Product->id = $this->Session->read('product_id');
			$this->Proposal->id = $this->Session->read('proposal_id');
			$this->set('product', $this->Product->findById($this->Proposal->field('product_id')));
			$this->set('proposal', $this->Proposal->findById($this->Session->read('proposal_id')));
		} else {
			$this->Product->id = $this->Session->read('product_id');
			$this->set('product', $this->Product->findById($this->Product->field('id')));
		}

		if ($this->request->is('post')) {
			$data = array(
				'price' => $this->Session->read('price'),
				'frete' => $this->Session->read('frete'), 
				'product_id' => $this->Session->read('product_id'), 
				'user_id' => $this->Session->read('user_id'), 
				'buyer_id' => $this->Session->read('buyer'),
				'final_price' => $this->Session->read('price') + $this->Session->read('frete')
			);


			$this->Transaction->create();
			$this->Transaction->save($data);
			


			//$this->Transaction->saveField('price', '1');


			// $this->Frete->set($this->request->data);
			// $cep = $this->request->data['Checkout']['cep'];
			// $dados = ['conditions' => [
			// 	'altura' => 2, 
			// 	'comprimento' => 17, 
			// 	'largura' => 11, 
			// 	'peso' => 2, 
			// 	'servicos' => ['PAC'], 
			// 	'ceporigem' => '74474-100', 
			// 	'cep' => $cep
			// ]];
			// $return = $this->Frete->find('all', $dados);
	  //       if ($return['0']['Frete']['Erro'] == 0){
	  //       	debug($return);
	  //       	$this->Session->write('frete', $return['0']['Frete']['ValorSemAdicionais']);

	  //       } else {
	  //       	$this->Flash->error($return['0']['Frete']['MsgErro']);
	  //       }
	    }
		
		
	}


	public function frete($cep) {
		if ($this->request->is('post')) {
			$this->Frete->set($this->request->data);
			$cep = $this->request->data['Frete']['cep'];
			$dados = ['conditions' => [
				'altura' => 2, 
				'comprimento' => 16, 
				'largura' => 11, 
				'peso' => 30, 
				'servicos' => ['PAC'], 
				'ceporigem' => '74474-100', 
				'cep' => $cep
			]];
			$return = $this->Frete->find('all', $dados);

			// $return = $this->Frete->find('all',array('conditions'=>array(
		 //        'altura'=>'10',
		 //        'comprimento'=>30,
		 //        'largura'=>30,
		 //        'peso'=>9,
		 //        'servicos'=>['PAC','SEDEX'],
		 //        'ceporigem'=>95703072,
		 //        'cep'=>27511300
	 //       )));
	        $this->set('frete', $return);
	    }
	    $this->set(compact('frete'));
    }

}
