<?php

/*
* BOC: USER Model
* PURPOSE: This model represents the users table in the database and contains the logic 
*           for interacting with user data. It includes validation rules for user
*           attributes, associations with other models, and any custom methods related
*           to user data.
* CREATED BY: Aditya Verma ON 17-July-2024
* PM ID: #151708
*/

App::uses('AppModel','Model');
// code for password hashing
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel{

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {

            // making a object of BlowFishPasswordHasher to make convert password to hash
            $passwordHasher = new BlowfishPasswordHasher();

            // storing the has value in the password (Passing current password into hash)
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }

    // validation for Login 
    public $validate = array(
        'email' => array(
            'rule' => 'notBlank',
            'message' => 'Email is required!'
        ),
        'name' => array(
            'rule' => 'notBlank',
            'message' => 'Full Name is required!'
        ),
        'password' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Password be empty'
            ),
        )
    ); 
}

/*
* EOC: USER Model
* PURPOSE: This model represents the users table in the database and contains the logic 
*           for interacting with user data. It includes validation rules for user
*           attributes, associations with other models, and any custom methods related
*           to user data.
* CREATED BY: Aditya Verma ON 17-July-2024
* PM ID: #151708
*/

?>