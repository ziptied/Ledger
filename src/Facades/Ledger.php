<?php

declare(strict_types=1);

namespace Ziptied\Ledger\Facades;

use Illuminate\Support\Facades\Facade;
use Ziptied\Ledger\Contracts\ClientContract;

class Ledger extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ClientContract::class;
    }
}
