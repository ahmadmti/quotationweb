<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier_Feedback extends Model
{
    use HasFactory;


    public function customer(){
        return $this->belongsTo(customer::class,'customer_id','id');
    }

    public function product(){
        return $this->belongsTo(product::class,'product_id','id');
    }
}
