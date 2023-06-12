# SSLWirless SMS API for PHP/Laravel Framework

[![Downloads](https://img.shields.io/packagist/dt/karim007/laravel-sslwirless-sms)](https://packagist.org/packages/karim007/laravel-sslwirless-sms)
[![Starts](https://img.shields.io/packagist/stars/karim007/laravel-sslwirless-sms)](https://packagist.org/packages/karim007/laravel-sslwirless-sms)

## Features

## Requirements

- PHP >=7.4
- Laravel >= 6
- illuminate/support >= 6

## Installation

```bash
composer require karim007/laravel-sslwirless-sms
```

### vendor publish (config)

```bash
php artisan vendor:publish --provider="Karim007\LaravelSslwirlessSms\SSLWirlessSmsServiceProvider" --tag="config"
```

After publish config file setup your credential. you can see this in your config directory sslwirless.php file

```
"api_token"=> env("SSLWIRLESS_API_TOKEN", ''),
"sid"=> env("SSLWIRLESS_SID", ''),
"domain"=> env("SSLWIRLESS_DOMAIN", 'https://smsplus.sslwireless.com'),
"message_type"=> env("BOOMCAST_MESSAGE_TYPE", 'EN'),
```

### Set .env configuration

```
SSLWIRLESS_API_TOKEN=''
SSLWIRLESS_SID=""

```

## Usage
### 1. publish controller
```
php artisan vendor:publish --provider="Karim007\LaravelSslwirlessSms\SSLWirlessSmsServiceProvider" --tag="controllers"
```

### 2. Sent Sms SSLWirlessSmsController
```
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Karim007\LaravelSslwirlessSms\Facade\SslWirlessSms;

class SSLWirlessSmsController extends Controller
{
    public function singleSms()
    {
        $phone_number = "0151482467"; // msisdn must be array
        $messageBody = "Test Message";
        $customer_smsId = uniqid(); // $customer_smsId id must be unique
        SslWirlessSms::singleSms($phone_number,$messageBody,$customer_smsId);
    }
    public function bulkSms()
    {
        $phone_number = ["015XXXXXXXX", "017xxxxxxxx"]; // phone_number must be array
        $messageBody = "Test Message";
        $batchCustomerSmsId = uniqid(); // $batchCustomerSmsId id must be unique
        SslWirlessSms::bulkSms($phone_number,$messageBody,$batchCustomerSmsId);
    }
    public function dynamicSms()
    {
        //prepare message data
        // sms_id must be unique
        $messageData = [
            [
                "phone_number" => "015XXXXXXXX",
                "message" => "Test Message 1",
                "sms_id" => uniqid() //must be unique
            ],
            [
                "msisdn" => "017xxxxxxxx",
                "text" => "Test Message 2",
                "sms_id" => uniqid() //must be unique
            ]
        ];
        SslWirlessSms::dynamicSms($messageData);
    }
}
```


Contributions to the sslwirless sms package you are welcome. Please note the following guidelines before submitting your pull
request.

- Follow [PSR-4](http://www.php-fig.org/psr/psr-4/) coding standards.
- Read SslWirlessSms API documentations first. Please contact with SslWirlessSms for their api documentation and sandbox access.

## License

This repository is licensed under the [MIT License](http://opensource.org/licenses/MIT).

Copyright 2023 [md abdul karim](https://github.com/karim-007).
