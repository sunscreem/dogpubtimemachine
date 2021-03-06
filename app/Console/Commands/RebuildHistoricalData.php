<?php

namespace App\Console\Commands;

use App\HistoricData;
use Illuminate\Console\Command;
use App\Projectors\HistoryProjector;
use Spatie\EventProjector\Facades\Projectionist;

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

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        HistoricData::truncate();

        $this->info('Starting to rebuild historical data.');

        //From: https://github.com/36864/Event-Sourced-Task-Lists/blob/b0bc7cc7dc04cffe3a3ea1f3a8a9c1706bde13ce/app/Http/Controllers/History/Controller.php#L27
        $projector = Projectionist::addProjector(HistoryProjector::class)->getProjector(HistoryProjector::class);
        $projector->reset();
        Projectionist::replay(collect([$projector]));
        $projector->addFinalDay();

        $this->info('Built data for '.count($projector->data).' days');

        collect($projector->data)->each(function ($dayData) {
            if (! $dayData['data']) {
                return;
            }
            HistoricData::create($dayData);
        });

        $lastEntry = collect($projector->data)->last()['data'];

        $this->info('Done. Right now there are '.count($lastEntry['bars']).' bars showing '.count($lastEntry['beers']).' beers.');
    }
}
