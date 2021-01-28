@extends('dashboard')
@section('quotation')

<h1 class="hedingPage">Quotations</h1>

    @if (session('email-sent'))
        <li><span class="text-success">{{ session('email-sent') }}</span></li>
    @endif
    @if (session('pdf-generated-for-customer'))
        <li><span class="text-success">{{ session('pdf-generated-for-customer') }}</span></li>
    @endif
    @if (session('message'))
        <span class="text-danger">{{ session('message') }}</span>
    @endif


<div class="mt-5">
    <table class="table table-hover display" id="example" style="width:100%">
        <thead class="bg-dark text-white">
            <td>Sr. #</td>
            <td>RFQ ID</td>
            <td>Customer Name</td>
            <td>RFQ Date</td>
            <td>Action</td>
        </thead>
        <tbody>
            @foreach ($quotID as $index => $item)
            <tr>
                <td>{{ $index }}</td>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['customer']->name }}</td>
                <td>{{ date('d-M-Y', strtotime($item['quotation_date'])) }}</td>

                <td>
                    {{-- View Quotation Detail --}}
                    <a href="{{url('view-quot-detail/'.$item['id'])}}" data-toggle="tooltip" title="View Quotation"><i class="far fa-eye"></i></a>
                    &nbsp;&nbsp;

                    {{-- Send Quotation to Supplier --}}
                    <i style="cursor: pointer" class="far fa-paper-plane modalBox" id="{{ !empty($item['customer']->name) ? $item['id'] : url('delete_page') }}"  data-toggle="tooltip" title="Send Quotation to Supplier"></i>
                    &nbsp;&nbsp;

                    {{-- Add New Quotation --}}
                    <a href="add_quots" data-toggle="tooltip" data-placement="top" title="Add Quotation"><i class="fas fa-plus-circle"></i></a>
                    &nbsp;&nbsp;

                    {{-- test --}}
                    {{-- {{ !empty($item['customer']->name) ? '' : 'hahh' }} --}}
                    {{-- test edn --}}
                    {{-- Edit Quotation --}}
                    <a href="{{ url('editquotation/'.$item['id']) }}" data-toggle="tooltip" data-placement="top" title="Edit Quotation"><i class="far fa-edit"></i></a>
                    &nbsp;&nbsp;

                    {{-- Delete Quotation --}}
                    <a onclick="return confirm('Are you sure you want to Delete?');" href="{{url('quotoation-delete/'.$item['id'])}}" data-toggle="tooltip" data-placement="top" title="Delete Quotation"><i class="fas fa-trash-alt"></i></a>
                    &nbsp;&nbsp;

                    {{-- Send Supplier Feedback to customer --}}
                    <a href="{{url('supplier_feedback/'.$item['id'])}}" data-toggle="tooltip" data-placement="top" title="Add Supplier Feedbacks.."><i class="fas fa-comment-dots"></i></a>

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
                    <input type="hidden" id="qout_val" name='quot_id'>
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
