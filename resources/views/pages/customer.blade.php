
@extends('dashboard')

@section('cstmr')



<h1 class="hedingPage">Customers</h1>


{{-- Messages --}}
<div class="mt-5">
    @if (session('success'))
    <li>
        <span class=" text-success">{{ session('success') }}</span>
    </li>
    @endif
    @if (session('delete_message'))
    <li>
        <span class=" text-danger">{{ session('delete_message') }}</span>
    </li>
    @endif
</div>



<div class="mt-5">
    <table class="table table-hover display mt-5" id="example" style="width:100%">
        <thead class="bg-dark text-white">
            <td>#</td>
            <td>Name</td>
            <td>Email</td>
            <td>Phone #</td>
            <td>Address</td>
            <td>Operations</td>
        </thead>
        <tbody>
            @foreach ($customers as $index => $item)
            <tr>
                <td>{{ $index }}</td>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['email'] }}</td>
                <td>{{ !empty($item['phone']) ? $item['phone'] : '--' }}</td>
                <td>{{ !empty($item['address']) ? $item['address'] : '--' }}</td>
                <td>
                    <a href="{{url('customer_detail/'.$item['id'])}}" data-toggle="tooltip" title="View Customer Detail"><i class="far fa-eye"></i></a>
                    &nbsp;
                    <a href="{{url('/addCustomer')}}" data-toggle="tooltip" title="Add Customer"><i class="fas fa-plus-circle"></i></a>
                    &nbsp;
                    <a href="{{url('edit_customer/'.$item['id'])}}" data-toggle="tooltip" title="Edit Customer"><i class="fas fa-edit"></i></a>
                    &nbsp;
                    <a href="{{url('feedback/'.$item['id'])}}" data-toggle="tooltip" title="send feedback"><i class="far fa-paper-plane"></i></a>
                    &nbsp;


                    <a onclick="deleteQuotation('{{$item->id}}')" href="{{ url('customer-delete/'.$item['id'] )}}" data-toggle="tooltip" title="Delete Customer"><i class="fas fa-trash-alt"></i></a>


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



{{-- Data Tabel Script --}}
<script>
    function deleteQuotation(id){

    if(confirm('Are you sure? Your want to delete customer and also delete quotations against this customer.')){
        $.ajax({
            url:"{{url('delete_quotation')}}",
            type: "POST",
            data: {
                id: id,
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            success: function(result){
                // $('#row_parent_container_'+id).remove();
            }
        });
    }

}
</script>
@endsection
