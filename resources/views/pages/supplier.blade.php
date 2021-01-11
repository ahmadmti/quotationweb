@extends('dashboard')

@section('supplier')

<h1 class="hedingPage">Suppliers</h1>

<div class="mt-5 mb-5">
    @if (session('success'))
        <span class="alert alert-success">{{ session('success') }}</span>
    @endif
    @if (session('delete_message'))
        <span class="alert alert-danger">{{ session('delete_message') }}</span>
    @endif
</div>

<table class="table table-hover display" id="example" style="width:100%">
    <thead class="bg-dark text-white">
        <td>Name</td>
        <td>Email</td>
        <td>Mobile #</td>
        <td>Phone #</td>
        <td>Shop Address</td>
        <td>Actions</td>
    </thead>
    <tbody>
        @foreach ($supplier as $item)
        <tr>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['email'] }}</td>
            <td>{{ $item['mobile'] }}</td>
            <td>{{ $item['phone'] }}</td>
            <td>{{ $item['shop_address'] }}</td>
            <td>

                <a href="{{url('supplier_detail/'.$item['id'])}}"><i class="far fa-eye"></i></a>
                &nbsp;
                <a href="{{url('/add_supplier')}}"><i class="fas fa-plus-circle"></i></a>
                &nbsp;
                {{--  --}}
                <a href="{{url('edit_supplier/'.$item['id'])}}" ><i class="fas fa-edit"></i></a>
                &nbsp;
                <a onclick="return confirm('Are you sure you want to Delete?');" href="{{url('delete/'.$item['id'])}}"><i class="fas fa-trash-alt"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


{{-- Data Tabel Script --}}
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection
