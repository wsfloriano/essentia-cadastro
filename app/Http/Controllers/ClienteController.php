<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Foto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Image;

class ClienteController extends Controller
{
    public function index()
    {	
    	$clientes = Cliente::with('fotos')->get();
    	return view('index')->with('clientes', $clientes);
    }

    public function create()
    {
    	return view('create');
    }

    public function store()
    {	
		$cliente = new Cliente();

    	$name = Input::get('name');
    	$email = Input::get('email');
    	$telefone = Input::get('telefone');

    	$emailUnique = Cliente::where('email', '=', $email)->first();
		
    	if ($emailUnique) {
    		Session::flash('error', 'Email já existe');
    		return redirect()->back();
    	}
		

    	$cliente->name = $name;
    	$cliente->email = $email;
    	$cliente->telefone = $telefone;
    	$cliente->save();

    	if(Input::hasFile('foto')){
		
			$imagename = md5(date('Y-m-d H:i:s').str_random(10));
			$path = 'public/images/';
			
			//Salva foto
			$path2 = Input::file('foto')->move($path, $imagename.'.jpg');
			$img = Image::make($path2->getRealPath());
			$img->resize(config('constants.foto.width'), config('constants.foto.height'));
			$img->save($path.$imagename.'.jpg');

			//Salva miniatura
			$img_thumb_tiny = Image::make($path2->getRealPath());
			$img_thumb_tiny->fit(config('constants.foto_thumb_tiny.width'), config('constants.foto_thumb_tiny.height'));
			$img_thumb_tiny->save($path.$imagename.'_thumb_tiny.jpg');

			// unlink($path2);

			$photo = new Foto;
			$photo->cliente_id = $cliente->id;
  			$photo->foto = $imagename.'.jpg';
  			$photo->thumb_tiny = $imagename.'_thumb_tiny.jpg';

            $photo->save();
        
		}
		if($cliente->id) {
			Session::flash('success', 'Cliente cadastrado com sucesso!');
		} else {
			Session::flash('error', 'Houve um erro ao cadastrar usuário.');
		}
    	return redirect()->route('clientes.index');
    }

    public function edit($id)
    {
    	$cliente = Cliente::where('id', '=', $id)->with('fotos')->first();
    	// return var_dump($cliente);
    	return view('edit')->with('cliente', $cliente);
    }

    public function update($id)
    {
    	$cliente = Cliente::find($id);

    	$name = Input::get('name');
    	$email = Input::get('email');
    	$telefone = Input::get('telefone');



    	$cliente->name = $name;
    	$cliente->email = $email;
    	$cliente->telefone = $telefone;
    	$cliente->save();

    	if(Input::hasFile('foto')){
    		$fotos = Foto::where('cliente_id', '=', $cliente->id)->get();
    		foreach ($fotos as $foto) {
    			// return var_dump($foto->thumb_tiny);
    			unlink('public/images/'.$foto->thumb_tiny);
    			unlink('public/images/'.$foto->foto);
    			$foto->delete();
    		}
    		
		
			$imagename = md5(date('Y-m-d H:i:s').str_random(10));
			$path = 'public/images/';
			
			//Salva foto
			$path2 = Input::file('foto')->move($path, $imagename.'.jpg');
			$img = Image::make($path2->getRealPath());
			$img->resize(config('constants.foto.width'), config('constants.foto.height'));
			$img->save($path.$imagename.'.jpg');

			//Salva miniatura
			$img_thumb_tiny = Image::make($path2->getRealPath());
			$img_thumb_tiny->fit(config('constants.foto_thumb_tiny.width'), config('constants.foto_thumb_tiny.height'));
			$img_thumb_tiny->save($path.$imagename.'_thumb_tiny.jpg');

			// unlink($path2);

			$photo = new Foto;
			$photo->cliente_id = $cliente->id;
  			$photo->foto = $imagename.'.jpg';
  			$photo->thumb_tiny = $imagename.'_thumb_tiny.jpg';

            $photo->save();
        
		}
		if($cliente->id) {
			Session::flash('success', 'Cliente atualizado com sucesso!');
		} else {
			Session::flash('error', 'Houve um erro ao atualizar usuário.');
		}
    	return redirect()->route('clientes.index');
    }

    public function delete()
    {	
    	$id = Input::get('id');
    	$cliente = Cliente::find($id);
		if( $cliente->delete() ){
			Session::flash('success','Cliente removido com sucesso.');
		} else {
			Session::flash('error','Houve um erro ao excluir usuário.');
		}

		return redirect()->back();
    }
}
