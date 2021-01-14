<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<style>
@media print {
    #send-btn {
        /* color: red; */
        display: none;
    }
}
</style>

</head>
<body>


<div class="container-fluid">


    <h1 class="headingPage text-center">Feedback about Quotation(s)</h1>
    <br>

    <p class="mb-1">
        <b>Name: </b> {{ $pdf_data['name'] }}
    </p>
    <p class="mb-1">
        <b>Email: </b> {{ $pdf_data['email'] }}
    </p>
    <p class="mb-1">
        <b>Date: </b> {{ date('d/M/Y') }}
    </p>


    @if(!empty($pdf_data['quotation']->products))
    <table class="table table-borderd mt-5">
        <tr class="bg-dark text-white">
            <th>Product:</th>
            <th>Specifications:</th>
            <th>Feedback:</th>
            <th style="width: 100px">X</th>
        </tr>
        {{$pdf_data['quotation']->feedback }}
            @foreach ($pdf_data['quotation']->products as $item)
                <tr id="row_parent_feedback_{{$item->id}}">
                    <td>
                        {{ $item->product }}
                        <br>
                        {{ $item->id }}
                    </td>
                    <td>
                        {{ $item->specification }}
                    </td>
                    <td>
                        {{ $item->feedback->supplier_feedback }}
                    </td>
                    <td>
                        <i onclick="deleteFeedback('{{$item->id}}')">x</i>
                    </td>
                </tr>
            @endforeach
    </table>
    <a id="send-btn" style="float: right" onclick="sendEmail('{{url('send-feedback-pdf/'.$pdf_data['id'])}}')" href="#" class="btn btn-link">Send</a>
    @else
        <b><h1 class="text-center text-danger">No Products Yet Selected..</h1></b>
            <br>
        <b><h5 class="text-center text-danger"><a href="{{url('/add_quots')}}">Click to add Products</a></h5></b>
    @endif

    <script>
        function deleteFeedback(id){

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

        function sendEmail(url){
            $('#send-btn').hide();
            window.location.href = url;
        }
    </script>

</body>
</html>


