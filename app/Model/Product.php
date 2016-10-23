<?php

class Product extends AppModel {




public $name = 'Product';

	public $belongsTo = [
        'Category' => [
            'className' => 'category',
            'foreignKey' => 'category_id'            
        ]
    ];
	
	public $validate = [
		'title' => 'notBlank',
        'long_description' => 'notBlank',
		'filename' => [
			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
			'uploadError' => [
				'rule' => 'uploadError',
				'message' => 'Ocorreu um erro ao enviar o seu arquivo.',
				'required' => FALSE,
				'allowEmpty' => TRUE,
			],
			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
			'mimeType' => [
				'rule' => ['mimeType', ['image/gif','image/png','image/jpg','image/jpeg']],
				'message' => 'Arquivo inválido. Somente imagens são permitidas.',
				'required' => FALSE,
				'allowEmpty' => TRUE,
			],
			// custom callback to deal with the file upload
			'processUpload' => [
				'rule' => 'processUpload',
				'message' => 'Ocorreu um erro ao processar o seu arquivo.',
				'required' => FALSE,
				'allowEmpty' => TRUE,
				'last' => TRUE,
			],
			'filesize' => [
				'rule' => ['filesize', '<=', '1MB'],
				'message' => 'O arquivo deve possuir no maximo 5 MB',
			]
		]
    ];



	/**
	 * Upload Directory relative to WWW_ROOT
	 * @param string
	 */
	public $uploadDir = 'img';

	/**
	 * Process the Upload
	 * @param array $check
	 * @return boolean
	 */
	public function processUpload($check=array()) {
		// deal with uploaded file
		if (!empty($check['filename']['tmp_name'])) {

			// check file is uploaded
			if (!is_uploaded_file($check['filename']['tmp_name'])) {
				return FALSE;
			}



			// build full filename
			$filename = WWW_ROOT . $this->uploadDir . DS . 'product-' . date('Ymd-His') . rand() . '.'.pathinfo($check['filename']['name'], PATHINFO_EXTENSION);
			// $filename = WWW_ROOT . $this->uploadDir . DS . 'product' . date('His') . Inflector::slug(pathinfo($check['filename']['name'], PATHINFO_FILENAME)).'.'.pathinfo($check['filename']['name'], PATHINFO_EXTENSION);



			// try moving file
			if (!move_uploaded_file($check['filename']['tmp_name'], $filename)) {
				return FALSE;

			// file successfully uploaded
			} else {
				// save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
				$this->data[$this->alias]['filepath'] = str_replace(DS, "/", str_replace(WWW_ROOT, "", $filename) );
			}
		} else {
			echo 'ENTROU';
			//$this->data[$this->alias]['filepath'] = 'img/noimage.jpg'; 
		}

		return TRUE;
	}



	/**
	 * Before Save Callback
	 * @param array $options
	 * @return boolean
	 */
	public function beforeSave($options = array()) {
		// a file has been uploaded so grab the filepath
		if (!empty($this->data[$this->alias]['filepath'])) {
			$this->data[$this->alias]['filename'] = $this->data[$this->alias]['filepath'];
		}
		
		return parent::beforeSave($options);
	}


	/**
	 * Before Validation
	 * @param array $options
	 * @return boolean
	 */
	public function beforeValidate($options = array()) {
		// ignore empty file - causes issues with form validation when file is empty and optional
		if (!empty($this->data[$this->alias]['filename']['error']) && $this->data[$this->alias]['filename']['error']==4 && $this->data[$this->alias]['filename']['size']==0) {
			unset($this->data[$this->alias]['filename']);
		}

		parent::beforeValidate($options);
	}

//public $actsAs = ['Locale.Locale'];



}

