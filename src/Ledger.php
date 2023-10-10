<?php

declare(strict_types=1);

namespace Ziptied\Ledger;

use Illuminate\Http\Client\PendingRequest;

class Ledger
{
    private string $apiToken;

    private string $baseUri = 'http://logs.revealit.test/api/';

    private PendingRequest $httpClient;

    public static function factory(): Ledger
    {
        return new Ledger();
    }

    public function make(): Client
    {
        $this->httpClient
            ->acceptJson()
            ->asJson()
            ->baseUrl($this->baseUri)
            ->withToken($this->apiToken);

        return new Client($this->httpClient);
    }

    public function withApiToken(string $token): static
    {
        $this->apiToken = trim($token);

        return $this;
    }

    public function withHttpClient(PendingRequest $client): static
    {
        $this->httpClient = $client;

        return $this;
    }
}
