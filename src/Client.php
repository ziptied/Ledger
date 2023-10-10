<?php

declare(strict_types=1);

namespace Ziptied\Ledger;

use Illuminate\Http\Client\PendingRequest;
use Ziptied\Ledger\Contracts\ClientContract;
use Ziptied\Ledger\Resources\Log;

class Client implements ClientContract
{
    public function __construct(private readonly PendingRequest $client)
    {
    }

    //    public function identify(): Identify
    //    {
    //        return new Identify($this->client);
    //    }
    //
    //    public function insight(): Insight
    //    {
    //        return new Insight($this->client);
    //    }

    public function log(): Log
    {
        return new Log($this->client);
    }
}
