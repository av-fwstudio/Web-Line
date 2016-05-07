<?php
/**
 * Created by PhpStorm.
 * User: fabwebstudio
 * Date: 05/05/16
 * Time: 5:29 PM
 */

namespace Fabwebstudio\Webline\Protection;

use Fabwebstudio\Webline\Core;

class QuoteResponse
{
    public $LogonTokenAccepted;
    public $ExceptionMessage;
    public $QuoteRef;
    public $PollDelay;

    public function Failed() {
        return !isset($this->ExceptionMessage) or $this->ExceptionMessage != '';
    }

    public function ErrorMessage() {
        if ($this->ExceptionMessage == '') return "Unknown error";
        return $this->ExceptionMessage;
    }
}