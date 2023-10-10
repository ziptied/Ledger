<?php

declare(strict_types=1);

namespace Ziptied\Ledger\Resources;

use Illuminate\Http\Client\PendingRequest;
use Ziptied\Ledger\Responses\Log as LogResponse;

class Log
{
    public function __construct(private readonly PendingRequest $client)
    {
    }

    public function publish(array $payload): LogResponse
    {
        if ( ! array_key_exists('user_project', $payload)) {
            $payload['user_project'] = config('ledger.project');
        }

        $response = $this->client
            ->post('log', $payload)
            ->json()['data'];
        ray($response);

        return LogResponse::from($response);
    }
}
