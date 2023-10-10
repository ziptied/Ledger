<?php

declare(strict_types=1);

namespace Ziptied\Ledger\Console;

use Illuminate\Console\Command;
use function Safe\exec;

class InstallCommand extends Command
{
    protected $description = 'Install the Ledger configuration file.';

    protected $name = 'ledger:install';

    public function handle(): int
    {
        $this->callSilently('vendor:publish', [
            '--tag' => 'ledger-config',
        ]);

        if ($this->confirm('Would you like to star the repo on GitHub?')) {
            $url = 'https://github.com/ziptied/ledger';

            $command = [
                'Darwin' => 'open',
                'Linux' => 'xdg-open',
                'Windows' => 'start',
            ][PHP_OS_FAMILY] ?? null;

            if ($command) {
                exec("{$command} {$url}");
            }
        }

        $this->info('Ledger has been installed!');

        return self::SUCCESS;
    }
}
