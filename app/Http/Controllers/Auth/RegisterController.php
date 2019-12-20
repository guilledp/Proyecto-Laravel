<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

// para el uuid
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
    protected $redirectTo = '/cursos';

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
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        //dd($data);
      $mensajes = [
        'required' => 'Requerido',
        'string' => 'El campo debe ser un texto',
        'email' => 'El formato debe ser nombre@ejemplo.com',
        'email.unique' => 'Ya existe un usuario registrado con ese correo',
        //'image' => 'Imagen requerida',
        'password.min' => 'La contraseña debe tener 8 caracteres.',
        'codigo_empresa.string' => 'Debe indicarse un código de empresa válido',
        'codigo_empresa.exists' => 'Debe indicarse un código de empresa válido',
        'codigo_empresa.max' => 'Debe indicarse un código de empresa válido',
      ];

        if(!$data['es_empresa']) { // usuario
            $ce = $data['codigo_empresa'];
            return Validator::make($data, 
                [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:4', 'confirmed'],
                'lastname'=> ['required', 'string', 'max:255'],
                'codigo_empresa'=> [
                    'required',
                    Rule::exists('users', 'codigo_empresa')                     
                        ->where(function ($query) use ($ce) {                      
                        $query->whereCodigoEmpresa($ce)->where('es_empresa',1);                  
                        })]
                    ]
                    ,$mensajes);
        } else { // empresa
            return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            // 'lastname'=> ['required', 'string', 'max:255'],
            'empresa'=> ['required', 'string', 'max:255'],
            'cuit'=> ['required', 'integer'],
        ], $mensajes);
        }
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        // si es empresa
        if($data['es_empresa']) {
            $data['codigo_empresa'] = strtoupper(substr(preg_replace("/[0-9]/", "", md5(microtime())), 0,4)); 
            $data['name'] = $data['empresa'];
            $data['lastname'] = $data['cuit'];

        }

        return User::create([
            'name' => $data['name'],
            'uuid' => Str::uuid(),
            'email' => $data['email'],
            'lastname' => $data['lastname'],
            'codigo_empresa' => $data['codigo_empresa'],
            'es_empresa' => $data['es_empresa'],
            'empresa' => $data['empresa'],
            'cuit' => $data['cuit'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
