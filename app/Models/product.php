<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['id'];
    public function customer(){

        return $this->belongsTo(customer::class,'customer_id','id');
    }
    public function quotation(){

        return $this->belongsTo(Quotation::class,'quotation_id','id');
    }


}
