<?php

declare(strict_types=1);

namespace Ziptied\Ledger\Contracts;

use Ziptied\Ledger\Resources\Log;

interface ClientContract
{
    /**
     * Publish an event to Ledger.
     *
     * This method allows you to send events to Ledger. These events can be
     * any significant occurrences you want to monitor in your application.
     */
    public function log(): Log;
}
