<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;
use App\Models\{country,state,city};


class SupplierController extends Controller
{

    // Country
    public function create(){

        $data['countries'] = country::get(["country_name","country_id"]);
        return view('pages.addSupplier',$data);
    }
    // State
    public function getState(Request $req){

        $data['states'] = state::where("country_id",$req->country_id)
                    ->get(["states_name","states_id"]);
        return response()->json($data);
    }
    // City
    public function getCity(Request $req){

        $data['cities'] = city::where("states_id",$req->states_id)
                    ->get(["city_name","city_id"]);
        return response()->json($data);
    }




    // Store Data to Supplier Page
    public function store(Request $req)
    {
        // Validations
        $this->validate($req, [
            'name' => 'required | max:255',
            'email' => 'required',
            'mobile' => 'required | digits: 11',
            'phone' => 'required | digits: 10',
            'shop_address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',

        ]);

        if(!empty(supplier::where('email',$req->email)->first())){
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'email' => ['Email already exist.'],
            ]);
            throw $error;
        }


        // Add Model
        $supplier = new supplier;
        $supplier->name = $req->name;
        $supplier->email = $req->email;
        $supplier->mobile = $req->mobile;
        $supplier->phone = $req->phone;
        $supplier->fax = $req->fax;
        $supplier->shop_address = $req->shop_address;
        $supplier->country = $req->country;
        $supplier->state = $req->state;
        $supplier->city = $req->city;

        $supplier->save();

        return redirect(url('/add_supplier'))->with('success','Record added successfully!');
    }



    public function show()
    {
        //
        $supplier = supplier::with('countries','states','cities')->get();
        return view('/pages.supplier',['supplier'=> $supplier]);
    }



    public function edit(Request $req)
    {
        $editData = supplier::find($req->id);
        return view('/pages.edit_supplier', ['editData' => $editData]);
    }



    // Update
    public function update(Request $req)
    {
        //
         // Validations
        $this->validate($req, [
            'name' => 'required | max:255',
            'email' => 'required',
            'mobile' => 'required | digits: 11',
            'phone' => 'required | digits: 10',
            // 'shop_address' => 'required',
            // 'city' => 'required',
            // 'country' => 'required',
            // 'state' => 'required',
        ]);

        $supplier = supplier::find($req->id);
        if(!empty(supplier::where('email',$req->email)->first()) && $supplier->email != $req->email){
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'email' => ['Email already exist.'],
            ]);
            throw $error;
        }

        // Add Model
        $edit_supplier = supplier::find($req->id);
        $edit_supplier->name = $req->name;
        $edit_supplier->email = $req->email;
        $edit_supplier->mobile = $req->mobile;
        $edit_supplier->phone = $req->phone;
        $edit_supplier->fax = $req->fax;
        // $edit_supplier->shop_address = $req->shop_address;
        // $edit_supplier->city = $req->city;
        // $edit_supplier->state = $req->state;
        // $edit_supplier->country = $req->country;

        $edit_supplier->save();

        return redirect(url('/supplier'))->with('success','Record Updated successfully!');

    }

    public function supplierDetail(Request $req){

        $supplierDetail = supplier::find($req->id);
        return view('pages.supplier_detail',['supplierDetail' => $supplierDetail]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        $deleteSupplier = supplier::find($req->id);
        $deleteSupplier->delete();
        return redirect(url('supplier'))->with('delete_message','Record Deleted Successfully!');
    }
}
