@extends('dashboard')

@section('customerPDF')


        <h1 class="headingPage"><b>Feedbacks About Product(s)</b></h1>

        <div class="row mt-5">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <table class="table table-hover display" id="example" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Sr #:</th>
                            <th>Customer Name:</th>
                            <th>Product:</th>
                            <th>Specifications:</th>
                            <th>Feedbacks:</th>
                            <th>Operation:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedback as $index => $item)
                        <tr>
                            <td>
                                {{ $index }}
                            </td>
                            <td>
                                {{ $item['customer']->name }}
                            </td>
                            <td>
                                {{ $item['product']->product }}
                            </td>
                            <td>
                                {{ $item['product']->specification }}
                            </td>
                            <td>
                                {{ $item['supplier_feedback'] }}
                            </td>
                            <td>
                                operation
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection
