<?php 
App::uses('AppModel', 'Model');
 
class Country extends AppModel {
	var $hasMany  = 'City';
    public $validate = array(
        'name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'A Country Name is required',
                'allowEmpty' => false
            ),
             'unique' => array(
                'rule'    => array('isUniqueUsername'),
                'message' => 'This Country Name is already in use'
            )
        )
    );
     
        /**
     * Before isUniqueUsername
     * @param array $options
     * @return boolean
     */
    function isUniqueUsername($check) {
 
        $name = $this->find(
            'first',
            array(
                'fields' => array(
                    'Country.id',
                    'Country.name'
                ),
                'conditions' => array(
                    'Country.name' => $check['name']
                )
            )
        );
 
        if(!empty($name)){
			if(@$this->data[$this->alias]['id'] == $name['Country']['id']){
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