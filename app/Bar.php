<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    protected $fillable = ['last_updated', 'tap_list_last_updated'];

    protected $dates = ['tap_list_last_updated'];

    public function beers()
    {
        return $this->belongsToMany(\App\Beer::class);
    }
}
