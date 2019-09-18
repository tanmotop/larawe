<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2019/9/11
 * Time: 4:47 PM
 */

namespace App\We;


use Illuminate\Routing\Router;
use App\Http\Kernel as HttpKernel;
use Larawe\Foundation\Bootstrap\WeUrlGenerator;
use Illuminate\Contracts\Foundation\Application;

class Kernel extends HttpKernel
{
    /**
     * Kernel constructor.
     * @param Application $app
     * @param Router $router
     */
    public function __construct(Application $app, Router $router)
    {
        /**
         * 注册微擎Url生成器
         */
        $this->addBootstrapper(WeUrlGenerator::class);

        parent::__construct($app, $router);
    }
}