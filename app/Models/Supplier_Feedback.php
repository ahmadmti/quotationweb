<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier_Feedback extends Model
{
    use HasFactory;


    public function customers(){
        return $this->belongsTo(customer::class,'customer_id','id');
    }

    public function quotations(){
        return $this->belongsTo(Quotation::class,'quotation_id','id');
    }
}
