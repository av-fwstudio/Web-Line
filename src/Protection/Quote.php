<?php
/**
 * Created by PhpStorm.
 * User: fabwebstudio
 * Date: 05/05/16
 * Time: 5:31 PM
 */

namespace Fabwebstudio\Webline\Protection;

use Fabwebstudio\Webline\Core;

class Quote
{
    public $ResponseRef;
    public $ErrorCode;
    public $ProviderID;
    public $ProviderName;
    public $ProductID;
    public $ProductName;
    public $Benefit;
    public $Premium;
    public $NetPremium;

    public function IsPending() {
        return $this->ErrorCode == 'NO_RESPONSE';
    }

    public function FormatPremium() {
        if ($this->Premium < 0) return 'ERROR';
        return '&pound;' . number_format($this->Premium, 2);
    }
}