<div class="card overflow-hidden">
    <div class="bg-soft-primary">
        <div class="row">
            <div class="col-12">
                <div class="text-primary p-4">
                    <h5 class="text-primary mb-0">Sign in to continue!</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body pt-2">
        <div class="p-2">
                <?php echo $this->Flash->render(); ?>
                <?php echo $this->Flash->render('auth'); ?>
                <?php echo $this->Form->create('User',['novalidate' => true,'class' => 'sample']); ?>
                <div class="form-group">
                    <?php echo $this->Form->input('email', array(
                                'type' => 'email',
                                'label' => 'Email',
                                'class' => 'form-control',
                                'placeholder' => 'Enter Email',
                                'data-rule-email' => 'true'
                            )); ?>
                </div>
                <div>
                    <?php
                        echo $this->Form->input('password', array(
                            'type' => 'password',
                            'label' => 'Password',
                            'class' => 'form-control',
                            'placeholder' => 'Enter password',
                            'data-rule-passwd' => 'true'
                        )); 
                    ?>
                </div>
                <div class="mt-3">
                    <?php echo $this->Form->end(array(
                        'label' => 'Log In',
                        'class' => 'btn btn-primary btn-block waves-effect waves-light',
                        'div' => false
                    )); ?>
                </div>
                <div style="margin-top: 3%;">
                    <?php echo $this->Html->link(
                        'Sign Up',
                        array('controller' => 'Users', 'action' => 'register')
                    ); ?>
                </div>
            </div>
        </div>
    </div>
</div>