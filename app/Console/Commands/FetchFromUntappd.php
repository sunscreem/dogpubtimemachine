<?php

namespace App\Console\Commands;

use Cache;
use Illuminate\Console\Command;

class FetchFromUntappd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'untappd:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Bar Data From Untappd';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    }
}
