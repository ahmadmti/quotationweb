<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\supplier;
use Illuminate\Support\Facades\DB;
use PDF;
use Mail;

class PDFController extends Controller
{

    public function generatePDF(Request $req){

        $quotations = Quotation::with('products')->where('id',$req->quot_id)->first();


        foreach($req->ids as $supplier_data){

            $supplier_data = supplier::find($supplier_data);
            $pdf_path = 'quotation/quotation_'.$req->quot_id.'.pdf';

            DB::table('supplier_quotations')->insert([
                'supplier_id' => $supplier_data->id,
                'quotation_id' => $req->quot_id,
                // 'pdf_url' => $pdf_path
            ]);

            $pdf = PDF::loadView('myPDF',['quotations' => $quotations, 'supplier_data' => $supplier_data])
                    ->setPaper('a4', 'portrait');
            \Storage::disk('local')->put($pdf_path, $pdf->output());

            \Storage::disk('local')->url($pdf_path);

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
