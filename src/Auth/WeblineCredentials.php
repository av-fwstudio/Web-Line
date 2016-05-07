<?php

/**
 * Created by PhpStorm.
 * User: fabwebstudio
 * Date: 05/05/16
 * Time: 5:11 PM
 */

namespace Fabwebstudio\Webline\Auth;

use Fabwebstudio\Webline\Core;

class WeblineCredentials {
    public $WeblineNumber;
    public $UserName;
    public $Password;
    public function __construct($num, $user, $pw) {
        $this->WeblineNumber = $num;
        $this->UserName = $user;
        $this->Password = $pw;
    }
}