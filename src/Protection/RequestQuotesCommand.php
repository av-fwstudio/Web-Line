<?php
/**
 * Created by PhpStorm.
 * User: fabwebstudio
 * Date: 05/05/16
 * Time: 5:31 PM
 */

namespace Fabwebstudio\Webline\Protection;

use Fabwebstudio\Webline\Core;

class RequestQuotesCommand
{
    private $scli;

    public function __construct($uri) {
        $this->scli = new \SoapClient($uri, array(
            'classmap' => array(
                'Client' => '\Fabwebstudio\Webline\Protection\Client',
                'ProtectionProduct' => '\Fabwebstudio\Webline\Protection\Product',
                'ProtectionQuoteRequest' => '\Fabwebstudio\Webline\Protection\ProtectionQuoteRequest',
                'QuoteResponse' => '\Fabwebstudio\Webline\Protection\QuoteResponse'
            )
        ));
    }

    public function Execute($token, $product, $clienta, $clientb) {
        $req = new \Fabwebstudio\Webline\Protection\ProtectionQuoteRequest($token, '0', $clienta, $clientb, $product);
        return $this->scli->ProtectionQuoteRequest($req)->ProtectionQuoteRequestResult;
    }
}