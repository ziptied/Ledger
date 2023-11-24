<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Ledger API Token
    |--------------------------------------------------------------------------
    |
    | Define your Ledger API token for authentication.
    |
    */

    'api_token' => env('LEDGER_API_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | Ledger Project Identifier
    |--------------------------------------------------------------------------
    |
    | Specify the unique identifier for your Ledger project. It's used
    | to associate events with a specific project within your Ledger account.
    |
    */

    'project' => env('LEDGER_PROJECT'),

    /*
    |--------------------------------------------------------------------------
    | Ledger Default Channel ID
    |--------------------------------------------------------------------------
    |
    | Specify the unique Channel for your Ledger Events. It's used
    | to associate events with a specific Channel within your Ledger account.
    |
    */

    'channel' => env('LEDGER_CHANNEL'),

    /*
    |--------------------------------------------------------------------------
    | Ledger Project URL
    |--------------------------------------------------------------------------
    |
    | Specify the unique URL for your Ledger project. It's used
    | to pass events to your Ledger account.
    |
    */

    'uri' => env('LEDGER_URI'),

    /*
    |--------------------------------------------------------------------------
    | Ledger Queue name
    |--------------------------------------------------------------------------
    |
    | Specify the Queue name for your Ledger events to be processed on.
    | Ensure this queue has workers to complete sending of events.
    |
    */

    'queue' => env('LEDGER_URI', 'default'),

];
