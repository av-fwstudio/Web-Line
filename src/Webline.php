<?php
/**
 * Created by PhpStorm.
 * User: fabwebstudio
 * Date: 05/05/16
 * Time: 4:18 PM
 */

namespace Fabwebstudio\Webline;

use Fabwebstudio\Webline\Auth;
use Fabwebstudio\Webline\Protection;
use Illuminate\Support\Facades\Session;

class Webline
{
    private  $wblAuthUri;
    private  $wblQuoteUri;
    private  $quotes = null;

    private $number;
    private $user;
    private $pass;

    public function __construct() {
        $this->wblAuthUri =  config('webline.webline_base_url').'service3.asmx?wsdl';
        $this->wblQuoteUri = config('webline.webline_base_url').'quotesversionl.asmx?wsdl';;
    }

    public function generateToken() {

        $this->number = config('webline.webline_number');
        $this->user = config('webline.webline_user');
        $this->pass = config('webline.webline_password');

        $creds = new \Fabwebstudio\Webline\Auth\WeblineCredentials($this->number, $this->user, $this->pass);

        $com = new \Fabwebstudio\Webline\Auth\GetTokenCommand($this->wblAuthUri);
        $result = $com->Execute($creds);
        if($result->Success) {
            Session::put('token',$result->LogonToken);
        } else {
            Session::put('weblineflash','Authentication error: ' . $result->LogonResult);
        }
    }

    public function quoteReference($lead_data) {
        if(Session::has('token')) {

            $title = $forename = $surname = $dob = $sex = $smoker = $earnings = $coverbasis = $ptnr_title = $ptnr_forename = $ptnr_surname = $ptnr_dob = $ptnr_sex = $ptnr_smoker = $term = $benefit = $frequency = $prottype = '';
            extract($lead_data);

            $client = new \Fabwebstudio\Webline\Protection\Client($title, $forename, $surname, $dob, $sex, $smoker, $earnings);

            $client2 = null;
            if($coverbasis == 'JointFirstEvent'){
                $client2 = new \Fabwebstudio\Webline\Protection\Client($ptnr_title, $ptnr_forename, $ptnr_surname, $ptnr_dob, $ptnr_sex, $ptnr_smoker, '');
            }

            $product = new \Fabwebstudio\Webline\Protection\Product($term, $benefit, $frequency,$prottype,$coverbasis);

            $com = new \Fabwebstudio\Webline\Protection\RequestQuotesCommand($this->wblQuoteUri);

            $result = $com->Execute(Session::get('token'), $product, $client, $client2);

            if(!$result->LogonTokenAccepted) {
                Session::put('weblineflash','Session expired');
                Session::put('token',null);
                Session::put('quoteref',null);
            } else if($result->Failed()) {
                Session::put('weblineflash','Quote error: ' . $result->ErrorMessage());
            } else {
                Session::put('quoteref', $result->QuoteRef);
            }
        }
    }

    public function retrieveQuoteCommand() {
        if(Session::has('token') && Session::has('quoteref')) {
            $com = new \Fabwebstudio\Webline\Protection\RetrieveQuotesCommand($this->wblQuoteUri);
            $result = $com->Execute(Session::get('token'), Session::get('quoteref'));
            if(!$result->LogonTokenAccepted) {
                Session::put('weblineflash','Session expired');
                Session::put('token',null);
                Session::put('quoteref',null);
            } else if ($result->Failed()) {
                Session::put('weblineflash','Retrieval error: ' . $result->ErrorMessage());
            } else {
                return $result;
            }
        }
    }
}