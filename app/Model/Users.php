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

    // validation for Login 
    public $validate = array(
        'email' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'User name is Required!'
            )
        ),
        'password'=> array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Password is Required!'
            )
        ),
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