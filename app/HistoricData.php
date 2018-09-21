<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoricData extends Model
{
    protected $fillable = ['dataEndsAtDate', 'data'];

    protected $dates = ['dataEndsAtDate'];

    protected $casts = ['data' => 'array'];
}
