@extends('dashboard')

@section('supplier')

<h1 class="hedingPage">Suppliers</h1>

<div class="mt-5 mb-5">
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

<table class="table table-hover display" id="example" style="width:100%">
    <thead class="bg-dark text-white">
        <td>#</td>
        <td>Name</td>
        <td>Email</td>
        <td>Mobile #</td>
        <td>Phone #</td>
        <td>Shop Address</td>
        <td>Actions</td>
    </thead>
    <tbody>
        @foreach ($supplier as $index => $item)
        <tr>
            <td>{{$index }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['email'] }}</td>
            <td>{{ !empty($item['mobile']) ? $item['mobile'] : '--' }}</td>
            <td>{{ !empty($item['phone']) ? $item['phone'] : '--' }}</td>
            <td>{{ !empty($item['shop_address']) ? $item['shop_address'] : '--' }}</td>
            <td>

                <a href="{{url('supplier_detail/'.$item['id'])}}" data-toggle="tooltip" title="View Supplier Detail"><i class="far fa-eye"></i></a>
                &nbsp;
                <a href="{{url('/add_supplier')}}" data-toggle="tooltip" title="Add Supplier"><i class="fas fa-plus-circle"></i></a>
                &nbsp;
                {{--  --}}
                <a href="{{url('edit_supplier/'.$item['id'])}}" data-toggle="tooltip" title="Edit Supplier"><i class="fas fa-edit"></i></a>
                &nbsp;
                <a onclick="return confirm('Are you sure you want to Delete?');" href="{{url('delete/'.$item['id'])}}"  data-toggle="tooltip" title="Delete Supplier"><i class="fas fa-trash-alt"></i></a>
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
