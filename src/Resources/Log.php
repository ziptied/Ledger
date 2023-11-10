<?php

declare(strict_types=1);

namespace Ziptied\Ledger\Resources;

use Illuminate\Http\Client\PendingRequest;
use Ziptied\Ledger\Jobs\LogJob;
use Ziptied\Ledger\Responses\Log as LogResponse;

class Log
{
    public function __construct(private readonly PendingRequest $client)
    {
    }

    public function publish(array $payload): LogResponse
    {
        $payload['user_project'] ??= config('ledger.project');
        $payload['channel'] ??= config('ledger.channel');
//        $response = $this->client
//            ->post('log', $payload)
//            ->json()['data'];
        LogJob::dispatch($payload)->onQueue('default');
        return LogResponse::from([
            'user_project' => $payload['user_project'],
            'channel' => $payload['channel'],
            'event' => $payload['event'],
        ]);
    }
}
