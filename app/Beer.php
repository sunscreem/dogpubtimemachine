<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    protected $fillable = ['name', 'brewery'];

    public function bars()
    {
        return $this->belongsToMany('App\Bar');
    }
}
