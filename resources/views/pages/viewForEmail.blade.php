@extends('dashboard')

@section('viewForEmail')



<h1 class="headingPage text-center">Feedback about Quotation(s)</h1>
<br>
<p class="mb-1">
    <b>Name: </b> {{ $pdf_data['name'] }}
</p>
<p class="mb-1">
    <b>Email: </b> {{ $pdf_data['email'] }}
</p>
<p class="mb-1">
    <b>Date: </b> {{ date('d/M/Y') }}
</p>

@if(!empty($pdf_data['quotation']->products))
<table class="table table-borderd mt-5">
    <tr class="bg-dark text-white">
        <th>Product:</th>
        <th>Specifications:</th>
        <th>Feedback:</th>
    </tr>
        @foreach ($pdf_data['quotation']->products as $item)
            @foreach ($pdf_data['quotation']->supplier_feedback as $item2)
                <tr>
                    <td>
                        {{ !empty($item) ? $item->product : 'Product Deleted..' }}
                    </td>
                    <td>
                        {{ !empty($item) ? $item->specification : 'Specifications Deleted!' }}
                    </td>
                    <td>
                        {{ !empty($item2) ? $item2->supplier_feedback : 'No Feedback' }}
                    </td>
                </tr>
            @endforeach
        @endforeach
</table>

@else
    <b><h1 class="text-center text-danger">No Products Yet Selected..</h1></b>
@endif


@endsection
