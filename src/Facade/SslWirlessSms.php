<?php

namespace Karim007\LaravelSslwirlessSms\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @method static singleSms($phone_number, $messageBody, $transaction_no)
 * @method static bulkSms($phone_numbers, $messageBody, $transaction_no)
 * @method static dynamicSms($messageData)
 */
class SslWirlessSms extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sslwirlesssms';
    }
}
