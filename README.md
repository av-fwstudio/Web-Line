# webline
Laravel wrapper for webline

#Installation

Add the following to your require block in composer.json

<pre>
"fabwebstudio/webline":"1.*"
</pre>

#Configuration
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


