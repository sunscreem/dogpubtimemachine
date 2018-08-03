<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Ramsey\Uuid\Uuid;
use App\Events\BeerCreated;
use Spatie\SchemalessAttributes\SchemalessAttributes;

class Beer extends Model
{
    protected $guarded = [];

    protected $appends = ['nameAndBrewery', 'totalBars'];

    protected $hidden = ['uuid', 'created_at', 'updated_at'];

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

    public static function createWithAttributes(array $attributes): Beer
    {
        $attributes['uuid'] = (string) Uuid::uuid4();

        event(new BeerCreated($attributes));

        return static::uuid($attributes['uuid']);
    }

    public function bars()
    {
        return $this->belongsToMany(\App\Bar::class);
    }

    public function getNameAndBreweryAttribute()
    {
        return $this->name . ' / ' . $this->brewery;
    }

    public function getTotalBarsAttribute()
    {
        return $this->bars()->count();
    }

    /*
     * A helper method to quickly retrieve a beer by uuid.
     */
    public static function uuid(string $uuid): ?Beer
    {
        return static::where('uuid', $uuid)->first();
    }
}
