<?php

require_once "vendor/autoload.php";

use Phroute\Phroute\RouteCollector;
use Illuminate\Database\Capsule\Manager as Capsule;  

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

// Routing Layer
$router = new RouteCollector();

$router->get('/', ['News\Platform', 'getIndex']);
$router->get('/create' ['News\Platform', 'getAddBulletin']);
$router->post('/create', ['News\Platform', 'postAddBulletin']);
$router->get('/{bulletin_id}/remove', ['News\Platform', 'getRemoveBulletin']);
$router->get('/{bulletin_id}', ['News\Platform', 'getViewBulletin']);
$router->get('/{bulletin_id}/comments', ['News\Platform', 'getBulletinComments']);
$router->get('/{bulletin_id}/comments/create', ['News\Platform', 'getAddBulletinComment']);
$router->post('/{bulletin_id}/comments/create', ['News\Platform', 'getAddBulletinComment']);
$router->get('/{bulletin_id}/comments/{bulletin_comment_id}/remove', ['News\Platform', 'getRemoveBulletinComment']);