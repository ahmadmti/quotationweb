
@extends('dashboard')

@section('cstmr')



<h1 class="hedingPage">Customers</h1>


{{-- Messages --}}
<div class="mt-5">
    @if (session('success'))
        <span class="alert alert-success">{{ session('success') }}</span>
    @endif
    @if (session('delete_message'))
        <span class="alert alert-danger">{{ session('delete_message') }}</span>
    @endif
</div>



<div class="mt-5">
    <table class="table table-hover display mt-5" id="example" style="width:100%">
        <thead class="bg-dark text-white">
            <td>Name</td>
            <td>Email</td>
            <td>Phone #</td>
            <td>Address</td>
            <td>Operations</td>
        </thead>
        <tbody>
            @foreach ($customers as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['email'] }}</td>
                <td>{{ $item['phone'] }}</td>
                <td>{{ $item['address'] }}</td>
                <td>
                    <a href="{{url('customer_detail/'.$item['id'])}}"><i class="far fa-eye"></i></a>
                    &nbsp;
                    <a href="{{url('/add_supplier')}}"><i class="fas fa-plus-circle"></i></a>
                    &nbsp;
                    <a href="{{url('edit_customer/'.$item['id'])}}" ><i class="fas fa-edit"></i></a>
                    &nbsp;
                    <a onclick="return confirm('Are you sure you want to Delete?');" href="{{ url('customer-delete/'.$item['id'] )}}"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


{{-- Data Tabel Script --}}
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection
