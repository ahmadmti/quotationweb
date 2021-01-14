<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use App\Models\{country,state,city, Quotation};


class CustomerController extends Controller
{


    public function create(){

        $data['countries'] = country::get(["country_name","country_id"]);
        return view('pages.addCustomer',$data);
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


    public function store(Request $req){

        // Validations
        $this->validate($req, [
            'name' => 'required | max:255',
            'email' => 'required',
        ]);


        if(!empty(customer::where('email',$req->email)->first())){
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'email' => ['Email already exist.'],
            ]);
            throw $error;
        }
        // Add Model
        $customer = new customer;
        $customer->name = $req->name;
        $customer->email = $req->email;
        $customer->phone = $req->number;
        $customer->address = $req->address;
        $customer->city = $req->city;
        $customer->state = $req->state;
        $customer->country = $req->country;


        $customer->save();

        return redirect(url('addCustomer'))->with('success','Customer added!');


    }



    public function show(){

        //
        $customers = customer::with('countries','states','cities')->orderBy('id','DESC')->get();
        return view('/pages.customer',['customers' => $customers]);
    }



    public function edit($id){

        //
        $data = customer::find($id);
        return view('/pages.edit_customer',['data' => $data]);
    }


    public function viewForEmail($id){

        $pdf_data = customer::with('quotation.products','quotation.supplier_feedback')->where('id',$id)->first();
        // return $pdf_data;
        return view('/pages.viewForEmail',['pdf_data' => $pdf_data]);

    }



    public function update(Request $req){

        // Validations
        $this->validate($req, [
            'name' => 'required | max:255',
            'email' => 'required',
        ]);

        $customer = Customer::find($req->id);
        if(!empty(customer::where('email',$req->email)->first()) && $customer->email != $req->email){
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'email' => ['Email already exist.'],
            ]);
            throw $error;
        }
        // Add Model
        $edit = customer::find($req->id);
        $edit->name = $req->name;
        $edit->email = $req->email;
        $edit->phone = $req->number;
        $edit->address = $req->address;


        $edit->save();
        return redirect(url('customer'))->with('success','Record updated successfully!');

    }


        public function customerDetail(Request $req){

            $customerDetial = customer::find($req->id);
            return view('pages.customer_detail',['customerDetial' => $customerDetial]);
        }



    public function destroy(Request $req,$id)
    {
        //
        $delete = customer::find($id);
        $delete->delete();

        return redirect(url('customer'))->with('delete_message','Record Deleted successfully!');

    }
}
