@extends('dashboard')

@section('edit_supplier')

<h1 class="hedingPage">{{$editData['name']}}'s Record</h1>


<div class="mt-5">
    <form action="" method="POST">
        <div class="row mt-2">
            {{-- Name Field --}}
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="{{$editData['id']}}">
            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                <label for="name">Name:<span id="mustFill">*</span></label>
                <input type="text" value="{{$editData['name']}}" name="name" class="form-control">
                @error('name')
                    <div class="text-danger mt-3">{{ $errors->first('name')}}</div>
                @enderror
            </div>
            {{-- Email Field --}}
            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                <label for="email">Email:<span id="mustFill">*</span></label>
                <input type="email" value="{{$editData['email']}}" name="email" class="form-control">
                @error('email')
                    <div class="text-danger mt-3">{{ $errors->first('email')}}</div>
                @enderror
            </div>
            {{-- Mobile No. Field --}}
            <div class="form-group col-sm-4 col-md-4 col-lg-4">
                <label for="number">Mobile #:<span id="mustFill">*</span></label>
                <input type="number" value="{{$editData['mobile']}}" name="mobile" class="form-control">
                @error('mobile')
                    <div class="text-danger mt-3">{{ $errors->first('mobile')}}</div>
                @enderror
            </div>
        </div>
        <div class="row mt-4">
            <div class="form-group col-sm-7 col-md-7 col-lg-7">
                <div class="row">
                    {{-- Phone # Field --}}
                    <div class="form-group col-sm-4 col-md-4 col-lg-4">
                        <label for="phone">Phone #:<span id="mustFill">*</span></label>
                        <input type="number" value="{{$editData['phone']}}" name="phone" class="form-control">
                        @error('phone')
                            <div class="text-danger mt-3">{{ $errors->first('phone')}}</div>
                        @enderror
                    </div>
                    {{-- fax Field --}}
                    <div class="form-group col-sm-4 col-md-4 col-lg-4">
                        <label for="fax">Fax #:<span id="mustFill"></span></label>
                        <input type="text" value="{{$editData['fax']}}" name="fax" class="form-control">
                        @error('fax')
                            <div class="text-danger mt-3">{{ $errors->first('fax')}}</div>
                        @enderror
                    </div>
                    {{-- Submit Button --}}
                    <div class="form-group col-sm-4 col-md-4 col-lg-4">
                        <label for="submit">Add Now:</label>
                        <button type="submit" name="submit" class="form-control btn btn-success"><i class="fas fa-save"></i> Update Record</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
