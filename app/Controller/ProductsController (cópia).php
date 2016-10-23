<?php


App::uses('AppController', 'Controller');


class ProductsController extends AppController {

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('index');
    }


	public function index() {
		$conditions = array();
		//$userId = $this->Auth->user('id');

		// if ($this->Auth->user('role') != 'admin'){
		// 	$conditions['Exam.user_id'] =  $userId;			
		// }

		$this->paginate = ['conditions' => $conditions];

		$lista = $this->paginate();
		$this->set('products', $lista);	
	}





	public function add() {

		if ($this->request->is('post')) {
            if ($this->data['Image']) {
            	$this->Product->create(); //INSER
                $image = $this->data['Image']['image'];
                //allowed image types
                $imageTypes = array("image/gif", "image/jpeg", "image/png");
                //upload folder - make sure to create one in webroot
                $uploadFolder = "img/products";
                //full path to upload folder
                $uploadPath = WWW_ROOT . $uploadFolder;
               

                //check if image type fits one of allowed types
                foreach ($imageTypes as $type) {
                    if ($type == $image['type']) {
                      //check if there wasn't errors uploading file on serwer
                        if ($image['error'] == 0) {
                             //image file name
                            $imageName = $image['name'];
                            //check if file exists in upload folder
                            if (file_exists($uploadPath . '/' . $imageName)) {
  							                //create full filename with timestamp
                                $imageName = date('His') . $imageName;
                            }
                            //create full path with image name
                            $full_image_path = $uploadPath . '/' . $imageName;
                            //upload image to upload folder
                            if (move_uploaded_file($image['tmp_name'], $full_image_path)) {
                                $this->Flash->success('Arquivo salvo com sucesso');
                                $this->set('imageName',$imageName);
                                
                            } else {
                                $this->Session->setFlash('Houve um problema ao enviar a imagem. Tente novamente.');
                            }
                        } else {
                            $this->Session->setFlash('Erro ao enviar imagem');
                        }
                        break;
                    } else {
                        $this->Session->setFlash('Arquivo de imagem inválido');
                    }
                }
            }
        }
		$this->render('add');
	}


}
