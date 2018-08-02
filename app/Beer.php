<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use App\Events\BeerCreated;

class Beer extends Model
{
    protected $guarded = [];

    public static function createWithAttributes(array $attributes): Beer
    {
        $attributes['uuid'] = (string) Uuid::uuid4();

        event(new BeerCreated($attributes));

        return static::uuid($attributes['uuid']);
    }

    /*
     * A helper method to quickly retrieve a beer by uuid.
     */
    public static function uuid(string $uuid): ?Beer
    {
        return static::where('uuid', $uuid)->first();
    }
}
