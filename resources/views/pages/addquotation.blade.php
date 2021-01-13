
@extends('dashboard')

@section('add_quots')



<h1 class="hedingPage">Add Quotations</h1> <hr>
<div class="row mt-5">
    <div class="col-sm-8 col-md-8 col-lg-8">
        <p id="quots">Let RFQ Customer.</p>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <select name="name" id="name-dropdown-fetching-data" class="form-control">
            <option value=""> Select Customer</option>
            @foreach ($allData as $item)
                <option value="{{ $item->id }}">
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
        @error('name')
            <div class="text-danger mt-3">{{ $errors->first('name')}}</div>
        @enderror
    </div>
</div>

<form action="product" method="POST">
    @csrf
<div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8 mt-4">
        <p id="quots">RFQ Date:</p>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4 mt-4">
        <input type="date" name="date" id="date" class="form-control" placeholder="Enter Date Quotation Date">
    </div>
</div>
<div class="row mt-5">
    <div>
    </div>
    {{-- id field --}}
    <div class="form-group col-md-4" style="display: none">
        <span id="id">
        </span>
    </div>
    {{-- name field --}}
    <div class="form-group col-md-4">
        <span id="name">
        </span>
    </div>
    {{-- email field --}}
    <div class="form-group col-md-4">
        <span id="email">
        </span>
    </div>
    {{-- phone field --}}
    <div class="form-group col-md-4">
        <span id="phone">
        </span>
    </div>
    {{-- Address Field --}}
    <div class="form-group col-md-12">
        <span id="address">
        </span>
    </div>
</div>
<hr>
@if (session('success'))
    <span class="alert alert-success">{{ session('success') }}</span>
@endif

<div class="ease-top">
    <div class="quotsBox mt-3">
        <h2 class="mb-4"><label>Product Detail:</label></h2>
        {{-- codepen --}}
        <div id="table" class="table-editable">
            <i class="table-add addRow fas fa-plus"></i>
        <table class="table">
            <tr>
                <th>Product:</th>
                <th>Spesifications</th>
                <th data-attr-ignore>Remove</th>
            </tr>
            <tr class="hide">
                {{-- Product Name Field --}}
                <td><textarea name="product[]" id="product" cols="" rows="1" class="form-control" placeholder="Product Name"></textarea></td>
                @error('product[]')
                    <div class="text-danger mt-3">{{ $errors->first('product[]')}}</div>
                @enderror
                {{-- Product Spesifications Field --}}
                <td><textarea name="specification[]" id="specification" cols="" rows="1" class="form-control" placeholder="Product Spesifications"></textarea></td>
                @error('specification[]')
                    <div class="text-danger mt-3">{{ $errors->first('specification[]')}}</div>
                @enderror
                {{-- Operation --}}
                <td><i class="table-remove dellRow fas fa-times"></i></td>
            </tr>
        </table>
        </div>
        {{-- codepen --}}
    </div>
        <input style="float: right;" type="submit" name="submit" class="btn btn-primary mt-4" value="Add Quotation">
    </form>
</div>

@endsection



