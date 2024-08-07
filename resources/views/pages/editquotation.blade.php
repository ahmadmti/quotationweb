
@extends('dashboard')

@section('edit_quots')



<h1 class="hedingPage">Edit Quotation</h1> <hr>
<div class="row mt-5">
    <div class="col-sm-8 col-md-8 col-lg-8">
        <p id="quots"></p>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <select disabled name="name" id="name-selected" class="form-control">
            <option value=""> Select Customer</option>
            @foreach ($customers as $key => $item)
                <option value="{{ $item['id'] }}"
                    @if ($item['id'] == $editQuots['customer']->id)
                        selected="selected"
                    @endif
                    >{{ $item['name'] }}</option>
            @endforeach
        </select>
    </div>
</div>

    <div class="row mt-5">
        <div>
        </div>
        {{-- id field --}}
        <div class="form-group col-md-4" style="display: none;">
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
<form action="" method="POST">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="{{$editQuots['id']}}">
<div class="ease-top">
    <div class="quotsBox mt-3">
        <h2 class="mb-4"><label>Product Detail:</label>
            <input style="float: right;" type="submit" name="submit" class="btn btn-primary" value="Update Quotation">
        </h2>
        {{-- codepen --}}
        <div id="table" class="table-editable">
            <i class="table-add addRow fas fa-plus" data-toggle="tooltip" title="Add Row"></i>
        <table class="table">
            <tr>
                <th>Product:</th>
                <th>Spesifications</th>
                <th data-attr-ignore>Remove</th>
            </tr>

            <tr class="hide">
                {{-- Product Name Field --}}

                    <td><textarea name="product[]" id="product" cols="" rows="3" class="form-control" placeholder="Product Name"></textarea></td>

                {{-- Product Spesifications Field --}}
                <td><textarea name="specification[]" id="specification" cols="" rows="3" class="form-control" placeholder="Product Spesifications"></textarea></td>
                {{-- Operation --}}
                <td><i class="table-remove dellRow fas fa-times"></i></td>
            </tr>


            @foreach ($editQuots['products'] as $item)
            <tr id="row_parent_container_{{$item->id}}">
                {{-- Product Name Field --}}

                    <td><textarea name="product[]" id="product" cols="" rows="3" class="form-control" placeholder="Product Name">{{ $item['product'] }}</textarea></td>
                <input type="hidden" name="product_id[]" value="{{$item->id}}">
                {{-- Product Spesifications Field --}}
                <td><textarea name="specification[]" id="specification" cols="" rows="3" class="form-control" placeholder="Product Spesifications">{{ $item['specification'] }}</textarea></td>
                {{-- Operation --}}
                <td><i style="cursor: pointer" onclick="deleteProduct('{{$item->id}}')" class="dellRow fas fa-times" data-toggle="tooltip" title="Delete Row"></i></td>
            </tr>
            @endforeach
        </table>
        </div>
        {{-- codepen --}}
    </div>
    </form>
</div>



{{-- CUSTOMER SCRIPT --}}
<script>
    function deleteProduct(id){

        if(confirm('Are You Sure? You want to delete, if you delete, you cannot recover!')){
            $.ajax({
                url:"{{url('delete_product')}}",
                type: "POST",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType : 'json',
                success: function(result){
                    $('#row_parent_container_'+id).remove();
                }
            });
        }

    }

    $(document).ready(function() {
        $('#name-selected').ready(function() {
            $("#id").html('');
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
                        $("#id").html(`<label for="id">ID:</label>
                                        <input type="hidden" value="`+result.customer.id+`" name="id" class="form-control" readonly>`);
                        $("#name").html(`<label for="name">Name:</label>
                                        <input disabled value="`+result.customer.name+`" name="name" class="form-control" readonly>`);
                        $("#email").html(`<label for="email">Email:</label>
                                        <input disabled value="`+result.customer.email+`" name="email" class="form-control" readonly>`);
                        $("#phone").html(`<label for="name">Phone:</label>
                                        <input disabled value="`+result.customer.phone+`" name="phone" class="form-control" readonly>`);
                        $("#address").html(`<label for="address">Address:</label>
                                        <input disabled value="`+result.customer.address+`" name="address" class="form-control" readonly>`);
                    }
                }
            });
        });
    });
    </script>
{{-- CUSTOMER SCRIPT END --}}
@endsection



