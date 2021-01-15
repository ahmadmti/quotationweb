
<head>
    <style>
        table, th, td {
            border: 1px solid black;
            height: 40px;
        }
    </style>
</head>
<body>

    <h1>Feedback about Quotation(s)</h1>
    <br>

    <p class="mb-1">
        <b>Name: </b> {{ $pdf_data_final['name'] }}
    </p>
    <p class="mb-1">
        <b>Email: </b> {{ $pdf_data_final['email'] }}
    </p>
    <p class="mb-1">
        <b>Date: </b> {{ date('d/M/Y') }}
    </p>
    {{-- {{$pdf_data_final['quotation']->id}} --}}

    @if(!empty($pdf_data_final['quotation']->products))
    <table style="width: 100%">
        <tr>
            <th>Product:</th>
            <th>Specifications:</th>
            <th>Feedback:</th>
        </tr>

        @foreach ($pdf_data_final['quotation']->products as $item)
            <tr>
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
                        <a href="{{url('supplier_feedback/'.$pdf_data_final['quotation']->id)}}">Click to add feedback</a>
                    </h5>
                @endif
            </tr>
        @endforeach
    </table>
    @if (!empty($item->feedback->supplier_feedback))
        {{-- <a style="float: right" href='{{url('send-feedback-pdf/'.$pdf_data_final['id'])}}' class="btn btn-primary">Send</a> --}}
    @endif
        @else
        <b><h1 class="text-center text-danger">No Products Yet Selected..</h1></b>
            <br>
        <b><h5 class="text-center text-danger"><a href="{{url('/add_quots')}}">Click to add Products</a></h5></b>
    @endif


</body>
