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
        $config = [
            'clientId' => config('untappd.clientId'),
            'clientSecret' => config('untappd.clientSecret'),
            'accessToken' => config('untappd.accessToken'),
            'redirectUri' => config('untappd.redirectUri'),
        ];

        $untappd = new \Pintlabs_Service_Untappd($config);

        $result = Cache::remember('untappd', 15, function () use ($untappd) { // just for dev - will fix this after
            try {
                return $result = $untappd->venueInfo(4002997); // hard coded a single venue for now
            } catch (Pintlabs_Service_Untappd_Exception $e) {
                die($e->getMessage());
            }
        });

        dd($result->response->venue);
    }
}
