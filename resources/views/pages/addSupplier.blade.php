@extends('dashboard')
@section('add_supplier')

<h1 class="hedingPage">Add new Supplier</h1>

<div class="mt-3 mb-3">
    @if (session('success'))
        <li>
            <span class="text-success">{{ session('success') }}</span>
        </li>
    @endif
</div>
<div class="mt-5">
    <span class="text-danger">Note: &nbsp;</span><i class="text-muted"><u>You can edit Name, Emai, Mobile No., Phone No. and Fax No. after submission.</u></i>
</div>
<table class="table table-borderless">
    <tr>
        <td>
            <form action="{{url('/postSupplierData')}}" method="POST">
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
                    {{-- Mobile No. Field --}}
                    <div class="form-group col-sm-4 col-md-4 col-lg-4">
                        <label for="number">Mobile #:</label>
                        <input type="number" value="{{old('mobile')}}" name="mobile" class="form-control" placeholder="Enter Mobile Number">
                    </div>
                </div>
                <div class="row mt-4">
                    {{-- Shop Address Field --}}
                    <div class="form-group col-sm-5 col-md-5 col-lg-5">
                        <label for="shop_address">Shop Address:</label>
                        <textarea value="" name="shop_address" rows="5" class="form-control" placeholder="Enter Shop Address.">{{old('shop_address')}}</textarea>
                    </div>
                    <div class="form-group col-sm-7 col-md-7 col-lg-7">
                        <div class="row">
                            {{-- Phone # Field --}}
                            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                <label for="phone">Phone #:</label>
                                <input type="number" value="{{old('phone')}}" name="phone" class="form-control" placeholder="Enter Your Phone Number">
                            </div>
                            {{-- fax Field --}}
                            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                <label for="fax">Fax #:<span id="mustFill"></span></label>
                                <input type="text" value="{{old('fax')}}" name="fax" class="form-control" placeholder="Enter Your Fax Number">
                            </div>
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
                            {{-- Submit Button --}}
                            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                                <label for="submit">Add Now:</label>
                                <button type="submit" name="submit" class="form-control btn btn-primary"><i class="fas fa-user-plus"></i> Add Supplier</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </td>
    </tr>
</table>


@endsection
