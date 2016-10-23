<?php


App::uses('AppController', 'Controller');


class CategoriesController extends AppController {

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index');
	}


	public function index() {
		$categories = $this->paginate();
		if ($this->request->is('requested')) {
			return $categories;
		}
		$this->set('categories', $categories);	

	}

}
