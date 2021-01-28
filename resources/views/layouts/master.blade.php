{{-- Dashboard Start --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RFQ</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> {{-- Stylesheet Link --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
</head>

<style>
        .loaderbody {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background: #262626;
            display:flex;
            justify-content: center;
            align-items: center;
            z-index: 9999 !important;
        }

    .loader {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 150px;
        height: 150px;
        background: transparent;
        border: 3px solid #3c3c3c;
        border-radius: 50%;
        text-align: center;
        line-height: 150px;
        font-family: sans-serif;
        font-size: 20px;
        color: #fff000;
        letter-spacing: 4px;
        text-shadow: 0 0 10px #fff000;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        z-index: 1000 !important;
    }
    .loader::before {
        content: '';
        position: absolute;
        top: -0px;
        left: -0px;
        width: 100%;
        height: 100%;
        border: 3px solid transparent;
        border-top: 3px solid #fff000;
        border-right: 3px solid #fff000;
        border-radius: 50%;
        animation: animateCircle 2s linear infinite;
    }
    .loader span {
        display: block;
        position: absolute;
        top: calc(50% - 2px);
        left: 50%;
        width: 50%;
        height: 4px;
        background:transparent;
        transform-origin: left;
        animation: animate 2s linear infinite;
    }
    .loader span::before {
        content: '';
        position: absolute;
        top: -6px;
        right: -8px;
        border-radius: 50%;
        width: 16px;
        height: 16px;
        background: #fff000;
        box-shadow: 0 0 10px #fff000;
    }
    @keyframes animateCircle {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
    @keyframes animate {
        0% {
            transform: rotate(45deg);
        }
        100% {
            transform: rotate(405deg);
        }
    }
</style>


<body class="body">


        <div class="loaderbody">
            <div class="loader">
                RFQ
            <span></span>
            </div>
        </div>


    @yield('dashboard')




<script>
    $(window).on("load",function(){
        $(".loaderbody").fadeOut();
        $(".body").fadeIn();
    });
</script>
</body>
</html>

