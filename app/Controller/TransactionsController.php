<?php


App::uses('AppController', 'Controller');


class TransactionsController extends AppController {
	public $uses = array('Correios.Frete');
	var $components = array('Boletos.BoletoBb');

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index', 'filter', 'view');

		// Change layout for Ajax requests
	    if ($this->request->is('ajax')) {
	        $this->layout = 'ajax';
	    }
	}



	public function index() {
		$conditions = array();

		if (AuthComponent::user('role') == 'admin'){
			$this->paginate = ['limit' => 20, 'order' => ['Transaction.id' => 'desc'],'conditions' => $conditions];
			$lista = $this->paginate();
			$this->set('transactions', $lista);
		} else {
			$this->Flash->error('Sem premissão para acessar esta área!');
		}		
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
		$this->LoadModel('Boleto');
		
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

			$rand_string = md5(uniqid(rand(), true));
			//$this->Session->write('token', $rand_string);

			//Salva dados na tabela "boletos"
			$this->User->id = $this->Session->read('buyer');
			$data_boleto = array(
				'token' => $rand_string,
				'value' => $this->Session->read('price') + $this->Session->read('frete'),
				'sacado' => $this->User->field('name') . ' ' . $this->User->field('surname'),
				'endereco1' => $this->User->field('address') . ', Nº ' . $this->User->field('number'),
				'endereco2' => $this->User->field('city') . '/' . $this->User->field('state')
			);
			$this->Boleto->create();
			$this->Boleto->save($data_boleto);


			//Salva dados na tabela "transactions"
			$data_transaction = array(
				'token' => $rand_string,
				'price' => $this->Session->read('price'),
				'frete' => $this->Session->read('frete'), 
				'product_id' => $this->Session->read('product_id'), 
				'user_id' => $this->Session->read('user_id'), 
				'buyer_id' => $this->Session->read('buyer'),
				'final_price' => $this->Session->read('price') + $this->Session->read('frete')
			);
			$this->Transaction->create();
			$this->Transaction->save($data_transaction);
			
			//Localiza o ID da transação através do token gerado, armazena-o em sessão e insere-o na tabela 'boletos'
			$tid = $this->Transaction->query("SELECT id FROM transactions WHERE token LIKE '$rand_string' ;");
			$this->Session->write('trans_id', $tid['0']['transactions']['id']);
			$this->Boleto->saveField('transaction_id', $tid['0']['transactions']['id']);
			//$this->Boleto->save();

			//Localiza o ID do boleto através do token gerado, armazena-o em sessão e insere-o na tabela 'transactions'
			$bid = $this->Boleto->query("SELECT id FROM boletos WHERE token LIKE '$rand_string' ;");
			$this->Session->write('boleto_id', $bid['0']['boletos']['id']);
			$this->Transaction->saveField('boleto_id', $bid['0']['boletos']['id']);
			//$this->Transaction->save();

			//Desativa o produto após a venda
			//$this->Product->saveField('active', 0);

			$this->redirect(['controller'=>'transactions','action' => 'checkout_boleto']);
								
	    }		
		
	}








	public function checkout_boleto() {
		$this->LoadModel('Product');
		$this->LoadModel('Proposal');
		$this->LoadModel('User');
		$this->LoadModel('Boleto');
		
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
			$this->Boleto->id = $this->Session->read('boleto_id');

			//$this->gera_boleto();
			$this->autoRender = false;
			$dadosBoleto = array(
			'sacado' => $this->Boleto->field('sacado'),
			'endereco1' => $this->Boleto->field('endereco1'),
			'endereco2' => $this->Boleto->field('endereco2'),
			'valor_cobrado' => $this->Boleto->field('value'),
			'pedido' => $this->Boleto->field('transaction_id') // Usado para gerar o número do documento e o nosso número.
			);
			$this->BoletoBb->render($dadosBoleto);
	    }		
		
	}





	public function mytransactions(){
		$conditions = array();
		$userId = $this->Auth->user('id');

		$conditions['Transaction.buyer_id'] =  $userId;			

		$this->paginate = ['limit' => 20, 'order' => ['Transaction.id' => 'desc'],'conditions' => $conditions];

		$lista = $this->paginate();
		$this->set('transactions', $lista);
	}





	public function print_boleto($id = null){
		$this->LoadModel('Boleto');
		$this->autoRender = false;

		$this->Boleto->id = $id;
		$this->Transaction->id = $this->Boleto->field('transaction_id');

		if ($this->Auth->user('id') == $this->Transaction->field('buyer_id')){
			$dadosBoleto = array(
				'sacado' => $this->Boleto->field('sacado'),
				'endereco1' => $this->Boleto->field('endereco1'),
				'endereco2' => $this->Boleto->field('endereco2'),
				'valor_cobrado' => $this->Boleto->field('value'),
				'pedido' => $this->Boleto->field('transaction_id') // Usado para gerar o número do documento e o nosso número.
			);
			$this->BoletoBb->render($dadosBoleto);
		} else {
			$this->Flash->error('Ação não permitida!!!');
		}

	}




	public function payment_confirm($id = null){
		$this->LoadModel('Product');

		if (AuthComponent::user('role') == 'admin'){
			$this->Transaction->id = $id;
			$this->Product->id = $this->Transaction->field('product_id');
			$this->Transaction->saveField('state', 1); 
			$this->Product->saveField('active', 0);
			$this->Flash->success('Pagamento Confirmado');
			$this->redirect($this->referer());
		} else {
			$this->Flash->error('Sem premissão para acessar esta área!');
		}		
	}



	public function tracking_code($id = null, $code = null){
		$this->Transaction->id = $id;

		if (AuthComponent::user('role') == 'admin'){
			if ($this->request->is('post')) {
				$this->Transaction->saveField('tracking_code', $code); 
				$this->Flash->success('Código informado corretamente para o pedido');
				$this->redirect(['controller'=>'transactions','action' => 'index']);
			}
		} else {
			$this->Flash->error('Sem premissão para acessar esta área!');
		}	
	}



}
