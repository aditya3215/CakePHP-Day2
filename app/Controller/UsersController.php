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
        $this->layout = 'users';
        $this->User->recursive = 0;
        $this->set('user', $this->paginate());
        // Log
        if($this->Auth->user()){
            $user = $this->Auth->user();
            CakeLog::write('Debug', $user['id'].'/'.$user['name'].'/UserContoller/index()-Inside Index Action of Users Controller.');
        }else{
            CakeLog::write('Debug', 'none/none/UserContoller/index()-Inside Index Action of Users Controller.');
        }
        $this->redirect(['controller'=>'Users','action'=>'login']);
    }
    
    // Method for Login fucntionality
    public function login() {
        $this->layout = 'users';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                // Logging details
                if($this->Auth->user()){
                    $user = $this->Auth->user();
                    CakeLog::write('Debug', $user['id'].'/'.$user['name'].'/UsersContoller/login()-User Logged in Successfully.');
                }else{
                    CakeLog::write('Debug', '_/_/UsersContoller/login()-User Logged in Successfully.');
                }
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
                    // Logging details
                    if($this->Auth->user()){
                        $user = $this->Auth->user();
                        CakeLog::write('Debug', $user['id'].'/'.$user['name'].'/UsersContoller/register()-User Registered Successfully.');
                    }else{
                        CakeLog::write('Debug', '_/_/UsersContoller/register()-User Registered Successfully.');
                    }
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
        // Logging details
        if($this->Auth->user()){
            $user = $this->Auth->user();
            CakeLog::write('Debug', $user['id'].'/'.$user['name'].'/UsersContoller/logout()-User Logout Successfully.');
        }else{
            CakeLog::write('Debug', '_/_/UsersContoller/logout()-User Logout Successfully.');
        }
        $this->redirect(['action'=>'login']);
    }    
}

/*
* EOC : Users Controller class
* PURPOSE: Defining Controller for User Login and Logout Functionality
* CREATED BY: Aditya Verma ON 17-July-2024
* PM ID: #151708
*/