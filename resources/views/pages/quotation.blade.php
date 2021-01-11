@extends('dashboard')
@section('quotation')

<h1 class="hedingPage">Quotations</h1>

    @if (session('email-sent'))
        <span class="text-success">{{ session('email-sent') }}</span>
    @endif

<div class="mt-5">
    <table class="table table-hover display" id="example" style="width:100%">
        <thead class="bg-dark text-white">
            <td>Quotation ID</td>
            <td>Customer Name</td>
            <td>Action</td>
        </thead>
        <tbody>
            @foreach ($quotID as $item)
            <tr>
                <td>
                    {{ $item['id'] }}
                </td>
                <td>
                    {{ $item['customer']->name }}
                </td>
                <td>
                    <a href="{{url('view-quot-detail/'.$item['id'])}}" data-toggle="tooltip" data-placement="top" title="View Quotation"><i class="far fa-eye"></i></a>
                    &nbsp;&nbsp;

                    <i style="cursor: pointer" class="fas fa-plus-circle modalBox" id="{{ $item['id'] }}"  ></i>
                    &nbsp;&nbsp;

                    <a href="{{url('editquotation/'.$item['id'])}}" data-toggle="tooltip" data-placement="top" title="Edit Quotation"><i class="far fa-edit"></i></i></a>
                    &nbsp;&nbsp;

                    <a onclick="return confirm('Are you sure you want to Delete?');" href="{{url('quotoation-delete/'.$item['id'])}}" data-toggle="tooltip" data-placement="top" title="Delete Quotation"><i class="fas fa-trash-alt"></i></a>
                    &nbsp;&nbsp;

                    @if (session('message'))
                    <span class="text-danger">{{ session('message') }}</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection




{{-- Get Suppliers Name from Model --}}
<div class="modal" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Choose Supplier</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="send-email-pdf" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" id="qout_val" name='quot_id' >
                    <select class="select2" name="ids[]" multiple="multiple">
                        @foreach ($supplier_name as $item)
                            <option value="{{ $item['id'] }}">
                                {{ $item['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <input style="float: right" type="submit"  value="SEND" class="btn btn-primary mt-2">
            </form>
        </div>
        </div>
    </div>
</div>