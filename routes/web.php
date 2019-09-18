<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2019/8/22
 * Time: 2:48 PM
 */

/**
 * @var $router \Illuminate\Routing\Router
 */
$router->get('/', function () {
    return view('welcome');
});