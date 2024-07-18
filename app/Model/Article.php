<?php 

App::uses('AppModel','Model');

class Article extends AppModel{

    
    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id'
        )
    );

    // Validation for saving article and editing it
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

?>