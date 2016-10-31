<?php

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {


public $validate = [
		'name' => [
			'required' => [
				'rule' => 'notBlank',
				'message' => 'Insira seu primeiro nome',
			],			
		],

		'surname' => [
			'required' => [
				'rule' => 'notBlank',
				'message' => 'Insira seu sobrenome',
			],			
		],
		
		'username' => [
			'required' => [
				'rule' => 'notBlank',
				'message' => 'Insira um nome de usuário',
			],
			'unique' => [
				'rule' => 'isUnique',
				'message' => 'Este nome de usuário já existe',
				'required' => 'create',
			]
		],
		
		'password' => [
			'required' => [
				'rule' => 'notBlank',
				'message' => 'Insira uma senha',
			],
			'length' => [
				'rule' => ['minLength', 6],
				'message' => 'A senha deve possuir no mínimo 6 caracteres',
			],
		],

		'email' => [
			'required' => [
				'rule' => 'notBlank',
				'message' => 'Insira um endereço de email',
			],
		],

		'address' => [
			'required' => [
				'rule' => 'notBlank',
				'message' => 'Rua, Avenida, Travessa, etc',
			],
		],

		'number' => [
			'required' => [
				'rule' => 'notBlank',				
			],
		],


		'district' => [
			'required' => [
				'rule' => 'notBlank',
				'message' => 'Insira seu bairro',
			],
		],

		'city' => [
			'required' => [
				'rule' => 'notBlank',
				'message' => 'Insira usua cidade',
			],
		],

		'state' => [
			'required' => [
				'rule' => 'notBlank',
				'message' => 'Selecione seu estado',
			],
		],

		'cep' => [
			'required' => [
				'rule' => 'notBlank',
				'message' => 'Insira o CEP',
			],
		],

		'cpf' => [
			'required' => [
				'rule' => 'notBlank',
				'message' => 'CPF Inválido'
			],
			// 'validaCPF' => [
			// 	'rule' =>  'validaCPF',
			// 	'message' => 'CPF Invalido'
			// ]
		],

		'password_confirm' => [
			'required' => [
				'rule' => 'notBlank',
				'message' => 'Confirme sua senha',
			],
			'equalFields' => [
				'rule' => ['equalFields', 'password'],
				'message' => 'Senhas não Conferem'
			]
		],	

		'password_update' => ['rule' => 'blank',
        'on' => 'create'],		

		'password_confirm_update' => [
			'equalFields' => [
				'rule' => ['equalFields', 'password_update'],
				'message' => 'Senhas não Conferem',
				'requred' => false
			]					
		],	



	];

	//Hash de senha
	public function beforeSave($options=[]) {	

		if (isset($this->data[$this->alias]['password'])) {
			$hasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $hasher->hash($this->data[$this->alias]['password']);
		}

		if (isset($this->data[$this->alias]['password_update']) && !empty($this->data[$this->alias]['password_update'])) {
			$hasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $hasher->hash($this->data[$this->alias]['password_update']);
		}

		return true;
	}


	//Funçao para validar iguardade de dois campos
	public function equalFields($check,$otherfield) 
    { 
        //get name of field 
        $fname = ''; 
        foreach ($check as $key => $value){ 
            $fname = $key; 
            break; 
        } 
        return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname]; 
    } 




	public static function validaCPF($check) {
		$check = trim($check);
		// sometimes the user submits a masked CNPJ
		if (preg_match('/^\d\d\d.\d\d\d.\d\d\d\-\d\d/', $check)) {
			$check = str_replace(array('-', '.', '/'), '', $check);
		} elseif (!ctype_digit($check)) {
			return false;
		}
		if (strlen($check) != 11) {
			return false;
		}
		// repeated values are invalid, but algorithms fails to check it
		for ($i = 0; $i < 10; $i++) {
			if (str_repeat($i, 11) === $check) {
				return false;
			}
		}
		$dv = substr($check, -2);
		for ($pos = 9; $pos <= 10; $pos++) {
			$sum = 0;
			$position = $pos + 1;
			for ($i = 0; $i <= $pos - 1; $i++, $position--) {
				$sum += $check[$i] * $position;
			}
			$div = $sum % 11;
			if ($div < 2) {
				$check[$pos] = 0;
			} else {
				$check[$pos] = 11 - $div;
			}
		}
		$dvRight = $check[9] * 10 + $check[10];
		return ($dvRight == $dv);
	}






}

