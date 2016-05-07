<?php
/**
 * Created by PhpStorm.
 * User: fabwebstudio
 * Date: 05/05/16
 * Time: 5:17 PM
 */

namespace Fabwebstudio\Webline\Auth;

use Fabwebstudio\Webline\Core;

class GetTokenCommand
{
    private $scli;

    public function __construct($uri) {
        $this->scli = new \SoapClient($uri, array(
            'classmap' => array(
                'GetWeblineLogonToken' => '\Fabwebstudio\Webline\Auth\WeblineCredentials',
                'WeblineLogonTokenResponse' => '\Fabwebstudio\Webline\Auth\GetWeblineLogonTokenResult',
                'GetWeblineLogonTokenResponse' => '\Fabwebstudio\Webline\Auth\GetWeblineLogonTokenResponse'
            )
        ));
    }

    public function Execute($creds) {
        return $this->scli->GetWeblineLogonToken($creds)->GetWeblineLogonTokenResult;
    }
}