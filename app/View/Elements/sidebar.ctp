<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li>
            <?php echo $this->Html->link(
                    '<span>Dashboard</span>',
                    array('controller' => 'article', 'action' => 'index'),
                    array('class' => 'waves-effect', 'escape' => false)
                );
            ?>
            </li>
            <li>
            <?php echo $this->Html->link(
                    '<span>Articles</span>',
                    array('controller' => 'article', 'action' => 'listarticle'),
                    array('class' => 'waves-effect', 'escape' => false)
                );
            ?>
            </li>
            <li>
            <?php echo $this->Html->link(
                    '<span>Category</span>',
                    array('controller' => 'category', 'action' => 'listcategory'),
                    array('class' => 'waves-effect', 'escape' => false)
                );
            ?>
            </li>
        </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->