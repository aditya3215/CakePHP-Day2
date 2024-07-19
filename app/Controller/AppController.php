<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public function beforeFilter() {
        // Allowing only login and register actions to be accessible without authentication
        $this->Auth->allow('login', 'register');
    }
    public $components = array(
        'DebugKit.Toolbar',
        'Flash',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'Article',
                'action' => 'listarticle'
            ),
            'logoutRedirect' => array(
                'controller' => 'user',
                'action' => 'login'
            ),

            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email'),
                    // 'fields' => array('password' => 'password'),
                    'passwordHasher' => 'Blowfish'
                )
            ),
        )
    );
     // function for sending email on Article Creation
    protected function sendArticleCreatedEmail($article)
    {
        $user = $this->Auth->user();
        $this->loadModel('Category');
        $categoryName = $this->Category->field('categories_name', array('id' => $article['Article']['category_id']));
        $this->loadModel('User');
        $allUsers = $this->User->find('all');
        foreach ($allUsers as $val) {
            if($val['User']['email']!==$user['email']){
                $Email = new CakeEmail('default');
                $Email->to($val['User']['email']) 
                        ->template('new_article', 'default') 
                        ->emailFormat('html')
                        ->subject('New Article Added. Go checkout📜!')
                        ->viewVars(array(
                            'article' => $article,
                            'user' => $user,
                            'categoryName' => $categoryName
                        ))
                        ->send();
            }
        }
    }
     // function for sending email on Article Editing
    protected function sendArticleEditEmail($article)
    {
        // debug(Configure::read('EmailConfig'));
        $this->loadModel('Category');
        $categoryName = $this->Category->field('categories_name', array('id' => $article['Article']['category_id']));
        $this->loadModel('User');
        $data = $article;
        $AuthorName = $this->User->field('name', array('id' => $article['Article']['Author']));
        $Authoremail = $this->User->field('email', array('id' => $article['Article']['Author']));
        $user['name'] = $AuthorName;
        $allUsers = $this->User->find('all');
        // Example of looping through users and printing their details
        foreach ($allUsers as $val) {
            // Access user details
            if($val['User']['email']!==$Authoremail){
                $Email = new CakeEmail('default');
                $Email->to($val['User']['email']) 
                        ->template('new_article', 'default') 
                        ->emailFormat('html')
                        ->subject('Article Updated. Go checkout📜🤔!')
                        ->viewVars(array(
                            'article' => $article,
                            'user' => $user,
                            'categoryName' => $categoryName
                        ))
                        ->send();
            }
        }
    }
    
}
