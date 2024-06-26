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
<html lang="en">

<head>
	
	<?php echo $this->Html->charset(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>

	<?php
	echo $this->Html->meta('icon');

	// echo $this->Html->css('cake.generic');
	
	echo $this->Html->css('style');
	echo $this->Html->css('bootstrap');
	echo $this->Html->css('jquery-ui');
	echo $this->Html->css('select2');

	echo $this->fetch('meta');
	echo $this->fetch('css');

	echo $this->Html->script('angular');
	echo $this->Html->script('angular-route');
	echo $this->Html->script('angular-resources');

	echo $this->Html->script('angular-app');
	echo $this->Html->script('main-service');
	echo $this->Html->script('main-controller');
	?>
</head>

<body>
	<div id="container">
		<div id="header">
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container">
					<!-- Navbar brand -->
					<?php echo $this->Html->link('Message Board', ['controller' => 'Users', 'action' =>  'index'], ['class' => 'navbar-brand']); ?>

					<!-- Navbar toggler -->
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- Navbar links -->
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav ms-auto">
							<li class="nav-item">
								<?php echo $this->Html->link(
									'Home',
									array(
										'controller' => 'Users',
										'action' => 'index'
									),
									array('class' => 'nav-link')
								); ?>
							</li>
							<li class="nav-item">
								<?php echo $this->Html->link(
									'Message',
									array(
										'controller' => 'messages',
										'action' => 'index'
									),
									array('class' => 'nav-link')
								); ?>
							</li>
							<?php if ($is_logged_in) : ?>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
										Welcome <?php echo $current_user['name']; ?>
									</a>
									<ul class="dropdown-menu dropdown-menu-lg-end">
										<li>
											<?php echo $this->Html->link(
												'Profile',
												array(
													'controller' => 'userprofiles',
													'action' => 'index'
												),
												array('class' => 'dropdown-item')
											) ?>
										</li>
										<li>
											<?php echo $this->Html->link(
												'Change Password',
												array(
													'controller' => 'users',
													'action' => 'changePassword'
												),
												array('class' => 'dropdown-item')
											) ?>
										</li>
										<li>
											<hr class="dropdown-divider">
										</li>
										<li>
											<?php echo $this->Html->link(
												'logout',
												array(
													'controller' => 'users',
													'action' => 'logout'
												),
												array('class' => 'dropdown-item')
											)
											?>
										</li>
									</ul>
								</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</nav>
			<!-- <h1><?php echo $this->Html->link($cakeDescription, 'https://cakephp.org'); ?></h1> -->
		</div>
		<div id="content">
			<div style="text-align: right;">
				<?php echo $this->Flash->render(); ?>
				<?php echo $this->Flash->render('auth') ?>

			</div>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">

		</div>
	</div>
	<script type="text/javascript">
		const BASE_URL = '<?php echo $this->webroot; ?>';
		const USER_ID = '<?php echo $current_user ? $current_user['id'] : ''; ?>';
	</script>
	<?php 
		echo $this->Html->script('jquery'); 
		echo $this->Html->script('jquery-ui');
		echo $this->Html->script('bootstrap');
		echo $this->Html->script('select2');
		echo $this->Html->script('common');
		echo $this->fetch('script');
	?>
</body>

</html>

