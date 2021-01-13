@extends('dashboard')
@section('add_customer')

<table class="table table-borderless">

<h1 class="hedingPage">Add new Customer</h1></td>

<div class="mt-5 mb-5">
    <span class="text-danger">Note: &nbsp;</span><i class="text-muted"><u>You can edit Name, Emai, Phone No. and Address after submission.</u></i>
</div>

<form action="{{url('/postCustomerData')}}" method="POST">
<div class="row mt-2">
    {{-- Name Field --}}
    @csrf
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
        <label for="name">Name:<span id="mustFill">*</span></label>
        <input type="text" value="{{old('name')}}" name="name" class="form-control" placeholder="Enter Name">
        @error('name')
            <div class="text-danger mt-3">{{ $errors->first('name')}}</div>
        @enderror
    </div>
    {{-- Email Field --}}
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
        <label for="email">Email:<span id="mustFill">*</span></label>
        <input type="email" value="{{old('email')}}" name="email" class="form-control" placeholder="Enter Email">
        @error('email')
            <div class="text-danger mt-3">{{ $errors->first('email')}}</div>
        @enderror
    </div>
    {{-- Phone No. Field --}}
    <div class="form-group col-sm-4 col-md-4 col-lg-4">
        <label for="number">Phone #:</label>
        <input type="number" value="{{old('number')}}" name="number" class="form-control" placeholder="Enter Phone Number">
    </div>
</div>
<div class="row mt-4">
    {{-- Address Field --}}
    <div class="form-group col-sm-5 col-md-5 col-lg-5">
        <label for="address">Address:</label>
        <textarea value="" name="address" rows="5" class="form-control" placeholder="Enter Address">{{old('address')}}</textarea>
    </div>
    <div class="form-group col-sm-7 col-md-7 col-lg-7">
        <div class="row">
            {{-- Country Field --}}
            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                <label for="country">Country:</label>
                <select name="country" class="form-control" id="country-dropdown-fetching-states">
                    <option value="">Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->country_id }}">
                            {{$country->country_name}}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- State Field --}}
            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                <label for="state">State:</label>
                <select name="state" class="form-control" id="state-dropdown-fetching-city">
                    <option value="">Select Country first</option>
                </select>
            </div>
            {{-- City Field --}}
            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                <label for="country">City:</label>
                <select name="city" class="form-control" id="city-dropdown">
                    <option value="">Select state first</option>
                </select>
            </div>
            {{-- Success Message --}}
            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                <br>
                @if (session('success'))
                <li>
                    <span class="text-success"><b>{{ session('success') }}</b></span>
                </li>
                @endif
            </div>
            {{-- Submit Button --}}
            <div class="form-group col-sm-8 col-md-8 col-lg-8">
                <label for="submit">Add Now:</label>
                <button type="submit" name="submit" class="form-control btn btn-primary"><i class="fas fa-user-plus"></i> Add Customer</button>
            </div>
        </div>
    </div>
</div>
</form>
</td>
</tr>
</table>




@endsection
