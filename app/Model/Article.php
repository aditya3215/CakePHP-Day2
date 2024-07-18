<?php 

/*
* BOC: Article Model
* PURPOSE: This model represents the Article table in the database and contains the logic
*          for interacting with Article data. It includes validation rules for Article attributes.
* CREATED BY: Aditya Verma ON 17-July-2024
* PMS ID: #151708
*/
App::uses('AppModel','Model');

class Article extends AppModel{

    // Belongs to Association of Article Table with category Table
    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id'
        )
    );

    // Server side Validation for saving Article and Editing it
    public $validate = array(
        'articles_name' => array(
            'rule' => 'notBlank',
            'message' => 'Article name is required!'
        ),
        'articles_description' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Description cannot be empty'
            ),
        ),
        'category_id' => array(
            'rule' => 'notBlank',
            'message' => 'Please Select a Category'
        )
    ); 
}
/*
* EOC: Article Model
* PURPOSE: This model represents the Article table in the database and contains the logic
*          for interacting with Article data. It includes validation rules for Article attributes.
* CREATED BY: Aditya Verma ON 17-July-2024
* PMS ID: #151708
*/
?>