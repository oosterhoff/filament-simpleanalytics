<?php

namespace Oosterhoff\FilamentSimpleanalytics\Commands;

use Illuminate\Console\Command;

class FilamentSimpleanalyticsCommand extends Command
{
    public $signature = 'filament-simpleanalytics';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
