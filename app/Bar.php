<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use App\Events\BarCreated;
use Illuminate\Support\Collection;
use App\Events\AttachBeerToBar;
use App\Events\RemoveBeerFromBar;

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
        $current = array_keys($this->beers->toArray());

        // first lets see what needs attached
        $toBeAttached = collect(array_diff($beers, $current));

        // now lets see what needs detached
        $toBeDetached = collect(array_diff($current, $beers));

        $toBeAttached->each(function ($beerId) {
            event(new AttachBeerToBar(['beer_id' => $beerId,
                                        'bar_id' => $this->id,
                                        'uuid' => (string) Uuid::uuid4()]));
        });

        $toBeDetached->each(function ($beerId) {
            event(new RemoveBeerFromBar(['beer_id' => $beerId,
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
