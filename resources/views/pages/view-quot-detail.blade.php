
@extends('dashboard')

@section('view-quot-detail')

<h1 class="hedingPage">Quotation Detail</h1>

<div class="detail">
    <table class="table table-hover">
        <div class="headingPage_child">
            {{ !empty($viewQuotDetail['customer']->name) ? $viewQuotDetail['customer']->name : "Customer Deleted.." }}
        </div>
        <tr>
            <th style="width: 200px"><li>Quotation ID:</li></th>
            <td>{{ $viewQuotDetail['id'] }}</td>
        </tr>
        <tr>
            <th><li>Customer Name:</li></th>
            <td>{{ !empty($viewQuotDetail['customer']->name) ? $viewQuotDetail['customer']->name : 'Customer Deleted..' }}</td>
        </tr>
        <tr>
            <th><li>Customer Email:</li></th>
            <td>{{ !empty($viewQuotDetail['customer']->email) ? $viewQuotDetail['customer']->email : '--' }}</td>
        </tr>
        <tr>
            <th><li>Phone #:</li></th>
            <td>{{ !empty($viewQuotDetail['customer']->phone) ? $viewQuotDetail['customer']->phone : '--' }}</td>
        </tr>
        <tr>
            <th><li>Address:</li></th>
            <td>{{ !empty($viewQuotDetail['customer']->address) ? $viewQuotDetail['customer']->address : '--' }}</td>
        </tr>
        <tr>
            <th><li>City:</li></th>
            <td>{{ !empty($viewQuotDetail['customer']->city) ? $viewQuotDetail['customer']->city : '--' }}</td>
        </tr>
        <tr>
            <th><li>State:</li></th>
            <td>{{ !empty($viewQuotDetail['customer']->state) ? $viewQuotDetail['customer']->state : '--' }}</td>
        </tr>
        <tr>
            <th><li>Country:</li></th>
            <td>{{ !empty($viewQuotDetail['customer']->country) ? $viewQuotDetail['customer']->country : '--' }}</td>
        </tr>
        <tr>
            <td class="text-primary">-- -- -- -- -- -- --</td>
            <td class="text-primary">-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --</td>
        </tr>
        <tr>
            <th><li>Product(s) Name <i class="fas fa-angle-down"></i></li></th>
            <th><li>Specification(s) <i class="fas fa-angle-down"></i></li></th>
        </tr>
        @foreach ($viewQuotDetail['products'] as $item)
            <tr>
                <td><b><li>{{ $item->product }}:</li></b></td>
                <td>{{ $item->specification }}</td>
            </tr>
        @endforeach
        <tr>
            <p class="mutedButtons">
                <a href="{{url('editquotation/'.$viewQuotDetail['id'])}}" data-toggle="tooltip" data-placement="top" title="Edit Quotation"><i class="far fa-edit"></i></i></a>
                &nbsp;&nbsp;

                <a onclick="return confirm('Are you sure you want to Delete?');" href="{{url('quotoation-delete/'.$item['id'])}}" data-toggle="tooltip" data-placement="top" title="Delete Quotation"><i class="fas fa-trash-alt"></i></a>
            </p>
        </tr>
    </table>
</div>
@endsection
