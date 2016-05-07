<?php

/**
 * Created by PhpStorm.
 * User: fabwebstudio
 * Date: 05/05/16
 * Time: 5:09 PM
 */

namespace Fabwebstudio\Webline\Core;

abstract class YesNo {
    const NotDefined = 'UNDEFINED';
    const Yes = 'Yes';
    const No = 'No';
    static function fromBool($b) {
        return $b ? YesNo::Yes : YesNo::No;
    }
}