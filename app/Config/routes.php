<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
 
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'users', 'action' => 'index'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/posts', array('controller' => 'posts', 'action' => 'index'));
	Router::connect('/users', array('controller' => 'users', 'action' => 'index'));
	Router::connect('/users/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/users/success-register', array('controller' => 'users', 'action' => 'successRegister'));
	Router::connect('/user/change-password', array('controller' => 'users', 'action' => 'changePassword'));
	Router::connect('/user/profile', array('controller' => 'userprofiles', 'action' => 'index'));
	Router::connect('/user/profile/update', array('controller' => 'userprofiles', 'action' => 'update'));
	Router::connect('/user/messages', array('controller' => 'messages', 'action' => 'index'));
	Router::connect('/user/messages/send', array('controller' => 'messages', 'action' => 'newMessage'));
	Router::connect('/user/messages/details', array('controller' => 'messages', 'action' => 'messageDetails'));

	Router::mapResources('Api');

	// User
	Router::connect('/api/user/register', array('controller' => 'api', 'action' => 'register'));
	Router::connect('/api/user/update', array('controller' => 'api', 'action' => 'updateProfile'));

	// Message
	Router::connect('/api/message', array('controller' => 'api', 'action' => 'getMessages'));
	Router::connect('/api/message/latest', array('controller' => 'api', 'action' => 'getAllLatestMessages'));
	Router::connect('/api/message/send', array('controller' => 'api', 'action' => 'postMessage'));
	Router::connect('/api/message/delete/:id', array('controller' => 'api', 'action' => 'deleteMessage'),array('pass' => ['id']));
	Router::connect('/api/message/delete/all/:sender/:receiver', array('controller' => 'api', 'action' => 'deleteAllMessages'),array('pass' => ['sender', 'receiver']));
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
