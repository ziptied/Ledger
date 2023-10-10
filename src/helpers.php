<?php

namespace Ziptied\Ledger;

use Ziptied\Ledger\Contracts\ClientContract;

/**
 * Get the Ledger client instance.
 */
function logsnag(): ClientContract
{
    return app(ClientContract::class);
}