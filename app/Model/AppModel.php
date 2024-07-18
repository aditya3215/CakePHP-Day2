<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    //setting associativity with Category table
    // public $belongsTo = array(
    //     'Category' => array(
    //         'className' => 'Category',
    //         'foreignKey' => 'category_id'
    //     )
    // );

    // // Validation for saving article and editing it
    // public $validate = array(
    //     'articles_name' => array(
    //         'rule' => 'notBlank',
    //         'message' => 'Article name is required!'
    //     ),
    //     'articles_description' => array(
    //         'notBlank' => array(
    //             'rule' => 'notBlank',
    //             'message' => 'Description cannot be empty'
    //         ),
    //     ),
    //     'category_id' => array(
    //         'rule' => 'notBlank',
    //         'message' => 'Please Select a Category'
    //     )
    // ); 
}
