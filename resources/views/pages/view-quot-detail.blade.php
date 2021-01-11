
@extends('dashboard')

@section('view-quot-detail')

<h1 class="hedingPage">Quotation Detail</h1>

<div class="detail">
    <table class="table table-hover">
        <div class="headingPage_child">
            {{ $viewQuotDetail['customer']->name }}'s Detail
        </div>
        <tr>
            <th style="width: 200px"><li>Quotation ID:</li></th>
            <td>{{ $viewQuotDetail['id'] }}</td>
        </tr>
        <tr>
            <th><li>Customer Name:</li></th>
            <td>{{ $viewQuotDetail['customer']->name }}</td>
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
