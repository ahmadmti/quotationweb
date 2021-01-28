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
    {{-- <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script> --}}
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
</head>
{{-- <style>
    .loader-wrapper {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background-color: white;
        display:flex;
        justify-content: center;
        align-items: center;
        z-index: 9999 !important;
    }

    .loader {
        position: relative;
        animation: loader 2s infinite ease;
    }
</style> --}}
<style>
    	body,
	html {
	  height: 100%;
	  width: 100%;
	  padding: 0;
	  margin: 0;
	  /* overflow: hidden; */
	}

	.wrapper {
	  width: 100%;
	  height: 100%;
	}

	.loading {
	  margin: 10% auto;
	  border-top: 6px solid #ffffff;
	  width: 125px;
	  position: absolute;
	  margin: 0 auto;
	  left: 0;
	  right: 0;
	  top: 50%;
	  z-index: 9999;
	}

	.spin {
	  -webkit-animation: spin 1s infinite linear;
	  -moz-animation: spin 2s infinite linear;
	  -ms-animation: spin 2s infinite linear;
	  -o-animation: spin 2s infinite linear;
	  animation: spin 1s infinite linear;
	}

	@keyframes "spin" {
	  from {
	    -webkit-transform: rotate(0deg);
	    -moz-transform: rotate(0deg);
	    -o-transform: rotate(0deg);
	    -ms-transform: rotate(0deg);
	    transform: rotate(0deg);
	  }
	  to {
	    -webkit-transform: rotate(360deg);
	    -moz-transform: rotate(360deg);
	    -o-transform: rotate(360deg);
	    -ms-transform: rotate(360deg);
	    transform: rotate(360deg);
	  }
	}

	@-moz-keyframes spin {
	  from {
	    -moz-transform: rotate(0deg);
	    transform: rotate(0deg);
	  }
	  to {
	    -moz-transform: rotate(360deg);
	    transform: rotate(360deg);
	  }
	}

	@-webkit-keyframes "spin" {
	  from {
	    -webkit-transform: rotate(0deg);
	    transform: rotate(0deg);
	  }
	  to {
	    -webkit-transform: rotate(360deg);
	    transform: rotate(360deg);
	  }
	}

	@-ms-keyframes "spin" {
	  from {
	    -ms-transform: rotate(0deg);
	    transform: rotate(0deg);
	  }
	  to {
	    -ms-transform: rotate(360deg);
	    transform: rotate(3670deg);
	  }
	}

	@-o-keyframes "spin" {
	  from {
	    -o-transform: rotate(0deg);
	    transform: rotate(0deg);
	  }
	  to {
	    -o-transform: rotate(360deg);
	    transform: rotate(360deg);
	  }
	}

	.class {
	  -webkit-animation: none;
	  -moz-animation: none;
	  -o-animation: none;
	  animation: none;
	}

	.up {
	  background-color: #34495e;
	  width: 100%;
	  height: 50%;
	  position: absolute;
	  top: 0;
	}

	.down {
	  background-color: #34495e;
	  width: 100%;
	  height: 50%;
	  position: absolute;
	  bottom: 0;
	}

	.left-text-con,
	.right-text-con {
	  position: absolute;
	  width: 50%;
	  height: auto;
	  top: 35%;
	}

	.left-text-con {
	  left: -50%;
	  text-align: right;
	  margin-right: 10px;
	}

	.right-text-con {
	  right: -50%;
	}

	.text {
	  color: #34495e;
	  font-size: 4em;
	  margin: 0 auto;
	}

	@media (max-height: 300px) {
	  .text {
	    font-size: 3em;
	  }
	  .left-text-con,
	  .right-text-con {
	    top: 20%;
	  }
	}

.anchor-user {
  font-size: 3em;
  position: relative;
  bottom: 0;
  right: 20px;
  color: #000;
}

.anchor-user:hover {
  color: #039be5;;
    -webkit-transition: color .5s ease;
     -moz-transition: color .5s ease;
      -ms-transition: color .5s ease;
       -o-transition: color .5s ease;
          transition: color .5s ease;
}
</style>

<body class="body">

    {{-- <div class="loader-wrapper">
        <span class="loader">
            <img src="{{ asset('images/loader.gif') }}" width="50px">
        </span>
    </div> --}}

    <div class="wrapper">
        <div class="up"></div>
        <div class="loading"></div>
        <div class="down"></div>
      </div>

    @yield('dashboard')



<script>
    $(window).load(function() {
        $(".wrapper").fadeOut("slow");
  $(".loading").addClass("spin");

  setTimeout(function() {
    var currentPositon = $(".loading").css("transform");
    console.log(currentPositon)
    $(".loading").addClass("class").css("transform", currentPositon).css("transform", "none")
    $(".loading").animate({

    }, 500, function() {
      increaseWidth();
    });
  }, 1985);

  function increaseWidth() {
    $(".loading").animate({

      width: "+=100%",
    }, 2500, function() {
      slide();
      removeLine();
      moveTextRight();
      moveTextLeft();
    });
  }

  function removeLine() {
    $(".loading").animate({

      width: "0%",
    }, 2500, function() {});
  }

  function goUp() {
    $(".up").show();
    $(".up").animate({
      top: "-=50%"
    }, 2500, function() {
      $(this).hide();
    });
  }

  function goDown() {
    $(".down").show();
    $(".down").animate({
      bottom: "-=50%"
    }, 2500, function() {
      $(this).hide();
    });
  }

  function slide() {
    goUp();
    goDown();
  }

});
</script>
    {{-- <script>
        $(window).on("load",function(){
            $(".loader-wrapper").fadeOut("slow");
        });
    </script> --}}
</body>
</html>

