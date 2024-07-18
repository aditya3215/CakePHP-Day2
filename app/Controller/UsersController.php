<?php

/*
* BOC: Users Controller class
* PURPOSE: Defining Controller for User Login and Logout Functionality
* CREATED BY: Aditya Verma ON 17-July-2024
* PM ID: #151708
*/

class UsersController extends AppController{
    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    // Default Method
    public function index()
    {
        $this->User->recursive = 0;
        $this->set('user', $this->paginate());
    }
    
    // Method for Login fucntionality
    public function login() {
        $this->layout = 'users';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    // Registration Method
    public function register(){
        $this->layout = 'users';
            if ($this->request->is('post')) {
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $this->Flash->success(__('The user has been saved'));
                    return $this->redirect(array('controller'=> 'Users','action' => 'login'));
                }
                $this->Flash->error(
                    __('The user could not be saved. Please, try again.')
                );
            }
    }


    // Method for Logout Functionality
    public function logout(){
        $this->Auth->logout();
        $this->redirect(['action'=>'login']);
    }    
}

/*
* EOC : Users Controller class
* PURPOSE: Defining Controller for User Login and Logout Functionality
* CREATED BY: Aditya Verma ON 17-July-2024
* PM ID: #151708
*/