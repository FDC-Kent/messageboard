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
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>

	<?php
	echo $this->Html->meta('icon');

	// echo $this->Html->css('cake.generic');
	echo $this->Html->css('bootstrap');

	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');

	echo $this->Html->script('angular');
	echo $this->Html->script('angular_route');
	echo $this->Html->script('angular_resources');

	echo $this->Html->script('angular_app');
	echo $this->Html->script('user_service');
	echo $this->Html->script('user_controller');
	?>
</head>

<body>
	<div id="container">
		<div id="header">
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="container">
					<!-- Navbar brand -->
					<?php echo $this->Html->link('Message Board', ['controller' => 'Pages', 'action' => 'display', 'home'], ['class' => 'navbar-brand']); ?>

					<!-- Navbar toggler -->
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- Navbar links -->
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav ms-auto">
							<li class="nav-item">
								<?php echo $this->Html->link('Home', ['controller' => 'Pages', 'action' => 'display', 'home'], ['class' => 'nav-link']); ?>
							</li>
							<li class="nav-item">
								<?php echo $this->Html->link('About', ['controller' => 'Pages', 'action' => 'display', 'about'], ['class' => 'nav-link']); ?>
							</li>
							<?php if ($is_logged_in) : ?>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
										Welcome <?php echo $current_user['name']; ?>
									</a>
									<ul class="dropdown-menu dropdown-menu-lg-end">
										<li><a class="dropdown-item" href="#">User Profle</a></li>
										<li><a class="dropdown-item" href="#">Account</a></li>
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
							<?php else : ?>
								<?php echo $this->Html->link(
									'login',
									array('controller' => 'users', 'action' => 'login'),
									array('class' => 'btn btn-primary')
								); ?>
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
	</script>
	<?php echo $this->Html->script('jquery'); ?>ÍÍ
	<?php echo $this->Html->script('bootstrap'); ?>
</body>

</html>