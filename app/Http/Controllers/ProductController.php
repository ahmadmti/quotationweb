<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\customer;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;

class ProductController extends Controller{

    public function store(Request $req){

        $this->validate($req, [
            'id' => 'required',
            'product' => 'required',
            'specification' => 'required',
        ]);

        $quotation = new Quotation;
        $quotation->customer_id = $req->id;
        $quotation->save();
        $products = $req->product;
        $specifications = $req->specification;
        foreach ($products as $key => $product){

            if(!empty($product)){

                $product_object = new product;
                $product_object->quotation_id = $quotation->id;
                $product_object->product = $product;
                $product_object->specification = $specifications[$key];
                $product_object->save();
            }
        }
        return redirect(url('add_quots'))->with('success','Product Quotation Saved!');
    }

    public function customFilter($array){
        $new_array = [];
        foreach ($array as $key => $item) {
            if(!empty($item)){
                array_push($new_array,$item);
            }
        }
        return $new_array;
    }
    public function update(Request $req){
        $products = $this->customFilter($req->product);
        $specifications = $this->customFilter($req->specification);
        $product_ids = $req->product_id;
        foreach ($products as $key => $product) {

            if(!empty($product)){
                $updated_object = new product();
                if(isset($product_ids[$key])){
                    $updated_object = product::find($product_ids[$key]);
                }
                $updated_object->quotation_id = $req->id;
                $updated_object->product = $product;
                $updated_object->specification = $specifications[$key];
                $updated_object->save();
            }
        }
        return redirect(url('quotation'));
    }


    public function deleteProduct(Request $req){

        $product = product::find($req->id);
        $product->delete();
        return response()->json(['status'=> 'success', 'Are you sure you want to delete. if you delete you cannot recover']);
    }

}
