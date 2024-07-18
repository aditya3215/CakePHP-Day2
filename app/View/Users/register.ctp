

        <div class="card overflow-hidden">
        <div class="bg-soft-primary">
            <div class="row">
            <div class="col-12">
                <div class="text-primary p-4">
                <h5 class="text-primary mb-0">Regsiter!</h5>
                </div>
            </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <div class="py-4 px-2">
            <?php echo $this->Flash->render('auth'); ?>
            <?php echo $this->Form->create('User',['novalidate' => true]); ?>
                <div class="form-group">
                    <?php echo $this->Form->input('name', array(
                        'type' => 'text',
                        'label' => 'Full Name',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Full Name'
                    )); ?>
                </div>
                <div class="form-group">
                <?php echo $this->Form->input('email', array(
                        'type' => 'text',
                        'label' => 'Email',
                        'class' => 'form-control',
                        'placeholder' => 'Enter Email'
                    )); ?>
                </div>
                <div class="form-group">
                <div>
                    <?php
                        echo $this->Form->input('password', array(
                            'type' => 'password',
                            'label' => 'Password',
                            'class' => 'form-control',
                            'placeholder' => 'Enter password'
                        )); 
                    ?>
                </div>
                </div>
                <div class="py-2 mt-3">
                <?php echo $this->Form->end(array(
                    'label' => 'Register',
                    'class' => 'btn btn-primary btn-block waves-effect waves-light',
                    'div' => false
                )); ?>
                </div>
            <?php echo $this->Html->link(
                'Login',
                array('controller' => 'Users', 'action' => 'login')
            ); ?>
            </div>
        </div>
        </div>

