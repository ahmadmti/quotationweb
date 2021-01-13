
@extends('dashboard')

@section('customer_detail')



<h1 class="hedingPage">Customer Detail</h1>



<div class="detail">
    <h3 class="headingPage_child"><i class="fas fa-user-alt"></i> {{ $customerDetial['name'] }}</h3>
<table class="table table-hover">
    <tr>
        <th style="width: 200px"><li>Email:</li></th>
        <td>{{ $customerDetial['email'] }}</td>
    </tr>
    <tr>
        <th><li>Phone #:</li></th>
        <td>{{ !empty($customerDetial['phone']) ? $customerDetial['phone'] : '--' }}</td>
    </tr>
    <tr>
        <th><li>Address:</li></th>
        <td>{{ !empty($customerDetial['address']) ? $customerDetial['address'] : '--' }}</td>
    </tr>
    <tr>
        <th><li>City:</li></th>
        <td>{{ !empty($customerDetial['cities']->city_name) ? $customerDetial['cities']->city_name : '--' }}</td>
    </tr>
    <tr>
        <th><li>State:</li></th>
        <td>{{ !empty($customerDetial['states']->states_name) ? $customerDetial['states']->states_name : '--' }}</td>
    </tr>
    <tr>
        <th><li>Country:</li></th>
        <td>{{ !empty($customerDetial['countries']->country_name) ? $customerDetial['countries']->country_name : '--' }}</td>
    </tr>
    <tr>
        <p class="mutedButtons">
            <a href="{{url('/addCustomer')}}" data-toggle="tooltip" title="Add Customer"><i class="fas fa-plus-circle"></i></a>
            &nbsp;
            <a href="{{url('edit_customer/'.$customerDetial['id'])}}" data-toggle="tooltip" title="Edit Customer"><i class="fas fa-edit"></i></a>
            &nbsp;
            <a onclick="return confirm('Are you sure you want to Delete?');" href="{{ url('customer-delete/'.$customerDetial['id'] )}}" data-toggle="tooltip" title="Delete Customer"><i class="fas fa-trash-alt"></i></a>
        </p>
    </tr>
</table>
</div>

@endsection
