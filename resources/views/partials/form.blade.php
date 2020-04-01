<?php
use Illuminate\Support\Facades\Input;
?>
<div class="col-lg-12">
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="panel panel-default">
            @if(isset($cliente->id))
                <div class="panel-heading">
                    Editar
                </div>
                @method('PUT')
            @else
                <div class="panel-heading">
                    Adicionar
                </div>
            @endif
            
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="form-group">
                            <label for="name">Nome*</label>
                            <input class="form-control" type="text" name="name" required="required" placeholder="Nome" value="{!! isset($cliente) ? $cliente->name : Input::old('name') !!}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="form-group">
                            <label for="email">E-mail*</label>
                            <input class="form-control" type="email" name="email" required="required" placeholder="E-mail" value="{!! isset($cliente) ? $cliente->email : Input::old('email') !!}">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="form-group">
                            <label for="telefone">Telefone*</label>
                            <input class="form-control" type="tel" id="telefone" name="telefone" required="required" placeholder="Telefone" value="{!! isset($cliente) ? $cliente->telefone : Input::old('telefone') !!}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="form-group">
                            <label for="foto">Foto*</label>
                            <input type="file" name="foto" required="required" id="foto">
                            @if(isset($cliente))
                            @foreach($cliente->fotos as $foto)
                                <img class="logo-img" src="{{ asset('public/images/' . $foto->thumb_tiny) }}">
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <input type="submit" class="btn btn-warning" value="Salvar">
            </div>
        </div>
    </form>
</div>