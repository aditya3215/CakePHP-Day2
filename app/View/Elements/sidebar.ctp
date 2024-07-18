<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li>
            <a href="#" class="waves-effect">
                <?php echo $this->Html->tag('i', '', array('class' => 'mdi mdi-file-document-box-outline')); ?>
                <span>Dashboard</span>
            </a>
            </li>
            <li>
            <?php echo $this->Html->link(
                    $this->Html->tag('i', '', array('class' => 'mdi mdi-weather-night')) . '<span>Articles</span>',
                    array('controller' => 'article', 'action' => 'listarticle'),
                    array('class' => 'waves-effect', 'escape' => false)
                );
            ?>
            </li>
            <li>
            <?php echo $this->Html->link(
                    $this->Html->tag('i', '', array('class' => 'mdi mdi-weather-night')) . '<span>Category</span>',
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