<?php 
/*
*BOC: ARTICLE Controller class
* PURPOSE: Defining Controller for Article related functionality such as Add Article, Edit Article and List Article.
* CREATED BY: Aditya Verma ON 17-July-2024
* PM ID: #151708
*/

App::uses('CakeEmail', 'Network/Email');

class ArticleController extends AppController{

    public $paginate = array(
        'limit' => 2, // Number of records per page
        'order' => array(
            'Article.date_added' => 'desc' // Order by created field descending
        )
    );

    // for authentication
    public function beforeFilter(){
        parent::beforeFilter();
        // $this->Auth->allow('index');
        // $this->Auth->allow('addArticle');
        // $this->Auth->allow('listArticle');
        // $this->Auth->allow('editArticle');
    }

    // Default method
    public function index(){
        $this->layout = 'plain';
        // Logging details
        if($this->Auth->user()){
            $user = $this->Auth->user();
            CakeLog::write('Debug', $user['id'].'/'.$user['name'].'/ArticleContoller/index()-Inside Index Method.');
        }else{
            CakeLog::write('Debug', '_/_/ArticleContoller/index()-Inside Index Method.');
        }
    }

    // Method to add new Article
    public function addArticle(){
        $this->layout = 'plain';
        if ($this->request->is('Post')) {
            $this->request->data['Article']['Author'] = trim($this->Auth->user('id'));
            // Removing extra spaces from the data : Triming 
            foreach ($this->request->data['Article'] as $key => $value) {
                if (is_string($value)) {
                    $this->request->data['Article'][$key] = trim($value);
                }
            }
            if ($this->Article->save($this->request->data)) {
                $this->sendArticleCreatedEmail($this->request->data);
                // Logging details
                if($this->Auth->user()){
                    $user = $this->Auth->user();
                    CakeLog::write('debug', $user['id'].'/'.$user['name'].'/ArticleContoller/addArticle()-Article Created Successfully.');
                }else{
                    CakeLog::write('debug', '_/_/ArticleContoller/addArticle()-Article Created Successfully.');
                }
                $this->Flash->success(__('Article Created Successfully and Email sent!'));
            }
        }

         // Fetch categories
        $categories = $this->Article->Category->find('list', array(
            'fields' => array('Category.id', 'Category.categories_name'),
            'order' => array('Category.categories_name' => 'ASC')
        ));
        $user = $this->Auth->user();
        $this->set(compact('user'));
        // Set categories to the view
        $this->set('categories', $categories);
    }

    // Method to list all Article
    public function listArticle(){
        $this->layout = 'plain';
    
        // Paginate the Article model
        $this->paginate['contain'] = array('Category');
        $articles = $this->paginate('Article');

        // Logging details
        if($this->Auth->user()){
            $user = $this->Auth->user();
            CakeLog::write('Debug', $user['id'].'/'.$user['name'].'/ArticleContoller/listArticle()-Inside Listing Articles.');
        }else{
            CakeLog::write('Debug', '_/_/ArticleContoller/listArticle()-Inside Listing Articles.');
        }
        
        $this->set('Article', $articles);
    }

    // Method to Edit Article Details
    public function editArticle($id){
        $this->layout = 'plain';
        // checking if the Request type is POST or PUT
        if ($this->request->is(array('post', 'put'))) {

            $this->Article->id = $id;
            // trimming all the values before storing
            foreach ($this->request->data['Article'] as $key => $value) {
                if (is_string($value)) {
                    $this->request->data['Article'][$key] = trim($value);
                }
            }
            if ($this->Article->save($this->request->data)) {
                $this->sendArticleEditEmail($this->Article->findById($id));
                // Logging details
                if($this->Auth->user()){
                    $user = $this->Auth->user();
                    CakeLog::write('Debug', $user['id'].'/'.$user['name'].'/ArticleContoller/editArticle()-Article details Editted (Article ID: '.$id.')');
                }else{
                    CakeLog::write('Debug', '_/_//ArticleContoller/editArticle()-Article details Editted (Article ID: '.$id.')');
                }
                // If the blog is saved successfully then show success message
                $this->Flash->success(__('Article Edited Successfully and Email sent!'));
            }
            $this->Flash->error(__('Unable to update your post.'));
        }
        // if the response is empty then Re-store the previous data.
        if (!$this->request->data) {
            $this->request->data = $this->Article->findById($id);
        }

         // Fetch categories
        $categories = $this->Article->Category->find('list', array(
            'fields' => array('Category.id', 'Category.categories_name'),
            'order' => array('Category.categories_name' => 'ASC')
        ));

        // Set categories to the view
        $this->set('categories', $categories);
    }
}

/*
*EOC: ARTICLE Controller class
* PURPOSE: Defining Controller for Article related functionality such as Add Article, Edit Article and List Article
* CREATED BY: Aditya Verma ON 17-July-2024
* PM ID: #151708
*/


?>