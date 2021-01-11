@extends('dashboard')
@section('home')


<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3 dashboard_border">
        <h5>Customers</h5>
        <a href="{{url('/customer')}}">
            <i class="fas fa-user-friends"></i>
        </a>
        <div class="count_data">{{$count_customers}}</div>
        <a href="{{url('/customer')}}">See all</a>
    </div>

    <div class="col-sm-3 col-md-3 col-lg-3 dashboard_border">
        <h5>Suppliers</h5>
        <a href="{{url('/supplier')}}">
            <i class="fas fa-user-friends"></i>
        </a>
            <div class="count_data">{{$count_suppliers}}</div>
        <a href="{{url('/supplier')}}">See all</a>
    </div>

    <div class="col-sm-3 col-md-3 col-lg-3 dashboard_border">
        <h5>Quotations</h5>
        <a href="{{url('/quotation')}}">
            <i class="fas fa-comment-dots"></i>
        </a>
        <div class="count_data">{{$count_quotation}}</div>
        <a href="{{url('/quotation')}}">See all</a>
    </div>
</div>


@endsection
