
@extends('dashboard')

@section('customer_detail')



<h1 class="hedingPage">Customer Detail</h1>



<div class="detail">
    <h3 class="headingPage_child"><i class="fas fa-user-alt"></i> {{ $customerDetial['name'] }}</h3>
<table class="table table-hover">
    <tr>
        <th style="width: 200px">Email:</th>
        <td>{{ $customerDetial['email'] }}</td>
    </tr>
    <tr>
        <th>Phone #:</th>
        <td>{{ $customerDetial['phone'] }}</td>
    </tr>
    <tr>
        <th>Address:</th>
        <td>{{ $customerDetial['address'] }}</td>
    </tr>
    <tr>
        <th>City:</th>
        <td>{{ $customerDetial['cities']->city_name }}</td>
    </tr>
    <tr>
        <th>State:</th>
        <td>{{ $customerDetial['states']->states_name }}</td>
    </tr>
    <tr>
        <th>Country:</th>
        <td>{{ $customerDetial['countries']->country_name }}</td>
    </tr>
    <tr>
        <p class="mutedButtons">
            <a href="{{url('/add_supplier')}}"><i class="fas fa-plus-circle"></i></a>
            &nbsp;
            <a href="{{url('edit_customer/'.$customerDetial['id'])}}"><i class="fas fa-edit"></i></a>
            &nbsp;
            <a onclick="return confirm('Are you sure you want to Delete?');" href="{{ url('customer-delete/'.$customerDetial['id'] )}}"><i class="fas fa-trash-alt"></i></a>
        </p>
    </tr>
</table>
</div>

@endsection
