<?php

/*
* BOC: CATEGORY Model
* PURPOSE: This model represents the categories table in the database and contains the logic
*          for interacting with category data. It includes validation rules for category attributes.
* CREATED BY: Aditya Verma ON 17-July-2024
* PM ID: #151708
*/

App::uses('AppModel','Model');

class Category extends AppModel{

    // validation functions for category inputs on Adding category and Editing category page
    public $validate = array(
        'categories_name' => array(
            'rule' => 'notBlank',
            'message' => 'Category Name is required!'
        ),
        'categories_slug' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Slug is required and must be Unique'
            ),
            'isUniqueSlug' => array(
                'rule' => 'isUniqueSlug',
                'message' => 'Slug must be unique!'
            )
        )
    ); 
    
    // Function to check if slug is Unique.
    public function isUniqueSlug($check) {
        $slug = array_values($check)[0];
        $conditions = array('Category.categories_slug' => $slug);
        
        if (!empty($this->data[$this->alias]['id'])) {
            $conditions['Category.id !='] = $this->data[$this->alias]['id'];
        }
        
        return !$this->hasAny($conditions);
    }

    // setting associativity with article Table
    public $hasMany = array(
        'Article' => array(
            'className' => 'Article',
            'foreignKey' => 'category_id'
        )
    );
}

/*
* EOC:  CATEGORY Model
* PURPOSE: This model represents the categories table in the database and contains the logic
*          for interacting with category data. It includes validation rules for category attributes.
* CREATED BY: Aditya Verma ON 17-July-2024
* PM ID: #151708
*/


?>