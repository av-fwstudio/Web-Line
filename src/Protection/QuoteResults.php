<?php
/**
 * Created by PhpStorm.
 * User: fabwebstudio
 * Date: 05/05/16
 * Time: 5:30 PM
 */

namespace Fabwebstudio\Webline\Protection;

use Fabwebstudio\Webline\Core;

class QuoteResults
{
    public $LogonTokenAccepted;
    public $Success;
    public $ExceptionMessage;
    public $QuoteRef;
    public $NNoResponses;
    public $ResponseItemArray;

    public function Failed() {
        return !$this->Success or $this->ExceptionMessage;
    }

    public function ErrorMessage() {
        if ($this->ExceptionMessage == '') return 'Unknown error';
        return $this->ExceptionMessage;
    }

    public function ReceivedQuotes() {
        $arr = $this->ResponseItemArray->ProtectionResultsItem;
        return array_filter($arr, function ($q) {
            return !$q->IsPending();
        });
    }

    public function PendingQuotes() {
        $arr = $this->ResponseItemArray->ProtectionResultsItem;
        return array_filter($arr, function ($q) {
            return $q->IsPending();
        });
    }
}