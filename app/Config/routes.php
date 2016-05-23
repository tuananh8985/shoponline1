<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
Router::connect('/', array('controller' => 'home', 'action' => 'index'));
Router::connect('/dang-ky-nhan-tin', array('controller' => 'home', 'action' => 'addemail'));
Router::connect('/tim-kiem.html', array('controller' => 'home', 'action' => 'search'));

Router::connect('/san-pham', array('controller' => 'product', 'action' => 'index'));
Router::connect('/ds-sp/*', array('controller' => 'product', 'action' => 'index'));
Router::connect('/ct-sp/*', array('controller' => 'product', 'action' => 'detail'));

Router::connect('/gioi-thieu', array('controller' => 'post', 'action' => 'index'));

Router::connect('/tin-tuc/*', array('controller' => 'news', 'action' => 'index'));
Router::connect('/chi-tiet-tin-tuc/*', array('controller' => 'news', 'action' => 'detail'));

Router::connect('/thong-tin/*', array('controller' => 'news', 'action' => 'index'));
Router::connect('/chi-tiet-tin/*', array('controller' => 'news', 'action' => 'detail'));

Router::connect('/chi-tiet-anh/*', array('controller' => 'image', 'action' => 'detail'));
Router::connect('/danh-sach-anh/*', array('controller' => 'image', 'action' => 'index'));
Router::connect('/thu-vien-anh', array('controller' => 'image', 'action' => 'index1'));

Router::connect('/lien-he.html', array('controller' => 'contact', 'action' => 'index'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
