<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2019/8/20
 * Time: 5:06 PM
 */

class Zyx_ucenterModule extends WeModule
{
    public function welcomeDisplay()
    {
        header('location: ' . url('site/entry', ['m' => 'module_name', 'do' => 'index']));
        exit();
    }
}