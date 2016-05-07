<?php
/**
 * Created by PhpStorm.
 * User: fabwebstudio
 * Date: 05/05/16
 * Time: 5:32 PM
 */

namespace Fabwebstudio\Webline\Protection;

use Fabwebstudio\Webline\Core;

class RetrieveQuotesCommand
{
    private $scli;

    public function __construct($uri) {
        $this->scli = new \SoapClient($uri, array(
            'classmap' => array(
                'GetProtectionResults' => '\Fabwebstudio\Webline\Protection\ResultsRequest',
                'ProtectionResultsResponse' => '\Fabwebstudio\Webline\Protection\QuoteResults',
                'ProtectionResultsItem' => '\Fabwebstudio\Webline\Protection\Quote'
            )
        ));
    }

    public function Execute($token, $ref) {
        $req = new \Fabwebstudio\Webline\Protection\ResultsRequest($token, $ref);
        return $this->scli->GetProtectionResults($req)->GetProtectionResultsResult;
    }
}