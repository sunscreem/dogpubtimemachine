<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use App\Events\BarCreated;
use Illuminate\Support\Collection;
use App\Events\BeerAttachedToBar;
use App\Events\BeerDetachedFromBar;

class Bar extends Model
{
    protected $guarded = [];

    protected $dates = ['tap_list_last_updated'];

    public function beers()
    {
        return $this->belongsToMany(\App\Beer::class);
    }

    public static function createWithAttributes(array $attributes): Bar
    {
        /*
         * Let's generate a uuid.
         */
        $attributes['uuid'] = (string) Uuid::uuid4();

        /*
         * The account will be created inside this event using the generated uuid.
         */
        event(new BarCreated($attributes));

        /*
         * The uuid will be used the retrieve the created account.
         */
        return static::uuid($attributes['uuid']);
    }

    public function syncBeers(Collection $beers): array
    {
        $beers = $beers->toArray();
        $current = $this->beers->pluck('id')->toArray();

        $toBeAttached = collect(array_diff($beers, $current))->unique(); //unique as sometimes bars accidentally have a beer on twice

        $toBeDetached = collect(array_diff($current, $beers))->unique();

        $toBeAttached->each(function ($beerId) {
            event(new BeerAttachedToBar(['beer_id' => $beerId,
                                        'bar_id' => $this->id,
                                        'uuid' => (string) Uuid::uuid4()]));
        });

        $toBeDetached->each(function ($beerId) {
            event(new BeerDetachedFromBar(['beer_id' => $beerId,
                                        'bar_id' => $this->id]));
        });

        return ['attached' => $toBeAttached,
                'detached' => $toBeDetached];
    }

    /*
     * A helper method to quickly retrieve a bar by uuid.
     */
    public static function uuid(string $uuid): ?Bar
    {
        return static::where('uuid', $uuid)->first();
    }
}
