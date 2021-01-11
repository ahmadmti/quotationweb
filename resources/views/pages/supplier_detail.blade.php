
@extends('dashboard')

@section('supplier_detail')

<h1 class="hedingPage">Supplier Detail</h1>

<div class="detail">
    <h3 class="headingPage_child"><i class="fas fa-user-alt"></i> {{ $supplierDetail['name'] }}</h3>
<table class="table table-hover">
    <tr>
        <th style="width: 200px">Email:</th>
        <td>{{ $supplierDetail['email'] }}</td>
    </tr>
    <tr>
        <th>Mobile #:</th>
        <td>{{ $supplierDetail['mobile'] }}</td>
    </tr>
    <tr>
        <th>Phone #:</th>
        <td>{{ $supplierDetail['phone'] }}</td>
    </tr>
    <tr>
        <th>Fax #:</th>
        <td>{{ !empty($supplierDetail['fax']) ? $supplierDetail['fax'] : '--' }}</td>
    </tr>
    <tr>
        <th>Address:</th>
        <td>{{ $supplierDetail['shop_address'] }}</td>
    </tr>
    <tr>
        <th>City:</th>
        <td>{{ !empty($supplierDetail['cities']) ? $supplierDetail['cities']->city_name : '-' }}</td>
    </tr>
    <tr>
        <th>State:</th>
        <td>{{ !empty($supplierDetail['states']) ? $supplierDetail['states']->states_name : '-' }}</td>
    </tr>
    <tr>
        <th>Country:</th>
        <td>{{ !empty($supplierDetail['countries']) ? $supplierDetail['countries']->country_name : '-' }}</td>
    </tr>
    <tr>
        <p class="mutedButtons">
            <a href="{{url('/add_supplier')}}"><i class="fas fa-plus-circle"></i></a>
            &nbsp;
            <a href="{{url('edit_supplier/'.$supplierDetail['id'])}}"><i class="fas fa-edit"></i></a>
            &nbsp;
            <a onclick="return confirm('Are you sure you want to Delete?');" href="{{ url('delete/'.$supplierDetail['id'] )}}"><i class="fas fa-trash-alt"></i></a>
        </p>
    </tr>
</table>
</div>

@endsection
