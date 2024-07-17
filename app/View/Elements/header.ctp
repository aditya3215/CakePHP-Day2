<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="#" class="logo logo-light">
                <span class="logo-sm">
                    <?php echo $this->Html->image('velocity_logo.png', array('alt' => '', 'height' => '40')); ?>
                </span>
                <span class="logo-lg">
                    <?php echo $this->Html->image('velocity_logo.png', array('alt' => '', 'height' => '')); ?>
                </span>
                </a>
            </div>
        </div>
        <div class="d-flex pr-2">
            <div class="dropdown d-inline-block">
                <span class="d-none d-xl-inline-block ml-1" key="t-henry"
                >Welcome Henry</span
                >&nbsp;&nbsp;
                <?php echo $this->Html->link(
                    'Logout',
                    array('controller' => 'Users', 'action' => 'logout')
                ); ?>
            </div>
        </div>
    </div>
</header>