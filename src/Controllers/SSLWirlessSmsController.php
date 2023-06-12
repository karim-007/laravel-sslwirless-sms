<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Karim007\LaravelSslwirlessSms\Facade\SslWirlessSms;

class SSLWirlessSmsController extends Controller
{
    public function singleSms()
    {
        $phone_number = "015XXXXXXXX"; // msisdn must be array
        $messageBody = "Test Message";
        $customer_smsId = uniqid(); // $customer_smsId id must be unique
        SslWirlessSms::singleSms($phone_number,$messageBody,$customer_smsId);
    }
    public function bulkSms()
    {
        $phone_number = ["019XXXXXXXX", "018xxxxxxxx"]; // msisdn must be array
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
