#  PHP SDK
 

## Availability
Supports PHP 5.3 and above


## How to install

## # Composer installation

the SDK can be installed with [Composer](http://getcomposer.org/) by updating your composer.json file

```bash
{
    "require": 
        {
            "nps/php-sdk": "1.2.9"
        }
}

```

or by executing this command

```bash
$ composer require nps/php-sdk
```

## # Manual installation

You can download or clone the SDK from our [Github Page](https://github.com/Ingenico-NPS-Latam/nps-sdk-php). and then include the `init.php` file.

```php 
require_once(__DIR__ . '/nps-sdk-php/init.php');
```


## Configuration

It's a basic configuration of the SDK

```php 
require_once './vendor/autoload.php';
use NpsSDK\Configuration;
use NpsSDK\Constants;
Configuration::environment(Constants::STAGING_ENV);
Configuration::secretKey(“yourSecretKeyHere”);
```

Here is an simple example request:

```php 
require_once './vendor/autoload.php';

use NpsSDK\Sdk;
use NpsSDK\ApiException;

Configuration::environment(Constants::SANDBOX_ENV);
Configuration::secretKey("YourKeyhere");

$sdk = new Sdk();

$params = array(
    'psp_Version'          => '2.2',
    'psp_MerchantId'       => 'psp_test',
    'psp_TxSource'         => 'WEB',
    'psp_MerchTxRef'       => 'ORDER56666-3',
    'psp_MerchOrderId'     => 'ORDER56666',
    'psp_Amount'           => '1000',
    'psp_NumPayments'      => '1',
    'psp_Currency'         => '032', 
    'psp_Country'          => 'ARG', 
    'psp_Product'          => '14',
    'psp_CustomerMail'     => 'john.doe@example.com',
    'psp_CardNumber'       => '4507990000000010', 
    'psp_CardExpDate'      => '1903', 
    'psp_CardSecurityCode' => '306',
    'psp_SoftDescriptor'   => 'Sol Tropical E',
    'psp_PosDateTime'      => '2016-12-01 12:00:00'
    
);
try{
    $resp = $sdk->payOnline2p($params);
}catch(ApiException $e){
    echo 'Code to handle error';
}
```

## Environments

```php 
require_once './vendor/autoload.php';

use NpsSDK\Configuration;
use NpsSDK\Constants;
Configuration::environment(Constants::STAGING_ENV);
Configuration::environment(Constants::SANDBOX_ENV);
Configuration::environment(Constants::PRODUCTION_ENV);
```

## Error handling

ApiException: This exception is raised when a ReadTimeout or a ConnectTimeout occurs.

Note: The rest of the exceptions that can occur will be detailed inside of the response provided by NPS or will be provided by the php SoapClient class.

```php 
require_once './vendor/autoload.php';

use NpsSDK\ApiException;

//Code
try{
    //code or sdk call
}catch(ApiException $e){
    //Code to handle error
}
```

## Advanced configurations

Nps SDK allows you to log what’s happening with you request inside of our SDK, it logs by default to stout.
The SDK uses the custom logger that you use for your project.

An example for monolog Logger.

```php 
use Monolog\Logger;
$logger = new Logger(“NpsSdk”);

use NpsSDK\Configuration;

Configuration::secretKey(“your key here”);
Configuration::logger($logger);
```

Note: The logger needs to be PSR-3 compliant to work properly inside of the SDK, some examples are (Monolog, Analog).


The "INFO" level will write concise information of the request and will mask sensitive data of the request. 
The "DEBUG" level will write information about the request to let developers debug it in a more detailed way.

```php 
use NpsSDK\Configuration;

Configuration::secretKey(“your key here”);
Configuration::loglevel(“DEBUG”);
```

Sanitize allows the SDK to truncate to a fixed size some fields that could make request fail, like extremely long name.

```php 
use NpsSDK\Configuration;

Configuration::secretKey(“your key here”);
Configuration::sanitize(true);
```

you can change the timeout of the request.

ExecutionTimeout(Default=60 seconds): you can change the execution timeout of the request.

ConnectionTimeout(Default=60 seconds): you can change the connection timeout of the request.

```php 
use NpsSDK\Configuration;

Configuration::secretKey(“your key here”);
Configuration::connectionTimeout(65);
Configuration::executionTimeout(65);
```

Proxy configuration

```php 
use NpsSDK\Configuration;

Configuration::secretKey(“your key here”);
Configuration::proxyUrl("http://yourproxy");
Configuration::proxyPort(6854);
Configuration::proxyUser("proxyUsername");
Configuration::proxyPass("proxyPassword");
```
