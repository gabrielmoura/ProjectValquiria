<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class ScheduleWorkCommand
 * @package App\Console\Commands
 */
class ScheduleWorkCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'schedule:work';
    /**
     * @var string
     */
    protected $name = 'schedule:work';
    /**
     * @var string
     */
    protected $description = 'Start the schedule worker';

    /**
     * ScheduleWorkCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Schedule worker started successfully.');

        while (true) {
            if (now()->second === 0) {
                $this->call('schedule:run');
            }

            sleep(1);
        }
    }
}
