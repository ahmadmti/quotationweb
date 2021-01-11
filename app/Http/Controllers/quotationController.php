<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\product;
use App\Models\Quotation;
use App\Models\supplier;
use App\Models\supplier_quotation;
use Illuminate\Auth\Events\Validated;

class quotationController extends Controller
{
    //Customer List for selection
    public function index(){

        $allData = customer::all();
        return view('pages.addquotation',['allData' => $allData]);
    }

    //get data against specific customer
    public function getCustomer(Request $req){

        $data['customers'] = customer::where('id',$req->id)
                    ->get(['id','name','email','phone','address']);
        return response()->json($data);
    }

    // All Quotations
    public function show(){

        $supplier_name = supplier::all();
        $quotID = Quotation::with('customer')->get();
        return view('pages.quotation',['quotID' => $quotID, 'supplier_name' => $supplier_name]);
    }


    // Get Customer name for editing
    public function getCustomerName(Request $req){

        $data['customer'] = customer::find($req->id);
        return response()->json($data);
    }

    // get products quotations for editing
    public function edit(Request $req){

        $customers = customer::all();
        $editQuots = Quotation::where('id',$req->id)->with('products','customer')->first();
        return view('pages.editquotation',['editQuots'=> $editQuots,'customers'=>$customers]);

    }

    // view detail of specific customer
    public function view(Request $req){

        $viewQuotDetail = Quotation::where('id',$req->id)->with('products')->first();
        return view('pages.view-quot-detail',['viewQuotDetail'=> $viewQuotDetail]);

    }

    // delete quotation ID
    public function destroy(Request $req){

        $delete = Quotation::find($req->id);
        $delete->delete();
        return redirect(url('quotation'));
    }
}
