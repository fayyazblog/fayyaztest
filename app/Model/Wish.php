<?php 
App::uses('AppModel', 'Model');
 
class Wish extends AppModel {
     
	public $displayField = 'wish';
    public $validate = array(
        'wish' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'A Wish is required',
                'allowEmpty' => false
            ),
             'unique' => array(
                'rule'    => array('isUniqueWish'),
                'message' => 'This Wish is already in use'
            )
        )
    );
     
        /**
     * Before isUniqueUsername
     * @param array $options
     * @return boolean
     */
    function isUniqueWish($check) {
 
        $wish = $this->find(
            'first',
            array(
                'fields' => array(
                    'Wish.id',
                    'Wish.wish'
                ),
                'conditions' => array(
                    'Wish.wish' => $check['wish']
                )
            )
        );
 
        if(!empty($wish)){
			if(@$this->data[$this->alias]['id'] == $name['Wish']['id']){
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