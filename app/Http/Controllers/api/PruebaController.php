<?php

namespace App\Http\Controllers\api;

use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PruebaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['crearUsuario']]);
    }

    function index(){
        $users = User::all();
        return response()->json([
            'users' => $users
        ]);
    }

    function crearUsuario(Request $request){
        $nombre = $request->name;
        $email = $request->email;
        $password = $request->password;
        if($email && $password && $nombre){
            $user = new User();
            $user->name = $nombre;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->save();
            return response()->json([
                'user'=> $user
            ]);
        }
        return response()->json([
            'error' => 'No ha introducido todos los campos'
        ]);
    }

    function data(Request $request){
        $post = $request->post;
        $nombre = $request->nombre;
        $descripcion =  $request->descripcion;
        if($post && $nombre && $descripcion){
            return response()->json([
                'post' => $post,
                'nombre' => $nombre,
                'state' => $descripcion
            ]);
        }
        return response()->json([
            'error' => 'No ha introducido todos los campos'
        ]);
    }
}
