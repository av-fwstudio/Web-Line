<?php
/**
 * Created by PhpStorm.
 * User: fabwebstudio
 * Date: 05/05/16
 * Time: 5:30 PM
 */

namespace Fabwebstudio\Webline\Protection;

use Fabwebstudio\Webline\Core;

class ResultsRequest
{
    public $LogonToken;
    public $QuoteRef;

    public function __construct($token, $ref) {
        $this->LogonToken = $token;
        $this->QuoteRef = $ref;
    }
}