<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/scrabble/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     * Compruebo que los datos enviados sean correctos 
     * En caso correcto la ejecución prosigue.
     * Si la validación falla, el usuario es redirigido a la misma página
     * que hizo la solicitud pero se lanza una excepción con el 
     * correspondiente información de error al usuario. Esta información
     * puede obtenerse en blade de dos maneras:
     * 
     * - Desde la sesion, utilizando session('errors')->first('nombre_del_campo')
     * - Leyendo la variable $errors
     * 
     * En ambos casos se devuelve una colección, de la que se puede obtener
     * un valor concreto para un campo (1) o toda la colección (2).
     * 
     * (1)
     *      $errors->first('email')
     *
     * podemos preguntar antes si existe error para ese campo con
     * 
     *      $errors->has('email')
     * 
     * (2)
     *     @foreach ($errors->all() as $error)
     *        <p>{{ $error }}</p>
     *     @endforeach
     *
     * 
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255|min:4',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',
            'country' => 'required|string|max:2',
            'favourite_language' => 'nullable|string|max:2',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (array_key_exists('favourite_language',$data))
            $fl = $data['favourite_language'];           
        else
            $fl = null;

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'type' => 'player',
            'state' => 'online',
            'country' => $data['country'],
            'favourite_language' => $fl
        ]);
    }
}
