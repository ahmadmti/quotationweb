<!DOCTYPE html>
<html>
<head>
    {{-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> {{-- Stylesheet Link --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"> --}}
    {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3//dist/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"> --}}
    {{-- <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>


    <div class="container-fluid">
        <h1 class="text-center"><b>Quotation</b></h1>
        <div class="row">
            {{-- <div class="col-xs-4 col-sm-8 col-md-8 col-lg-8"></div> --}}
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-5">
                <div class="mb-1"><b>Date: </b>{{ date('m/d/Y') }}</div>
                <div class="mb-1"><b>Supplier:</b> {{ $supplier_data['name'] }}</div>
                <div class="mb-1"><b>Email:</b> {{ $supplier_data['email'] }}</div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Quotation ID:</th>
                            <th>Product Name:</th>
                            <th>Specifications:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quotations['products'] as $item)
                        <tr>
                            <td>
                                {{ $item->quotation_id }}
                            </td>
                            <td>
                                {{ $item->product }}
                            </td>
                            <td>
                                {{ $item->specification }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
