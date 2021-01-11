<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\Quotation;
use App\Models\supplier;
use Illuminate\Support\Facades\DB;

class CountController extends Controller
{
    //Count Rows from every table
    public function countRows(){

        $count_customers = customer::count();
        $count_suppliers = supplier::count();
        $count_quotation = Quotation::count();
        return view('pages.home',compact('count_suppliers','count_customers','count_quotation'));
    }
}
