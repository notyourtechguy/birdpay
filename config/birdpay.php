<?php

return [
    'public_key' => env('PAYMAYA_PUBLIC_KEY'),
    'secret_key' => env('PAYMAYA_SECRET_KEY'),
    'environment' => env('PAYMAYA_ENVIRONMENT', 'SANDBOX'),
];
