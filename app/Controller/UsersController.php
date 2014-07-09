<?php 
class UsersController extends AppController {
 	
	public $helpers = array('Js');
	var $components = array('RequestHandler');


	public	$uses	=	array('City','User','Country');
	public $recursive = 2;
    public $paginate 	=	array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
        'order' => array('User.username' => 'asc' ) 
    );
     
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','add','getcityajaxlist','imageNameExist','uploadifive'); 
    }
     
 
 
    public function login() {
         
        //if already logged-in, redirect
        if($this->Session->check('Auth.User')){
            $this->redirect(array('action' => 'index'));      
        }
         
        // if we get the post information, try to authenticate
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->setFlash(__('Welcome, '. $this->Auth->user('username')));
                $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash(__('Invalid username or password'));
            }
        } 
    }
 
    public function logout() {
        $this->redirect($this->Auth->logout());
    }
 
    public function index() {
        $this->paginate = array(
            'limit' => 6,
            'order' => array('User.username' => 'asc' )
        );
        $users = $this->paginate('User');
		$this->set(compact('users'));
		
    }
 
 
    public function add($countryId	=	null) {
		
		
		$countries 	= ClassRegistry::init('Country')->find('list');
		$wishes 	= ClassRegistry::init('Wish')->find('list');
		//$wishes 	= ClassRegistry::init('Wishes')->find('list', array('fields' => array('Wish.id', 'Wish.wish')));
		$cities 	= ClassRegistry::init('City')->find('list');
		$this->set(compact('cities'));
		$this->set(compact('countries'));
		$this->set(compact('wishes'));
		
		//$citiesList = $this->City->find('all', array('conditions' => array('City.country_id =' => $countryId),'fields' => array('City.name')));
					//echo "<pre>"; print_r($citiesList); echo "</pre>"; die();
					
		
			if(!isset($countryId)){
        		if ($this->request->is('post')) {
                 
            $this->User->create();
			
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been created'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be created. Please, try again.'));
            }   
        }		
			}else{
					//$cities = $this->City->find('all', array( 'contain' => array('Plan') ));
					//$citoieList	=	$this->User->find('all', array( 'conditions' => array('City.name'),'recursive' => 1, 'fields' => array('country_id')));
					$citiesList = $this->City->find('list', array('conditions' => array('City.country_id =' => $countryId),'fields' => array('City.name')));
					//echo "<pre>"; print_r($citiesList); echo "</pre>"; die();
					$countryID	= $countryId;	
					$this->set(compact('countryID'));
					$this->set(compact('citiesList'));
					
					
				}
    }
 
    public function edit($id = null) {
		
			$countries 	= ClassRegistry::init('Country')->find('list');
			$wishes 	= ClassRegistry::init('Wish')->find('list');
			$cities 	= ClassRegistry::init('City')->find('list');
			$this->set(compact('cities'));
			$this->set(compact('countries'));
			$this->set(compact('wishes'));
 
            if (!$id) {
                $this->Session->setFlash('Please provide a user id');
                $this->redirect(array('action'=>'index'));
            }
 
            $user = $this->User->findById($id);
            if (!$user) {
                $this->Session->setFlash('Invalid User ID Provided');
                $this->redirect(array('action'=>'index'));
            }
 
            if ($this->request->is('post') || $this->request->is('put')) {
                $this->User->id = $id;
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been updated'));
                    $this->redirect(array('action' => 'edit', $id));
                }else{
                    $this->Session->setFlash(__('Unable to update your user.'));
                }
            }
 
            if (!$this->request->data) {
                $this->request->data = $user;
            }
    }
 
    public function delete($id = null) {
         
        if (!$id) {
            $this->Session->setFlash('Please provide a user id');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
     
    public function activate($id = null) {
         
        if (!$id) {
            $this->Session->setFlash('Please provide a user id');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'));
        $this->redirect(array('action' => 'index'));
    }
	
	public function getcityajaxlist($countryID	=	null){
			 
			$countryID	=	$this->request->data['User']['country_id'];
			$citiesList = $this->City->find('list', array('conditions' => array('City.country_id =' => $countryID),'fields' => array('City.name')));
			$this->set(compact('citiesList',$citiesList));
			$this->layout = 'ajax';
			
		}
	public function imageNameExist($uploadDir=null,$fileName=null){
			$uploadDir = '/UserLoginLogout/app/webroot/img/uploads/'; // Relative to the root and should match the upload folder in the uploader script
				$fileName	=	$_POST['filename'];
				if (file_exists($_SERVER['DOCUMENT_ROOT'] . $uploadDir . '/' . $fileName)){
					$imageResult	=	 1;
					$this->set(compact('imageResult',$imageResult));
					$this->layout = 'ajax';
					}else{
						$imageResult	=	 0;
						$this->set(compact('imageResult',$imageResult));
						$this->layout = 'ajax';
						}

		}
	public function uploadifive(){
			$uploadDir = '/UserLoginLogout/app/webroot/img/uploads/';
			$fileTypes = array('jpg', 'jpeg', 'gif', 'png');
			$verifyToken = md5('unique_salt' . $_POST['timestamp']);
			if (!empty($_FILES) && $_POST['token'] == $verifyToken){
				$tempFile   = $_FILES['Filedata']['tmp_name'];
				$uploadDir  = $_SERVER['DOCUMENT_ROOT'] . $uploadDir;
				$targetFile = $uploadDir . $_FILES['Filedata']['name'];
				$fileParts = pathinfo($_FILES['Filedata']['name']);
				if (in_array(strtolower($fileParts['extension']), $fileTypes)){
					move_uploaded_file($tempFile, $targetFile);
					$imageUploadResult	=	 1;
					$this->set(compact('imageUploadResult',$imageUploadResult));
					$this->layout = 'ajax';
					}else{
						//echo 'Invalid file type.';
						$imageUploadResult	=	 0;
						$this->set(compact('imageUploadResult',$imageUploadResult));
						$this->layout = 'ajax';
						}
					}

		}
	
	
 	
	
	
}

?>