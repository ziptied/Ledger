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
    | Specify the unique identifier for your LogSnag project. It's used
    | to associate events with a specific project within your LogSnag account.
    | You can find this identifier in the project settings of your LogSnag dashboard.
    |
    */

    'project' => env('LOGSNAG_PROJECT'),

];