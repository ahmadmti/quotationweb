
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
            <td>{{ !empty($viewQuotDetail->customer->cities->city_name) ? $viewQuotDetail->customer->cities->city_name : '--' }}</td>
        </tr>
        <tr>
            <th><li>State:</li></th>
            <td>{{ !empty($viewQuotDetail->customer->states->states_name) ? $viewQuotDetail->customer->states->states_name : '--' }}</td>
        </tr>
        <tr>
            <th><li>Country:</li></th>
            <td>{{ !empty($viewQuotDetail->customer->countries->country_name) ? $viewQuotDetail->customer->countries->country_name : '--' }}</td>
        </tr>
        @if (!empty($viewQuotDetail['products']))
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
        @endif

    </table>
</div>
@endsection
