<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Ramsey\Uuid\Uuid;
use App\Events\BarCreated;
use Illuminate\Support\Collection;
use App\Events\BeerAttachedToBar;
use App\Events\BeerDetachedFromBar;
use Spatie\SchemalessAttributes\SchemalessAttributes;
use App\Events\BarUpdated;

class Bar extends Model
{
    protected $guarded = [];

    protected $dates = ['tap_list_last_updated'];

    public $casts = [
        'extra_attributes' => 'array',
    ];

    public function getExtraAttributesAttribute() : SchemalessAttributes
    {
        return SchemalessAttributes::createForModel($this, 'extra_attributes');
    }

    public function scopeWithExtraAttributes() : Builder
    {
        return SchemalessAttributes::scopeWithSchemalessAttributes('extra_attributes');
    }

    public function beers()
    {
        return $this->belongsToMany(\App\Beer::class);
    }

    public static function createWithAttributes(array $attributes): Bar
    {
        $attributes['uuid'] = (string) Uuid::uuid4();

        event(new BarCreated($attributes));

        return static::uuid($attributes['uuid']);
    }

    public function updateWithAttributes(array $attributes)
    {
        $attributes['bar_id'] = $this->id;

        event(new BarUpdated($attributes));
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
