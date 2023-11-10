<?php

declare(strict_types=1);

namespace Ziptied\Ledger\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class LogJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    private PendingRequest $httpClient;

    public function __construct(
        private readonly array $payload
    ) {
    }

    public function handle(): void
    {
        Http::withToken(config('ledger.api_token'))
            ->post(config('ledger.uri').'/api/log', $this->payload);
    }
}
