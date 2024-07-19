<?php 
/*
*BOC: Category Controller class
* PURPOSE: Defining Controller for Category related functionality such as Add Category, Edit Category and List Category.
* CREATED BY: Aditya Verma ON 17-July-2024
* PM ID: #151708
*/

App::uses('Appcontroller','controller');

class CategoryController extends AppController{

    public $paginate = array(
        'limit' => 5, // Number of records per page
        'order' => array(
            'Category.date_added' => 'desc' // Order by created field descending
        )
    );

    // for authentication
    public function beforeFilter(){
        parent::beforeFilter();
        // $this->Auth->allow('index');
        // $this->Auth->allow('addCategory');
        // $this->Auth->allow('listCategory');
        // $this->Auth->allow('editCategory');
    }

    // Default method
    public function index(){
        $this->layout = 'plain';
        // Logging details
        if($this->Auth->user()){
            $user = $this->Auth->user();
            CakeLog::write('Debug', $user['id'].'/'.$user['name'].'/CategoryContoller/index()-Inside Index method.');
        }else{
            CakeLog::write('Debug', '_/_/CategoryContoller/index()-Inside Index Method.');
        }
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
                // Logging details
                if($this->Auth->user()){
                    $user = $this->Auth->user();
                    CakeLog::write('Debug', $user['id'].'/'.$user['name'].'/CategoryContoller/addCategory()-Category Created Successfully.');
                }else{
                    CakeLog::write('Debug', '_/_/CategoryContoller/addCategory()-Category Created Successfully.');
                }
                // Success Message
                $this->Flash->success(__('New Category Added!'));
            }
        }
    }

    // Method to list all category
    public function listCategory(){
        $this->layout = 'plain';
        $Categories = $this->paginate('Category');
        // Logging details
        if($this->Auth->user()){
            $user = $this->Auth->user();
            CakeLog::write('Debug', $user['id'].'/'.$user['name'].'/CategoryContoller/listCategory()-Inside list Category.');
        }else{
            CakeLog::write('Debug', '_/_/CategoryContoller/listCategory()-Inside list Category.');
        }
        $this->set('Category', $Categories);
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
                // Logging details
                if($this->Auth->user()){
                    $user = $this->Auth->user();
                    CakeLog::write('Debug', $user['id'].'/'.$user['name'].'/CategoryContoller/editCategory()-Category Details Edited Successfully.');
                }else{
                    CakeLog::write('Debug', '_/_/CategoryContoller/editCategory()-Category Details Edited Successfully.');
                }
                // If the blog is saved successfully then show success message
                $this->Flash->success(__('Category Edited!'));
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