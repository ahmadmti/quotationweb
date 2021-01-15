<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\supplier;
use Illuminate\Support\Facades\Log;
use PDF;
use Mail;

class PDFController extends Controller
{
    // Customer Products send to Supplier
    public function generatePDF(Request $req){

        $quotations = Quotation::with('products')->where('id',$req->quot_id)->first();

        foreach($req->ids as $supplier_data){

            $supplier_data = supplier::find($supplier_data);

            $pdf = PDF::loadView('myPDF',['quotations' => $quotations, 'supplier_data' => $supplier_data])
                ->setPaper('a4', 'portrait');
            \Storage::disk('local')->put('quotation/quotation_'.$req->quot_id.'.pdf', $pdf->output());

            \Storage::disk('local')->url('quotation/quotation_'.$req->quot_id.'.pdf');
            Log::debug('to_email'.$supplier_data->email);
            Mail::send('myPDF', ['quotations' => $quotations,'supplier_data' => $supplier_data], function($message) use ($pdf, $supplier_data) {
                $message->to($supplier_data->email, $supplier_data->name);
                $message->subject("Product Quotation Review");
                $message->from(config('mail.from.address'));
                $message->attachData($pdf->output(),'Quotation.pdf');
            });
        }
        return back()->with('email-sent','Email(s) sent Successfully!');
    }

// Supplier Feedback
    public function sendFeedbackInPDF(Request $req, $id){

            $pdf_data_final = customer::with('quotation.products','quotation.supplier_feedback')->where('id',$id)->first();
            // return $pdf_data_final;
            // return view('/pages.viewForEmail',['pdf_data_final' => $pdf_data_final]);

            $data = customer::find($req->id);

            $pdf = PDF::loadView('/readyPDF',['pdf_data_final' => $pdf_data_final])->setPaper('a4', 'portrait');
            \Storage::disk('local')->put('feedback/feedback_'.$data->id.'.pdf', $pdf->output());

            \Storage::disk('local')->url('feedback/feedback_'.$data->id.'.pdf');

            Mail::send('/readyPDF',['pdf_data_final' => $pdf_data_final], function($message) use ($pdf, $data) {
                $message->to($data->email, $data->name);
                $message->subject("Feedback of Your Quotation.");
                $message->from(config('mail.from.address'));
                $message->attachData($pdf->output(),'feedback.pdf');
            });

        return 'ok';
        // return back()->with('email-sent','Email(s) sent Successfully!');
    }
}
