<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;
    protected $table = 'quotations';

    public function countries(){
        return $this->belongsTo(country::class,'country','country_id');
    }
    public function states(){
        return $this->belongsTo(state::class,'state','states_id');
    }
    public function cities(){
        return $this->belongsTo(city::class,'city','city_id');
    }

    public function customer(){
        return $this->belongsTo(customer::class,'customer_id','id');
    }

    public function products(){
        return $this->hasMany(product::class,'quotation_id','id');
    }

    public function supplier_feedback(){
        return $this->hasMany(Supplier_Feedback::class,'quotation_id','id');
    }

}
