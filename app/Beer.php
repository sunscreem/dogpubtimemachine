<?php

namespace App;

use Ramsey\Uuid\Uuid;
use App\Events\BeerCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\SchemalessAttributes\SchemalessAttributes;

class Beer extends Model
{
    protected $primaryKey = 'uuid';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $guarded = [];

    protected $appends = ['barUUIDs'];

    protected $hidden = ['bars', 'created_at', 'updated_at'];

    protected $with = ['bars'];

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

    public static function createWithAttributes(array $attributes): self
    {
        $attributes['uuid'] = (string) Uuid::uuid4();

        event(new BeerCreated($attributes));

        return static::uuid($attributes['uuid']);
    }

    public function bars()
    {
        return $this->belongsToMany(\App\Bar::class);
    }

    public function getBarUUIDsAttribute()
    {
        return $this->bars->pluck('uuid');
    }

    // public function getTotalBarsAttribute()
    // {
    //     return $this->bars()->count();
    // }

    /*
     * A helper method to quickly retrieve a beer by uuid.
     */
    public static function uuid(string $uuid): ?self
    {
        return static::where('uuid', $uuid)->first();
    }
}
