
@extends('dashboard')

@section('supplier_detail')

<h1 class="hedingPage">Supplier Detail</h1>

<div class="detail">
    <h3 class="headingPage_child"><i class="fas fa-user-alt"></i> {{ $supplierDetail['name'] }}</h3>
    <table class="table table-hover">
        <tr>
            <th style="width: 200px"><li>Email:</li></th>
            <td>{{ $supplierDetail['email'] }}</td>
        </tr>
        <tr>
            <th><li>Mobile #:</li></th>
            <td>{{ !empty($supplierDetail['mobile']) ? $supplierDetail['mobile'] : '--' }}</td>
        </tr>
        <tr>
            <th><li>Phone #:</li></th>
            <td>{{ !empty($supplierDetail['phone']) ? $supplierDetail['phone'] : '--' }}</td>
        </tr>
        <tr>
            <th><li>Fax #:</li></th>
            <td>{{ !empty($supplierDetail['fax']) ? $supplierDetail['fax'] : '--' }}</td>
        </tr>
        <tr>
            <th><li>Address:</li></th>
            <td>{{ !empty($supplierDetail['shop_address']) ? $supplierDetail['shop_address'] : '--' }}</td>
        </tr>
        <tr>
            <th><li>City:</li></th>
            <td>{{ !empty($supplierDetail['cities']) ? $supplierDetail['cities']->city_name : '--' }}</td>
        </tr>
        <tr>
            <th><li>State:</li></th>
            <td>{{ !empty($supplierDetail['states']) ? $supplierDetail['states']->states_name : '--' }}</td>
        </tr>
        <tr>
            <th><li>Country:</li></th>
            <td>{{ !empty($supplierDetail['countries']) ? $supplierDetail['countries']->country_name : '--' }}</td>
        </tr>
        <tr>
            <p class="mutedButtons">
                <a href="{{url('/add_supplier')}}" data-toggle="tool-tip" title="Add Supplier"><i class="fas fa-plus-circle"></i></a>
                &nbsp;
                <a href="{{url('edit_supplier/'.$supplierDetail['id'])}}" data-toggle="tool-tip" title="Edit Supplier"><i class="fas fa-edit"></i></a>
                &nbsp;
                <a onclick="return confirm('Are you sure you want to Delete?');" href="{{ url('delete/'.$supplierDetail['id'] )}}" data-toggle="tool-tip" title="Delete Supplier"><i class="fas fa-trash-alt"></i></a>
            </p>
        </tr>
    </table>
</div>

@endsection
