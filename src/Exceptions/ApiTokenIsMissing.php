<?php

namespace Ziptied\Ledger\Exceptions;

use Exception;

class ApiTokenIsMissing extends Exception
{
    public static function create(): ApiTokenIsMissing
    {
        return new ApiTokenIsMissing('Api token is missing, Please set the LEDGER_API_TOKEN environment variable.');
    }
}