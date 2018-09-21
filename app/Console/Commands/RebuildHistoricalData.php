<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Spatie\EventProjector\Facades\Projectionist;
use App\Projectors\HistoryProjector;

class RebuildHistoricalData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:rebuild';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Processes all the historical data for the app';

    protected $targetEndDate;

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
        $this->targetEndDate = Carbon::parse(config('site.timeMachineStartDate'));

        $this->targetEndDate = now();

        $this->buildDataUpToDate();
    }

    public function buildDataUpToDate()
    {
        //From: https://github.com/36864/Event-Sourced-Task-Lists/blob/b0bc7cc7dc04cffe3a3ea1f3a8a9c1706bde13ce/app/Http/Controllers/History/Controller.php#L27
        $projector = Projectionist::addProjector(HistoryProjector::class)->getProjector(HistoryProjector::class);
        $projector->reset();
        $projector->setTargetEndDate($this->targetEndDate);
        Projectionist::replay(collect([$projector]));

        dd(collect($projector->data['bars'])->pluck('name')->sort());
        // return Session::get('beers', collect());
    }
}
