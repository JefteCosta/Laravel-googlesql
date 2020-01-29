<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class UserController extends Controller
{

    //

    public function Index($msg = ''){
        /*$cod_id = 1;
        while ($cod_id < 10) {
            $user = new User();
            $user->name = 'Jefte Amorim da Costa'. $cod_id;
            $user->email = 'jefteamorim@gmail.com'. $cod_id;
            $user->password = Hash::make(123);
            $user->save();
            $cod_id++;
        }
        */
       // echo '<h1>Usuarios do banco de dados:</h1>';
        $users = DB::table('users')->get();
        return view('IndexUser', [
            'users' => $users,
            'msg'   => $msg
        ]);
    }

    public function UserEditar(User $user)
    {
     return view('editarUsuario', ['user' => $user]);
    }

    public function UserPerEdit(User $user, Request $request)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect()->route('user.alerta', ['msg'=>'alterado']);
    }
    public function UserNovo()
    {
        return view('NovoUsuario');

    }

    public function UserNovoInserir(Request $JCrequest)
    {
        $user = new User();
        $user->name = $JCrequest->name;
        $user->email = $JCrequest->email;
        $user->password = $JCrequest->password;
        $user->save();

        $msg = 'cadastrado';
        return redirect()->route('user.alerta', [ 'msg' => $msg]);

    }

    public function UserDelete(User $user)
    {
        $user->delete();
        return redirect()->route('user.alerta', [ 'msg' => 'deletado']);
    }

    public function UserExibir(User $user)
    {

    }

    public function UserAlerta($msg)
    {
        return view('IndexUser', [
            'msg'=>$msg
        ]);
    }
}
