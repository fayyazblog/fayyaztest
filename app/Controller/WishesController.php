<?php 
class WishesController extends AppController {
 
    public $paginate = array(
        'limit' => 25,
        'order' => array('Wish.wish' => 'asc' ) 
    );
     
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','add'); 
    }
     
 
 
    public function index() {
        $this->paginate = array(
            'limit' => 6,
            'order' => array('Wish.wish' => 'asc' )
        );
        $wishes = $this->paginate('Wish');
        $this->set(compact('wishes'));
    }
 
 
    public function add() {
        if ($this->request->is('post')) {
                 
            $this->Wish->create();
			if ($this->Wish->save($this->request->data)) {
                $this->Session->setFlash(__('The wish has been created'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The wish could not be created. Please, try again.'));
            }   
        }
    }
 
    public function edit($id = null) {
 
            if (!$id) {
                $this->Session->setFlash('Please provide a wish id');
                $this->redirect(array('action'=>'index'));
            }
 
            $user = $this->Wish->findById($id);
            if (!$user) {
                $this->Session->setFlash('Invalid wish ID Provided');
                $this->redirect(array('action'=>'index'));
            }
 
            if ($this->request->is('post') || $this->request->is('put')) {
                $this->Wish->id = $id;
                if ($this->Wish->save($this->request->data)) {
                    $this->Session->setFlash(__('The wish has been updated'));
                    $this->redirect(array('action' => 'edit', $id));
                }else{
                    $this->Session->setFlash(__('Unable to update your wish.'));
                }
            }
 
            if (!$this->request->data) {
                $this->request->data = $user;
            }
    }
 
    public function delete($id = null) {
         
        if (!$id) {
            $this->Session->setFlash('Please provide a wish id');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->Wish->id = $id;
        if (!$this->Wish->exists()) {
            $this->Session->setFlash('Invalid wish id provided');
            $this->redirect(array('action'=>'index'));
        }
        /*
		if ($this->User->saveField('status', 0)) {
            $this->Session->setFlash(__('Country deleted'));
            $this->redirect(array('action' => 'index'));
        }
		*/
		if($this->Wish->delete($this->Wish->id)){
				$this->Session->setFlash(__('Wish deleted'));
            	$this->redirect(array('action' => 'index'));
			}else{
        	$this->Session->setFlash(__('Wish was not deleted'));
		}
        $this->redirect(array('action' => 'index'));
    }
     
    
 
}

?>