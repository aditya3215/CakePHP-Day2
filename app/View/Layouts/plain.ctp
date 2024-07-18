<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $this->fetch('title'); ?>
        </title>
        <?php
            echo $this->Html->meta('icon', 'assets/images/favicon.ico', array('type' => 'icon')); 
            echo $this->Html->css('bootstrap.min');
            echo $this->Html->css('icons.min');
            echo $this->Html->css('app.min');
            echo $this->Html->link(
                '', // Empty string for the link text
                '/img/favicon.ico', // Path to the favicon
                array('rel' => 'shortcut icon')
            );
            echo $this->Html->script([
                'jquery',
                'jquery.validate',
                'validation',
                'GenerateSlug'
            ]);
        ?>
    </head>
    <body  data-sidebar="dark">
        <div id="layout-wrapper">
            <!-- Header -->
            <?php echo $this->element('header'); ?>

            <!-- side bar -->
            <?php echo $this->element('sidebar'); ?>
            
            <!-- Main content -->
            <?php echo $this->Flash->render(); ?>
            <?php echo $this->fetch('content'); ?>

            <!-- footer -->
            <?php echo $this->element('footer'); ?>
        </div>
    </body>
</html>