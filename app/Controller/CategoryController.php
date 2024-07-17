<?php 
/*
*BOC: Category Controller class
* PURPOSE: Defining Controller for Category related functionality such as Add Category, Edit Category and List Category.
* CREATED BY: Aditya Verma ON 17-July-2024
* PM ID: #151708
*/

App::uses('Appcontroller','controller');

class CategoryController extends AppController{

    // for authentication
    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('index');
        $this->Auth->allow('addCategory');
        $this->Auth->allow('listCategory');
        $this->Auth->allow('editCategory');
    }

    // Default method
    public function index(){
        $this->layout = 'plain';
    }

    // Method to add new category
    public function addCategory(){
        $this->layout = 'plain';
        if ($this->request->is('Post')) {
            // Adding user_id to the post Request Data
            // $this->request->data['Category']['user_id'] = trim($this->Auth->user('id'));
            foreach ($this->request->data['Category'] as $key => $value) {
                if (is_string($value)) {
                    $this->request->data['Category'][$key] = trim($value);
                }
            }
            if ($this->Category->save($this->request->data)) {
                $this->Flash->success(__('Your post has been saved.'));
                return $this->redirect(array('controller' => 'Category', 'action' => 'listcategory'));
            }
        }
    }

    // Method to list all category
    public function listCategory(){
        $this->layout = 'plain';
        $this->set('Category',$this->Category->find('all'));
    }

    // Method to Edit Category Details
    public function editCategory($id){
        $this->layout = 'plain';

        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
        // Storing the post data with the given ID
        $Category = $this->Category->findById($id);
        if (!$Category) {
            throw new NotFoundException(__('Invalid post'));
        }
        // checking if the Request type is POST or PUT
        if ($this->request->is(array('post', 'put'))) {
            $this->Category->id = $id;
            if ($this->Category->save($this->request->data)) {
                // If the blog is saved successfully then show success message
                $this->Flash->success(__('Your post has been updated.'));
                return $this->redirect(array('action' => 'listcategory'));
            }
            $this->Flash->error(__('Unable to update your post.'));
        }
        // if the response is empty then Re-store the previous data.
        if (!$this->request->data) {
            $this->request->data = $Category;
        }
    }
}

/*
*EOC: Category Controller class
* PURPOSE: Defining Controller for Category related functionality such as Add Category, Edit Category and List Category
* CREATED BY: Aditya Verma ON 17-July-2024
* PM ID: #151708
*/


?>