@extends('layouts.default')

@section('title', 'Clientes')

@section('content')
	<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav in" id="side-menu">

		        <li>
			        <a href="{{ route('clientes.create') }}">Criar novo cliente</a>
			    </li>
			</ul>

        </div>
    </div>
	
	
		<div id="page-wrapper">
			<div class="row">
				<h1 class="page-header">Lista de clientes</h1>
			</div>
			@include('partials.table')
		</div>
	
@stop