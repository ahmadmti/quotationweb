@extends('dashboard')

@section('supplier_feedback')


<h1 class="hedingPage">Add Supplier Feedback</h1> <hr>
<div class="row mt-5">
    <div class="col-sm-8 col-md-8 col-lg-8">
        <p id="quots"></p>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <select disabled name="name" id="name-selected" class="form-control">
            <option value=""> Select Customer</option>
            @foreach ($customers_data as $key => $item)
                <option value="{{ $item['id'] }}"
                    @if ($item['id'] == $view_quot_for_feedback['customer']->id)
                        selected="selected"
                    @endif
                    >{{ $item['name'] }}</option>
            @endforeach
        </select>
    </div>
</div>
<form action="" method="POST">
    @csrf
    <div class="row mt-5">

        {{-- id field --}}
        {{-- <div class="form-group col-md-4"> --}}
            <span id="c_id">
            </span>
        {{-- </div> --}}
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
<div class="ease-top">
    <div class="quotsBox mt-3">
        <h2 class="mb-4"><label>Product Detail:</label>
        </h2>
        {{-- codepen --}}
        <div id="table" class="table-editable">
        <table class="table">
            <tr>
                <th>Product:</th>
                <th>Spesifications</th>
                <th>Feedback</th>
            </tr>


            @foreach ($view_quot_for_feedback['products'] as $item)

                {{-- Product Name Field --}}
                <input type="hidden" name="quot_id" placeholder="test" value="{{ $item['quotation_id'] }}">

                <td>
                    <textarea disabled name="product[]" id="product" cols="" rows="1" class="form-control" placeholder="Product Name">{{ $item['product'] }}</textarea>
                </td>
                <input type="hidden" name="product_id[]" value="{{$item->id}}">

                {{-- Product Spesifications Field --}}
                <td>
                    <textarea disabled name="specification[]" id="specification" cols="" rows="1" class="form-control" placeholder="Product Spesifications">{{ $item['specification'] }}</textarea>
                </td>
                <td>
                    <textarea name="feedback[]" id="feedback" cols="" rows="1" class="form-control" placeholder="Supplier Feedback"></textarea>
                </td>
            </tr>
            @endforeach
        </table>
        </div>
        <input style="float: right;" type="submit" name="submit"  class="btn btn-primary mt-4" value="Send PDF">
        {{-- codepen --}}
    </div>
    </form>
</div>



{{-- CUSTOMER SCRIPT --}}
<script>
    $(document).ready(function() {
        $('#name-selected').ready(function() {
            $("#c_id").html('');
            $("#name").html('');
            $("#email").html('');
            $("#phone").html('');
            $("#address").html('');
            $.ajax({
                url:"{{url('get-customer-name')}}",
                type: "POST",
                data: {
                    id: $('#name-selected').val(),
                    _token: '{{csrf_token()}}'
                },
                dataType : 'json',
                success: function(result){
                    if(result.customer !== null && typeof result.customer !== 'undefined'){
                        $("#c_id").html(`
                                        <input type="hidden" value="`+result.customer.id+`" name="c_id" class="form-control">`);
                        $("#name").html(`<label for="name">Name:</label>
                                        <input disabled value="`+result.customer.name+`" name="name" class="form-control">`);
                        $("#email").html(`<label for="email">Email:</label>
                                        <input disabled value="`+result.customer.email+`" name="email" class="form-control">`);
                        $("#phone").html(`<label for="name">Phone:</label>
                                        <input disabled value="`+result.customer.phone+`" name="phone" class="form-control">`);
                        $("#address").html(`<label for="address">Address:</label>
                                        <input disabled value="`+result.customer.address+`" name="address" class="form-control">`);
                    }
                }
            });
        });
    });
    </script>
{{-- CUSTOMER SCRIPT END --}}

@endsection
