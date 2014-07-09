<?php 
App::uses('AuthComponent', 'Controller/Component');
 
class City extends AppModel {
     var $belongsTo = 'Country';
    public $validate = array(
        'name' => array(
							'nonEmpty' => array(
													'rule' => array('notEmpty'),
													'message' => 'A City Name is required',
													'allowEmpty' => false
													),
							 'unique' => array(
												'rule'    => array('isUniqueCityname'),
												'message' => 'This City Name is already in System'
												)
        				),
		'country_id' => array(
								'notEmpty' => array(
									'rule' => array('notEmpty'),
									'message' => 'please Select the country',
									'allowEmpty' => false
								),
							)
    );
    function isUniqueCityname($check) {
 		$name = $this->find( 'first',
            array(
                'fields' => array(
                    'City.id',
					'City.country_id',
                    'City.name'
                ),
                'conditions' => array(
                    'City.name' => $check['name']
                )
            )
        );
 
        if(!empty($name)){
			if(@$this->data[$this->alias]['id'] == $name['City']['id']){
                return true; 
            }else{
                return false; 
            }
        }else{
            return true; 
        }
    }
	
	public function beforeSave($options = array()) {
			return parent::beforeSave($options);
		}
 
}
?>