<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;
    protected $table = 'quotations';

    public function customer(){
        return $this->belongsTo(customer::class,'customer_id','id');
    }

    public function products(){
        return $this->hasMany(product::class,'quotation_id','id');
    }

}
