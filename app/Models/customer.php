<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    public function countries(){
        return $this->belongsTo(country::class,'country','country_id');
    }
    public function states(){
        return $this->belongsTo(state::class,'state','states_id');
    }
    public function cities(){
        return $this->belongsTo(city::class,'city','city_id');
    }
}
