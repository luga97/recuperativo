<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['posts/index'] = 'posts/index';
$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1'; //redireccionamos con los slug a el metodo view de posts
$route['posts'] = 'posts/index';

$route['default_controller'] = 'posts'; //hace que carguen los post en el index

$route['categories'] = 'categories/index';
$route['categories/create'] = 'categories/create';
$route['categories/posts/(:any)'] = 'categories/posts/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
