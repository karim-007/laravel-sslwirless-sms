<?php

namespace Karim007\LaravelSslwirlessSms\Sms;
class SslWirlessSms extends BaseApi
{

    /**
     * @param $phone_number
     * @param $messageBody
     * @param $transaction_no
     */
    public function singleSms($phone_number, $messageBody, $transaction_no)
    {
        $params = [
            "api_token" => $this->api_token,
            "sid" => $this->sid,
            "sms" => $messageBody,
            "msisdn" => $phone_number,
            "csms_id" => $transaction_no
        ];
        $url = trim($this->baseUrl, '/')."/api/v3/send-sms";
        $params = json_encode($params);

        return $this->callApi($url, $params);
    }

    /**
     * @param $phone_numbers
     * @param $messageBody
     * @param $transaction_no
     */
    public function bulkSms($phone_numbers, $messageBody, $transaction_no)
    {
        $params = [
            "api_token" => $this->api_token,
            "sid" => $this->sid,
            "sms" => $messageBody,
            "msisdn" => $phone_numbers,
            "batch_csms_id" => $transaction_no
        ];
        $url = trim($this->domain, '/')."/api/v3/send-sms/bulk";
        $params = json_encode($params);

        return $this->callApi($url, $params);
    }

    /**
     * @param $messageData
     */
    public function dynamicSms($messageData)
    {
        $data=[];
        foreach ($messageData as $msg){
            $data[]=[
                "msisdn" => $msg['phone_number'],
                "text" => $msg['message'],
                "csms_id" => $msg['sms_id'],
            ];
        }
        $params = [
            "api_token" => $this->api_token,
            "sid" => $this->sid,
            "sms" => $data,
        ];
        $params = json_encode($params);
        $url = trim($this->domain, '/')."/api/v3/send-sms/dynamic";
        return $this->callApi($url, $params);
    }
    private function callApi($url, $params)
    {
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($params),
            'accept:application/json'
        ));
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

}
