<?php 
class CitiesController extends AppController {
 	var $name = 'Cities';
   	var $scaffold;
	 public function beforeFilter() {
			parent::beforeFilter();
			$this->Auth->allow('login','add'); 
		}
     
 
 
    public function index(){
				$countries = ClassRegistry::init('Countries')->find('list');
				$this->set(compact('countries'));
			}
 
 
    public function add(){
			if($this->request->is('post')){
					 $this->City->create();
					 //echo "<pre>"; print_r($this->request->data); echo "</pre>"; die();
					 if ($this->City->save($this->request->data)) {
                			$this->Session->setFlash(__('The city has been inserted'));
                			$this->redirect(array('action' => 'index'));
							}else{
								$this->Session->setFlash(__('The city could not be inserted. Please, try again.'));
								} 
				}
			}
 
    public function edit($id = null) {}
 
    public function delete($id = null) {
		}
     
    
 
}

?>