<?php
namespace App\Helper;
use PDF;
use Illuminate\Support\Facades\Storage;

function sendPdfEmail($data,$id){

    if(!Storage::disk('local')->has("quotation/quotation_$id.pdf")){

        storeInvoice($data,$id);
    }
    Mail::send('emails.student_invoice', $data, function ($message) use ($data,$id) {

        $message->to($data['user_email'] , $data['user_name'])
            ->subject("Product Quotation Review");
        $message->from('noreply@qslearning.co.uk', 'QS Learning - Invoice');
        $message->attach(public_path("quotation_$id.pdf"), [
            'as' => "quotation_$id.pdf",
            'mime' => 'application/pdf',
        ]);
    });
}
function storeInvoice($data, $id){

        $pdf = PDF::loadView('quotation_report', $data);
        \Storage::disk('local')->put("quotation/quotation_$id.pdf", $pdf->output());
}
