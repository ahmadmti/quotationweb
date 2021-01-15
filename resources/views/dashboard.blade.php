
@extends('layouts.master')

@section('dashboard')

<x-app-layout>
    <x-slot name="header">
    </x-slot>
</x-app-layout>


{{-- Navbar Start --}}
<nav class="navbar navbar-expand-lg navbar-light topBar" id="bgColor">
    <button class="openbtn" onclick="openNav()">☰ </button>
    <a class="navbar-brand" style="margin-bottom: -13px;" href="/dashboard" id="Tcolor">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span  id="Tcolor" class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
    {{-- name --}}
    <nav x-data="{ open: false }" style="float: right">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl">
            <div class="flex justify-between">
                <!-- Settings Dropdown -->
                <div class="sm:flex sm:items-center sm:ml-6">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <button class="flex items-center text-md font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div id="Tcolor">{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg id="Tcolor" class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Change Password') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif
                            <div class="border-t border-gray-100"></div>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
                <!-- Hamburger -->
                {{-- <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div> --}}
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-jet-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div>
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>

                    <div class="ml-3">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-jet-responsive-nav-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-jet-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-responsive-nav-link>
                    </form>

                    <!-- Team Management -->

                </div>
            </div>
        </div>
    </nav>
    {{-- name --}}
    </div>
</nav>
{{-- Navbar End --}}


{{-- Sidebar Start --}}
<div id="mySidepanel" class="sidepanel">
    {{-- Close Button --}}
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

    {{-- Customer collapsed data --}}
    <a href="" data-toggle="collapse" data-target="#customer">Customers <i class="fas fa-caret-down"></i></a>
    <div id="customer" class="collapse collapse-links">
        <a href={{url('/customer')}}>All Customers</a>
        <a href={{url('/addCustomer')}}>Add Customers</a>
    </div>

    {{-- Supplier Collapsed Data --}}
    <a href="" data-toggle="collapse" data-target="#supplier">Suppliers <i class="fas fa-caret-down"></i></a>
    <div id="supplier" class="collapse collapse-links">
        <a href="{{url('/supplier')}}">All Suppliers</a>
        <a href="{{url('/add_supplier')}}">Add Suppliers</a>
    </div>

    {{-- Cottation Collapsed Data --}}
    <a href="" data-toggle="collapse" data-target="#quotationsksCollapse">Quotations <i class="fas fa-caret-down"></i></a>
    <div id="quotationsksCollapse" class="collapse collapse-links">
        <a href="{{url('/quotation')}}">All Quotations</a>
        <a href="{{url('/add_quots')}}">Add Quotations</a>
    </div>

    {{-- pdf listing --}}
    {{-- <a href="" data-toggle="collapse" data-target="#quotationsksCollapse">Quotations <i class="fas fa-caret-down"></i></a> --}}
    {{-- <div id="quotationsksCollapse" class="collapse collapse-links"> --}}
        <a href="{{url('/pdf')}}">All Feedbacks</a>
        {{-- <a href="{{url('/add_quots')}}">Add Quotations</a> --}}
    {{-- </div> --}}
</div>
{{-- Sidebar End --}}






{{-- Main Body --}}
<div class="container mainArea">
    {{-- {{ $abc }} --}}
    {{-- Customer Start --}}
    @yield('home')
    @yield('cstmr')
    @yield('add_customer')
    @yield('customer_detail')
    @yield('edit_cstmr')
    @yield('customerPDF')
    @yield('pdfPreview')
    @yield('edit_feedback')

    {{-- Supplier start --}}
    @yield('supplier')
    @yield('edit_supplier')
    @yield('add_supplier')
    @yield('supplier_detail')
    @yield('supplier_feedback')

    {{-- Quots --}}
    @yield('add_quots')
    @yield('quotation')
    @yield('view-quot-detail')
    @yield('edit_quots')
</div>
{{-- Main body End --}}

{{-- Datatable --}}
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
{{-- Datatable end --}}

{{-- Model Box Script --}}
<script>
    $(document).ready(function() {
        $('.modalBox').click(function(){
            $('#staticBackdrop').modal('show');
                let id= $(this).attr('id');
                $('#qout_val').val(id);
        });
    });
</script>
{{-- Model Box Script --}}

{{-- Select Supplier Dialog --}}
<script>
    $(document).ready(function() {
        $('select.select2').select2({
            width: '100%',
            placeholder: 'Choose Option'
        });
    });
</script>
{{-- Select Supplier Dialog End --}}


{{-- CSC_SCRIPT --}}
<script>
    $(document).ready(function() {
        $('#country-dropdown-fetching-states').on('change', function() {
            var country_id = this.value;
            $("#state-dropdown-fetching-city").html('');
            $.ajax({
            url:"{{url('get-states-by-country')}}",
            type: "POST",
            data: {
                country_id: country_id,
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            success: function(result){
                let html = '<option value="">Select State</option>';
                $.each(result.states,function(key,value){
                    html += '<option value="'+value.states_id+'">'+value.states_name+'</option>';
                });
                $("#state-dropdown-fetching-city").html(html);
            }
            });
        });
        $('#state-dropdown-fetching-city').on('change', function() {
            var states_id = this.value;
            $("#city-dropdown").html('');
            $.ajax({
                url:"{{url('get-cities-by-state')}}",
                type: "POST",
                data: {
                    states_id: states_id,
                    _token: '{{csrf_token()}}'
                },
                dataType : 'json',
                success: function(result){
                    let html = '<option value="">Select City</option>';
                    $.each(result.cities,function(key,value){
                        html += '<option value="'+value.city_id+'">'+value.city_name+'</option>';
                    });
                    $("#city-dropdown").html(html);
                }
            });
        });
    });
    </script>
{{-- CSC_SCRIPT END --}}


{{-- CUSTOMER SCRIPT --}}
<script>
    $(document).ready(function() {
        $('#name-dropdown-fetching-data').on('change', function() {

            // Get Id
            var id = this.value;
            $("#id").html('');
            $.ajax({
            url:"{{url('get-customer-data')}}",
            type: "POST",
            data: {
                id: id,
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            success: function(result){
                let html = '<label for="name">Name:</label>';
                $.each(result.customers,function(key,value){
                    html += '<input type="text" value="'+value.id+'" id="quotsBgStyle" name="id" class="form-control" readonly>';
                });
                $("#id").html(html);
            }
            });

            // Get Name
            var id = this.value;
            $("#name").html('');
            $.ajax({
            url:"{{url('get-customer-data')}}",
            type: "POST",
            data: {
                id: id,
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            success: function(result){
                let html = '<label for="name">Name:</label>';
                $.each(result.customers,function(key,value){
                    html += '<input disabled value="'+value.name+'" id="quotsBgStyle" name="name" class="form-control" readonly>';
                });
                $("#name").html(html);
            }
            });

            // Get Email
            var id = this.value;
            $("#email").html('');
            $.ajax({
            url:"{{url('get-customer-data')}}",
            type: "POST",
            data: {
                id: id,
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            success: function(result){
                let html = '<label for="email">Email:</label>';
                $.each(result.customers,function(key,value){
                    html += '<input disabled type="text" value="'+value.email+'" id="quotsBgStyle" name="email" class="form-control" readonly>';
                });
                $("#email").html(html);
            }
            });

            // Get Phone
            var id = this.value;
            $("#phone").html('');
            $.ajax({
            url:"{{url('get-customer-data')}}",
            type: "POST",
            data: {
                id: id,
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            success: function(result){
                let html = '<label for="phone">Phone:</label>';
                $.each(result.customers,function(key,value){
                    html += '<input disabled type="text" value="'+value.phone+'" id="quotsBgStyle" name="phone" class="form-control" readonly>';
                });
                $("#phone").html(html);
            }
            });

            // Get Address
            var id = this.value;
            $("#address").html('');
            $.ajax({
            url:"{{url('get-customer-data')}}",
            type: "POST",
            data: {
                id: id,
                _token: '{{csrf_token()}}'
            },
            dataType : 'json',
            success: function(result){
                let html = '<label for="address">Address:</label>';
                $.each(result.customers,function(key,value){
                    html += '<textarea disabled name="address" id="address" class="form-control" rows="2" readonly>'+value.address+'</textarea>';
                });
                $("#address").html(html);
            }
            });
        });
    });
    </script>
{{-- CUSTOMER SCRIPT END --}}

{{-- Table Add row --}}
<script>
    var $TABLE = $('#table');
    var $BTN = $('#export-btn');
    var $EXPORT = $('#export');

    $('.table-add').click(function() {
        var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
        $TABLE.find('table').append($clone);
    });

    $('.table-remove').click(function() {
        $(this).parents('tr').detach();
    });

    $('.table-up').click(function() {
        var $row = $(this).parents('tr');
        if ($row.index() === 1) return; // Don't go above the header
        $row.prev().before($row.get(0));
    });

    $('.table-down').click(function() {
        var $row = $(this).parents('tr');
        $row.next().after($row.get(0));
    });

    // A few jQuery helpers for exporting only
    // jQuery.fn.pop = [].pop;
    // jQuery.fn.shift = [].shift;

    $BTN.click(function() {
        var $rows = $TABLE.find('tr:not(:hidden)');
        var headers = [];
        var data = [];

    // Get the headers (add special header logic here)
    $($rows.shift()).find('th:not(:empty):not([data-attr-ignore])').each(function() {
        headers.push($(this).text().toLowerCase());
    });

    // Turn all existing rows into a loopable array
    $rows.each(function() {
        var $td = $(this).find('td');
        var h = {};

        // Use the headers from earlier to name our hash keys
        headers.forEach(function(header, i) {
        h[header] = $td.eq(i).text(); // will adapt for inputs if text is empty
        });

        data.push(h);
    });

    // Output the result
    //   $EXPORT.text(JSON.stringify(data));
    });
</script>

{{-- Table add row end --}}
{{-- Toggle Sidebar Script Start --}}
<script>
    function openNav() {
        document.getElementById("mySidepanel").style.width = "250px";
    }
    function closeNav() {
        document.getElementById("mySidepanel").style.width = "0";
    }
</script>
{{-- Toggle Sidebar Script End --}}
{{-- @stack('email-script') --}}
@endsection


