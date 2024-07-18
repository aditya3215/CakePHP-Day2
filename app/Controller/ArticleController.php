<?php 
/*
*BOC: ARTICLE Controller class
* PURPOSE: Defining Controller for Article related functionality such as Add Article, Edit Article and List Article.
* CREATED BY: Aditya Verma ON 17-July-2024
* PM ID: #151708
*/

App::uses('Appcontroller','controller');

class ArticleController extends AppController{

    public $paginate = array(
        'limit' => 5, // Number of records per page
        'order' => array(
            'Article.date_added' => 'desc' // Order by created field descending
        )
    );

    // for authentication
    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('index');
        $this->Auth->allow('addArticle');
        $this->Auth->allow('listArticle');
        $this->Auth->allow('editArticle');
    }

    // Default method
    public function index(){
        $this->layout = 'plain';
    }

    // Method to add new Article
    public function addArticle(){
        $this->layout = 'plain';
        if ($this->request->is('Post')) {
            foreach ($this->request->data['Article'] as $key => $value) {
                if (is_string($value)) {
                    $this->request->data['Article'][$key] = trim($value);
                }
            }
            if ($this->Article->save($this->request->data)) {
                $this->Flash->success(__('Your Article has been saved.'));
                return $this->redirect(array('controller' => 'Article', 'action' => 'listarticle'));
            }
        }

         // Fetch categories
        $categories = $this->Article->Category->find('list', array(
            'fields' => array('Category.id', 'Category.categories_name'),
            'order' => array('Category.categories_name' => 'ASC')
        ));

        // Set categories to the view
        $this->set('categories', $categories);

    }

    // Method to list all Article
    public function listArticle(){
        $this->layout = 'plain';
    
        // Paginate the Article model
        $this->paginate['contain'] = array('Category');
        $articles = $this->paginate('Article');
        
        $this->set('Article', $articles);
    }

    // Method to Edit Article Details
    public function editArticle($id){
        $this->layout = 'plain';

        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
        // Storing the post data with the given ID
        $Article = $this->Article->findById($id);
        if (!$Article) {
            throw new NotFoundException(__('Invalid post'));
        }

        // trimming all the values before storing
        foreach ($this->request->data['Article'] as $key => $value) {
            if (is_string($value)) {
                $this->request->data['Article'][$key] = trim($value);
            }
        }

        $this->Article->id = $id;

        // checking if the Request type is POST or PUT
        if ($this->request->is(array('post', 'put'))) {
            $this->Article->id = $id;
            if ($this->Article->save($this->request->data)) {
                // If the blog is saved successfully then show success message
                $this->Flash->success(__('Your post has been updated.'));
                return $this->redirect(array('action' => 'listarticle'));
            }
            $this->Flash->error(__('Unable to update your post.'));
        }
        // if the response is empty then Re-store the previous data.
        if (!$this->request->data) {
            $this->request->data = $Article;
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