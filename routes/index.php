<?php

use App\Controllers\AuthController;
use App\Controllers\CommentController;
use App\Controllers\ExploreController;
use App\Controllers\HomeController;
use App\Controllers\StoryController;
use Route\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');
$router->get('/auth/signin', AuthController::class, 'login');
$router->post('/auth/signin', AuthController::class, 'auth');
$router->get('/auth/signup', AuthController::class, 'register');
$router->post('/auth/signup', AuthController::class, 'signup');
$router->get('/auth/signout', AuthController::class, 'logout');

$router->get('/explore', ExploreController::class, 'index');
$router->get('/explore/show', ExploreController::class, 'show');

$router->post('/comment/post', CommentController::class, 'store');

$router->get('/stories', StoryController::class, 'index');
$router->get('/stories/new', StoryController::class, 'create');
$router->post('/stories/store', StoryController::class, 'store');
$router->get('/stories/edit', StoryController::class, 'edit');
$router->post('/stories/delete', StoryController::class, 'destroy');
$router->post('/stories/status', StoryController::class, 'toggleStatus');

$router->dispatch();
