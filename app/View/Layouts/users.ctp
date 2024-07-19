<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
        Blogs Application
	</title>
	<?php
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('style');
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
            'validation'
        ]);
	?>
</head>

<body>
    <div class="home-btn d-none d-sm-block">
        <a href="index.html" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
