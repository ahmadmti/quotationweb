<!DOCTYPE html>
<html>
<head>
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
