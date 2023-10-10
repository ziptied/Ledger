<?php

declare(strict_types=1);

namespace Ziptied\Ledger;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;
use Ziptied\Ledger\Contracts\ClientContract;
use Ziptied\Ledger\Exceptions\ApiTokenIsMissing;

class LedgerServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/ledger.php',
            'ledger'
        );

        $this->app->singleton(ClientContract::class, function ($app): Client {
            $config = $app['config']['ledger'];

            if ( ! is_string($apiToken = $config['api_token'])) {
                throw ApiTokenIsMissing::create();
            }
            return Ledger::factory()
                ->withApiToken($apiToken)
                ->withHttpClient(Http::asJson())
                ->make();
        });

        $this->app->alias(ClientContract::class, 'ledger');
    }

    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Ziptied\Ledger\Console\InstallCommand::class,
            ]);

            $this->publishes([
                __DIR__.'/../config/ledger.php' => config_path('ledger.php'),
            ], 'ledger-config');
        }
    }

    public function provides(): array
    {
        return [
            'ledger',
            ClientContract::class,
        ];
    }
}
