<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\Quotation;
use App\Models\Supplier_Feedback;
use Illuminate\Http\Request;
use PDF;
use Mail;



class SupplierFeedbackController extends Controller
{
    // get products quotations for editing
    public function feedback(Request $req)
    {

        $customers_data = customer::all();
        $view_quot_for_feedback = Quotation::where('id',$req->id)->with('products','customer')->first();
        return view('pages.supplier_feedback',['view_quot_for_feedback'=> $view_quot_for_feedback,'customers_data'=>$customers_data]);
    }


    public function storeFeedback(Request $req)
    {

        $feedbacks = $req->feedback;
        $quotation_id = $req->quot_id;

        foreach ($feedbacks as $key => $feedback){

            $feedback_object = new Supplier_Feedback;
            $feedback_object->customer_id = $req->c_id;
            $feedback_object->product_id = $req->product_id[$key];
            $feedback_object->quotation_id = $quotation_id;
            $feedback_object->supplier_feedback = $feedback;
            $feedback_object->save();

        }
        return redirect(url('pdf'));
    }


    public function getFeedbackData(Request $req){

        $feedback = Supplier_Feedback::with('products','customer')->first();
        return $feedback;
        return view('customerPDF',['feedback' => $feedback]);

    }

}