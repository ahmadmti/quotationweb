@extends('dashboard')

@section('edit_feedback')


        <h1 class="headingPage"><b>Feedbacks About Product(s)</b></h1>

        <div class="row mt-5">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <table class="table table-hover display" id="example" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Customer Name:</th>
                            <th>Product:</th>
                            <th>Specifications:</th>
                            <th>Feedbacks:</th>
                            <th>Operation:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($editFeedback as $item)

                        <tr>
                            <td>
                                {{ $item['customer']->name }}
                            </td>
                            <td>
                                {{ $item['product']->product }}
                            </td>
                            <td>
                                {{ $item['product']->specification }}
                            </td>
                            <td>
                                <form action="" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="id" value={{$item['id']}}>
                                </form>
                                {{ $item['supplier_feedback'] }}
                                {{ $item['id'] }}
                            </td>
                            <td>
                                <a href="{{ 'edit_feedback/'.$item['id'] }}"><i class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection
