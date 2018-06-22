<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    protected $fillable = ['name', 'brewery'];

    protected $appends = ['nameAndBrewery', 'totalBars'];

    public function bars()
    {
        return $this->belongsToMany('App\Bar');
    }

    public function getNameAndBreweryAttribute()
    {
        return $this->name . ' / ' . $this->brewery;
    }

    public function getTotalBarsAttribute()
    {
        return $this->bars()->count();
    }
}
