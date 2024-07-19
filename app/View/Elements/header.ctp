<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex" style="height: 100%;">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="#" class="logo logo-light">
                
                <span class="logo-lg">
                <?php echo $this->Html->link(
                        $this->Html->image('velocity_logo.png', array('alt' => 'Velocity Logo', 'height' => '')), // Adjust height as needed
                        array('controller' => 'Article', 'action' => 'index'), // Replace with your controller and action
                        array('escape' => false) // Important to prevent escaping the image HTML
                    ); ?>                </span>
                </a>
            </div>
        </div>
        <div class="d-flex pr-2">
            <div class="dropdown d-inline-block">
                <span class="d-none d-xl-inline-block ml-1" key="t-henry">
                    <?php $user = $this->Session->read('Auth.User'); echo $user['name'];?>
                </span>
                &nbsp;&nbsp;
                <?php echo $this->Html->link(
                    'Logout',
                    array('controller' => 'Users', 'action' => 'logout')
                ); ?>
            </div>
        </div>
    </div>
</header>