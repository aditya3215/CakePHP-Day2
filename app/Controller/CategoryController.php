<?php 
/*
*BOC: Category Controller class
* PURPOSE: Defining Controller for Category related functionality such as Add Category, Edit Category and List Category
* CREATED BY: Aditya Verma ON 17-July-2024
* PM ID: #151708
*/

App::uses('Appcontroller','controller');

class CategoryController extends AppController{
    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('index');
        $this->Auth->allow('addCategory');
        $this->Auth->allow('listCategory');
        $this->Auth->allow('editCategory');
    }

    // Default method
    public function index(){
        
    }

    // Method to add new category
    public function addCategory(){
        $this->layout = 'plain';
    }

    // Method to list all category
    public function listCategory(){

    }

    // Method to Edit Category Details
    public function editCategory(){

    }
}

/*
*EOC: Category Controller class
* PURPOSE: Defining Controller for Category related functionality such as Add Category, Edit Category and List Category
* CREATED BY: Aditya Verma ON 17-July-2024
* PM ID: #151708
*/


?>