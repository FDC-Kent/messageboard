<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'MessageBoard');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>

<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>

	<?php
	echo $this->Html->meta('icon');

	echo $this->Html->css('cake.generic');
	// echo $this->Html->css('bootstrap');

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>
</head>

<body>
	<div id="container">
		<div id="header">
			<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<a class="navbar-brand" href="#">Message Board</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
									User
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
									<li><a class="dropdown-item" href="#">User Profle</a></li>
									<li><a class="dropdown-item" href="#">Account</a></li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="#">Logouts</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav> -->
			<h1><?php echo $this->Html->link($cakeDescription, 'https://cakephp.org'); ?></h1>
		</div>
		<div id="content">
			<div style="text-align: right;">
				<?php if ($is_logged_in) : ?>
					Welcome <?php echo $current_user['username']; ?> . <?php echo $this->Html->link('logout', array('controller' => 'users', 'action' => 'logout')) ?>;
				<?php else : ?>
					<?php echo $this->Html->link('login', array('controller' => 'users', 'action' => 'login')); ?>
				<?php endif; ?>
				<?php echo $this->Flash->render(); ?>
				<?php echo $this->Flash->render('auth') ?>

			</div>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<!-- <?php echo $this->Html->link(
						$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
						'https://cakephp.org/',
						array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
					);
					?>
			<p>
				<?php echo $cakeVersion; ?>
			</p> -->
		</div>
	</div>
	<!-- <?php echo $this->element('sql_dump'); ?> -->
	<!-- <?php echo $this->Html->script('bootstrap'); ?> -->
</body>

</html>