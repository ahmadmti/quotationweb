<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, tr, td{
            border: 1px solid black;
            height: 40px;
        }
        td{
            padding-left: 5px;
            padding-right: 5px;
        }
    </style>
</head>
<body>

        <h1><b><center>Product Quotation</center></b></h1>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-5">
                <div><b>Date: </b>{{ date('m/d/Y') }}</div>
                <div><b>Supplier:</b> {{ $supplier_data['name'] }}</div>
                <div><b>Email:</b> {{ $supplier_data['email'] }}</div>
            </div>
        </div>
        <br><br>
        <table style="width: 100%;">
            <thead class="table-dark">
                <tr>
                    <th>Sr. #</th>
                    <th>Quotation ID</th>
                    <th>Product Name</th>
                    <th>Specifications</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quotations['products'] as $index => $item)
                <tr>
                    <td>
                        {{ $index }}
                    </td>
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
</body>
</html>
