# webline
Laravel wrapper for webline

##Installation

Add the following to your require block in composer.json

<pre>
"fabwebstudio/webline":"1.*"
</pre>

##Configuration
Add to your 'config/app.php' (Laravel 5) the service provider:

<pre>
'providers' => [
    // other service providers
    Fabwebstudio\Webline\WeblineServiceProvider::class,
],
</pre>

<pre>
'aliases' => [
'Webline'   => Fabwebstudio\Webline\Facade\Webline::class,
],
</pre>


##Publish vendor
<pre>
 php artisan vendor:publish
  </pre>

Next you can modify the generated configuration file webline.php accordingly.
<br/>
##Usage
Create object of webline classe to call the api

<pre>
$Webline    = new Webline();

// Get token from webline
$token = $Webline->generateToken();

// Lead data
$lead_data = [
                 'title'     => '',
                 'forename'  => '',
                 'surname'   => '',
                 'dob'       => '',
                 'sex'       => '',
                 'smoker'    => '',
                 'earnings'  => '',
                 'term'      => '',
                 'benefit'   => '',
                 'frequency' => '',
                 'prottype'  => '',
                 'coverbasis' => '',
              ]
// Partner data
$partner_data = [
            'ptnr_title' => '',
            'ptnr_forename' => '',
            'ptnr_surname' => '',
            'ptnr_dob' => '',
            'ptnr_sex' => '',
            'ptnr_smoker' => '',
        ]

$lead_data = array_merge($lead_data,$partner_data);

$Webline->quoteReference(
        $lead_data
 );

$quote_data = $Webline->retrieveQuoteCommand();

</pre>

