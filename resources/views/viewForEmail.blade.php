@extends('dashboard')

@section('pdfPreview')



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
{{-- {{$pdf_data['quotation']->id}} --}}

@if(!empty($pdf_data['quotation']->products))
<table class="table table-borderd mt-5">
    <tr class="bg-dark text-white">
        <th>Product:</th>
        <th>Specifications:</th>
        <th>Feedback:</th>
    </tr>

    @foreach ($pdf_data['quotation']->products as $item)
        <tr id="row_parent_feedback_{{$item->id}}">
            <td>
                {{ $item->product }}
            </td>
            <td>
                {{ $item->specification }}
            </td>
            <td>
                @if (!empty($item->feedback->supplier_feedback))
                    {{$item->feedback->supplier_feedback}}
            </td>
            @else
                <h5 class="text-danger">No feedback added Yet..
                    <a class="text-primary" href="{{url('supplier_feedback/'.$pdf_data['quotation']->id)}}">Click to add feedback</a>
                </h5>
            @endif
        </tr>
    @endforeach
</table>
@if (!empty($item->feedback->supplier_feedback))
    <a style="float: right" href='{{url('send-feedback-pdf/'.$pdf_data['id'])}}' class="btn btn-primary">Send</a>
@endif
    @else
    <b><h1 class="text-center text-danger">No Products Yet Selected..</h1></b>
        <br>
    <b><h5 class="text-center text-primary"><a href="{{url('/add_quots')}}">Click to add Products</a></h5></b>
@endif


@endsection


