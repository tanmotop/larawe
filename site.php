<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2019/8/20
 * Time: 4:32 PM
 */

require __DIR__ . '/vendor/autoload.php';

class {Module_name}ModuleSite extends WeModuleSite
{
    public function getMenus()
    {
        return array(
            array('title' => '管理后台', 'icon' => 'fa fa-shopping-cart', 'url' => url('site/entry', ['m' => 'module_name', 'do' => 'index']))
        );
    }

    public function doWebIndex()
    {
        $app = require_once __DIR__.'/bootstrap/app.php';

        $kernel = $app->make(Larawe\Contracts\Kernel::class);

        $response = $kernel->handle(
            $request = Illuminate\Http\Request::capture()
        );

        $response->send();

        $kernel->terminate($request, $response);
    }
}