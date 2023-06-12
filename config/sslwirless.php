<?php

return [
    "api_token"=> env("SSLWIRLESS_API_TOKEN", ''),
    "sid"=> env("SSLWIRLESS_SID", ''),
    "domain"=> env("SSLWIRLESS_DOMAIN", 'https://smsplus.sslwireless.com'),
    "message_type"=> env("BOOMCAST_MESSAGE_TYPE", 'BN'),
];
