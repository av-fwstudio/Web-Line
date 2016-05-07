<?php
/**
 * Created by PhpStorm.
 * User: fabwebstudio
 * Date: 05/05/16
 * Time: 5:29 PM
 */

namespace Fabwebstudio\Webline\Protection;

use Fabwebstudio\Webline\Core;

class ProtectionQuoteRequest
{
    public $LogonToken;
    public $ProductID;
    public $Client1;
    public $Client2;
    public $TheProduct;

    public function __construct($token, $pid, $c1, $c2, $product) {
        $this->LogonToken = $token;
        $this->ProductID = $pid;
        $this->Client1 = $c1;
        $this->Client2 = $c2;
        $this->TheProduct = $product;
    }
}