<?php 
class CountriesController extends AppController {
	public $recursive = 1;
	var $name = 'Countries';
   	var $scaffold;

    public $paginate = array(
        'limit' => 25,
        'conditions' => array('status' => '1'),
        'order' => array('Country.name' => 'asc' ) 
    );
     
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','add'); 
    }
     
 
 
    public function index() {
        $this->paginate = array(
            'limit' => 6,
            'order' => array('Country.name' => 'asc' )
        );
        $countries = $this->paginate('Country');
        $this->set(compact('countries'));
    }
 
 
    public function add() {
        if ($this->request->is('post')) {
                 
            $this->Country->create();
			if ($this->Country->save($this->request->data)) {
                $this->Session->setFlash(__('The country has been created'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The country could not be created. Please, try again.'));
            }   
        }
    }
 
    public function edit($id = null) {
 
            if (!$id) {
                $this->Session->setFlash('Please provide a country id');
                $this->redirect(array('action'=>'index'));
            }
 
            $user = $this->Country->findById($id);
            if (!$user) {
                $this->Session->setFlash('Invalid country ID Provided');
                $this->redirect(array('action'=>'index'));
            }
 
            if ($this->request->is('post') || $this->request->is('put')) {
                $this->Country->id = $id;
                if ($this->Country->save($this->request->data)) {
                    $this->Session->setFlash(__('The country has been updated'));
                    $this->redirect(array('action' => 'edit', $id));
                }else{
                    $this->Session->setFlash(__('Unable to update your country.'));
                }
            }
 
            if (!$this->request->data) {
                $this->request->data = $user;
            }
    }
 
    public function delete($id = null) {
         
        if (!$id) {
            $this->Session->setFlash('Please provide a country id');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->Country->id = $id;
        if (!$this->Country->exists()) {
            $this->Session->setFlash('Invalid country id provided');
            $this->redirect(array('action'=>'index'));
        }
        /*
		if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('Country deleted'));
            $this->redirect(array('action' => 'index'));
        }
		*/
		if($this->Country->delete($this->Country->id)){
				$this->Session->setFlash(__('Country deleted'));
            	$this->redirect(array('action' => 'index'));
			}else{
        	$this->Session->setFlash(__('Country was not deleted'));
		}
        $this->redirect(array('action' => 'index'));
    }
     
    
 
}

?>