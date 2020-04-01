<!DOCTYPE html>
	<head>
		<meta charset="UTF-8">
	    <title>Essentia - @yield('title')</title>
	    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">

	</head>
	<body>
		<div class="page-header">
			<a href="/"><h1>Essentia Pharma</h1></a>
		</div>
		@if(Session::get('success'))
	        <div class="row">
	            <div class="col-lg-12">
	                <div class="alert alert-success alert-dismissable">
	                    <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
	                    <i class="fa fa-check"></i> {{ Session::get('success') }}
	                </div>
	            </div>
	        </div>
	        <!-- /.row -->
	    @endif
	    @if(Session::get('error'))
	        <div class="row">
	            <div class="col-lg-12">
	                <div class="alert alert-danger alert-dismissable">
	                    <button class="close" data-dismiss="alert" aria-hidden="true">x</button>
	                    <i class="fa fa-exclamation-triangle"></i> {{ Session::get('error') }}
	                </div>
	            </div>
	        </div>
	        <!-- /.row -->
	    @endif
	    @yield('content')

	    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
	    <script type="text/javascript">
	    	jQuery(function($){
			   $("#telefone").mask("(99) 9999-9999?9");
			});
	    </script>
	    
	</body>
</html>