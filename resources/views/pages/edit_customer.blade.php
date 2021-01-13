
@extends('dashboard')

@section('edit_cstmr')







<h1 class="hedingPage">{{$data['name']}}'s Record</h1></td>


<form action="edit_customer" method="POST" class="mt-5">
<div class="row mt-2">
    {{-- Name Field --}}
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value={{$data['id']}}>

    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label for="name">Name:<span id="mustFill">*</span></label>
        <input type="text" value="{{$data['name']}}" name="name" class="form-control">
        @error('name')
            <div class="text-danger mt-3">{{ $errors->first('name')}}</div>
        @enderror
    </div>
    {{-- Email Field --}}
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label for="email">Email:<span id="mustFill">*</span></label>
        <input type="email" value="{{$data['email']}}" name="email" class="form-control">
        @error('email')
            <div class="text-danger mt-3">{{ $errors->first('email')}}</div>
        @enderror
    </div>
</div>
<div class="row mt-4">
    {{-- Address Field --}}
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <label for="address">Address:<span id="mustFill">*</span></label>
        <textarea name="address" rows="5" class="form-control" >{{$data['address']}}</textarea>
        @error('address')
            <div class="text-danger mt-3">{{ $errors->first('address')}}</div>
        @enderror
    </div>
    <div class="form-group col-sm-6 col-md-6 col-lg-6">
        <div class="row">
            {{-- City Field --}}
            {{-- <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="city">City:<span id="mustFill">*</span></label>
                <input type="city" value="{{$data['city']}}" name="city" class="form-control">
                @error('city')
                    <div class="text-danger mt-3">{{ $errors->first('city')}}</div>
                @enderror
            </div> --}}
            {{-- Country Field --}}
            {{-- <div class="form-group col-sm-6 col-md-6 col-lg-6">
                <label for="country">Country:<span id="mustFill">*</span></label>
                <input type="text" value="{{$data['country']}}" name="country" class="form-control">
                @error('country')
                    <div class="text-danger mt-3">{{ $errors->first('country')}}</div>
                @enderror
            </div> --}}
            {{-- Phone No. Field --}}
            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                <label for="number">Phone #:<span id="mustFill">*</span></label>
                <input type="number" value="{{$data['phone']}}" name="number" class="form-control">
                @error('number')
                    <div class="text-danger mt-3">{{ $errors->first('number')}}</div>
                @enderror
            </div>
            {{-- Submit Button --}}
            <div class="form-group col-sm-12 col-md-12 col-lg-12">
                <label for="submit">Update Now:</label>
                <button type="submit" name="submit" class="form-control btn btn-success"><i class="fas fa-save"></i> Update</button>
            </div>
        </div>
    </div>
</div>
</form>
</td>
</tr>
</table>



@endsection
