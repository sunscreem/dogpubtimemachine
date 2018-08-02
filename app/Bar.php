<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use App\Events\BarCreated;

class Bar extends Model
{
    protected $guarded = [];

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

    /*
     * A helper method to quickly retrieve a bar by uuid.
     */
    public static function uuid(string $uuid): ?Bar
    {
        return static::where('uuid', $uuid)->first();
    }
}
