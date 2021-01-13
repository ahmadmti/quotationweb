<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\supplier;
use PDF;
use Mail;

class PDFController extends Controller
{

    public function generatePDF(Request $req){

        $quotations = Quotation::with('products')->where('id',$req->quot_id)->first();

        foreach($req->ids as $supplier_data){

            $supplier_data = supplier::find($supplier_data);

            $pdf = PDF::loadView('myPDF',['quotations' => $quotations, 'supplier_data' => $supplier_data])
                ->setPaper('a4', 'portrait');
            \Storage::disk('local')->put("quotation/quotation_$req->quot_id.pdf", $pdf->output());

            \Storage::disk('local')->url('quotation/quotation_'.$req->quot_id.'.pdf');

            Mail::send('myPDF', ['quotations' => $quotations,'supplier_data' => $supplier_data], function($message) use ($pdf, $supplier_data) {
                $message->to($supplier_data->email, $supplier_data->name);
                $message->subject("Product Quotation Review");
                $message->from('noreply@gainabit.geeklone.com');
                $message->attachData($pdf->output(),'Quotation.pdf');
            });
        }
        return back()->with('email-sent','Email(s) sent Successfully!');
    }
}
