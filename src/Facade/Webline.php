<?php

/**
 * Created by PhpStorm.
 * User: fabwebstudio
 * Date: 05/05/16
 * Time: 4:20 PM
 */

namespace Fabwebstudio\Webline\Facade;

use Illuminate\Support\Facades\Facade;

class Webline extends Facade {

    protected static function getFacadeAccessor() { return 'webline'; }

}