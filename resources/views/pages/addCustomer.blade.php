
@extends('dashboard')

@section('add_customer')





<table class="table table-borderless">
    <thead>
        <td><h1 class="hedingPage">Add new Customer</h1></td>
    </thead>
    <tr>
        <td>

            @if (session('success'))
                <span class="alert alert-success">{{ session('success') }}</span>
            @endif
            <a id="button" href="{{url('/customer')}}" class="btn btn-primary" style="float: right;">View Customer</a>
        </td>
    </tr>
    <tr>
        <td>
            <span class="text-danger">Note: &nbsp;</span><i class="text-muted"><u>You can edit Name, Emai, Phone No. and Address after submission.</u></i>
        </td>
    </tr>
    <tr>
        <td>

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
        <label for="number">Phone #:<span id="mustFill">*</span></label>
        <input type="number" value="{{old('number')}}" name="number" class="form-control" placeholder="Enter Phone Number">
        @error('number')
            <div class="text-danger mt-3">{{ $errors->first('number')}}</div>
        @enderror
    </div>
</div>
<div class="row mt-4">
    {{-- Address Field --}}
    <div class="form-group col-sm-5 col-md-5 col-lg-5">
        <label for="address">Address:<span id="mustFill">*</span></label>
        <textarea value="" name="address" rows="5" class="form-control" placeholder="Enter Address">{{old('address')}}</textarea>
        @error('address')
            <div class="text-danger mt-3">{{ $errors->first('address')}}</div>
        @enderror
    </div>
    <div class="form-group col-sm-7 col-md-7 col-lg-7">
        <div class="row">
            {{-- Country Field --}}
            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                <label for="country">Country:<span id="mustFill">*</span></label>
                <select name="country" class="form-control" id="country-dropdown-fetching-states">
                    <option value="">Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->country_id }}">
                            {{$country->country_name}}
                        </option>
                    @endforeach
                </select>
                @error('country')
                    <div class="text-danger mt-3">{{ $errors->first('country')}}</div>
                @enderror
            </div>
            {{-- State Field --}}
            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                <label for="state">State:<span id="mustFill">*</span></label>
                <select name="state" class="form-control" id="state-dropdown-fetching-city">
                    <option value="">Select Country first</option>
                </select>
                @error('state')
                    <div class="text-danger mt-3">{{ $errors->first('state')}}</div>
                @enderror
            </div>
            {{-- City Field --}}
            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                <label for="country">City:<span id="mustFill">*</span></label>
                <select name="city" class="form-control" id="city-dropdown">
                    <option value="">Select state first</option>
                </select>
                @error('city')
                    <div class="text-danger mt-3">{{ $errors->first('city')}}</div>
                @enderror
            </div>
            {{-- Submit Button --}}
            <div class="form-group col-sm-12 col-md-12 col-lg-12">
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
