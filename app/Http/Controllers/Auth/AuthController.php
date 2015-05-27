<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use DB;

class AuthController extends Controller {

    /**
     * Create a new authentication controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout', 'getLog']]);
    }

    /**
     * Get auth
     *
     * @return json
     */
    public function getLog()
    {
        return response()->json(['auth' => Auth::check()]);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'alias' => 'required', 
            'password' => 'required',
            ]);

        $credentials = $request->only('alias', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return response()->json(["result" => "success", "message" => "logeado correctamente"]);
        }else{
        	return response()->json(["result" => "error", "message" => "El nombre de usuario o la contraseña son incorrectos"]);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        Auth::logout();

        return redirect("/");
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        // return view('auth.register');
        return view('productos');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Repositories\UserRepository
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request, UserRepository $userRepository) {

        $result = array();
        $alias = $request->input('alias');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        //comprovar que el alias o el email no estan cogidos
        $user = DB::select("SELECT alias,email FROM users WHERE alias = ? OR email = ?;", array($alias, $email));

        if (sizeof($user) > 0) {
            $result["result"] = "error";
            if ($user[0]->alias == $alias) {
                $result["message"] = "Este alias ya existe!";
                $result["type"] = "alias";
            } else if ($user[0]->email == $email) {
                $result["message"] = "Este email ya existe!";
                $result["type"] = "email";
            }
        } else {
            if(DB::insert('INSERT INTO users (alias, email, password) VALUES (?,?,?)', array($alias, $email, $password))){
                $lastInserted = DB::getPdo()->lastInsertId();
                $result["result"] = "success";
                $result["message"] = "Bienvenido!";
                Auth::loginUsingId($lastInserted);
            } else {
                $result["result"] = "success";
                $result["message"] = "No se ha podido crear el usuario";
            }
        }

        return response()->json($result);

    }



}
