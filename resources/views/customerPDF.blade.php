<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>


    <div class="container-fluid">
        <h1 class="text-center"><b>Feedback About Product(s)</b></h1>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-5">
                <div class="mb-1"><b>Date: </b>{{ date('d/M/Y') }}</div>
                {{-- <div class="mb-1"><b>Customer:</b> {{$feedback['customer']->name}}</div> --}}
                {{-- <div class="mb-1"><b>Email:</b> {{ $feedback['customer']->email }}</div> --}}
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                {{-- {{$feedback['products']}} <br><br> --}}
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Quotation ID:</th>
                            <th>Product Name:</th>
                            <th>Specifications:</th>
                            <th>Feedbacks:</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($feedback as $feedback) --}}
                        <tr>
                            <td>
                                {{-- {{ $feedback['products']->id }} --}}
                            </td>
                            <td>
                                {{-- {{ $feedback['products']->product }} --}}
                            </td>
                            <td>
                                {{-- {{ $feedback['products']->specification }} --}}
                            </td>
                            <td>
                                {{-- {{ $feedback['supplier_feedback'] }} --}}
                            </td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
