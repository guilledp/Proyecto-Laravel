<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use \App\User;
use App\Rules\MatchOldPassword;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

  /**
  * Update the specified user.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request)
  {
    //dd($request);
    $ce = $request->codigo_empresa;

    if($request->email != Auth::user()->email) {
      $request->validate(
        [
          'email' => 'required|email|unique:users'
        ],
        [
          'email.required' => 'Debe ingresar un email válido',
          'email.email' => 'Debe ingresar un email válido',
          'email.unique' => 'El email indicado ya esta en uso'
        ]
      );
      Auth::user()->email = $request->email;
    }

    // VALIDACION PARA EMPRESA
    if(Auth::user()->es_empresa) {

      if($request->empresa != Auth::user()->empresa) {
        $request->validate(
          [
            'empresa' => 'required|max:100|unique:users',
          ],
          [
            'empresa.required' => 'Campo requerido',
            'empresa.max' => 'Debe tener como máximo 100 caracteres',
            'empresa.unique' => 'Nombre ya registrado'
          ]
        );
        Auth::user()->empresa = $request->empresa;
        Auth::user()->name = $request->empresa;
      }

      if($request->cuit != Auth::user()->cuit) {
        $request->validate(
          [
            'cuit'         => 'required|min:11|max:11|unique:users',
          ],
          [
            'cuit.required' => 'Campo requerido',
            'cuit.numeric' => 'Solo números, 11 digitos',
            'cuit.min' => 'Solo números, 11 digitos',
            'cuit.max' => 'Solo números, 11 digitos',
            'cuit.unique' => 'CUIT ya registrado',
          ]
        );
        Auth::user()->cuit = $request->cuit;
      }

    } else {
      // no es empresa
      $request->validate([
        'name' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'codigo_empresa' => [
          'required',
          Rule::exists('users', 'codigo_empresa')
          ->where(function ($query) use ($ce) {
            $query->whereCodigoEmpresa($ce)->where('es_empresa',1);
          })]]
          ,
          [
            'codigo_empresa.required' => 'Verifique el dato ingresado',
            'codigo_empresa.exists' => 'Verifique el dato ingresado',
            'codigo_empresa.required' => 'Verifique el dato ingresado',
            'lastname' => 'Verifique el dato ingresado',
            'required' => 'Verifique el dato ingresado',
            'max' => 'El dato ingresado es demasiado largo',
          ]);

          Auth::user()->name = $request->name;
          Auth::user()->lastname = $request->lastname;
        }

        // CAMBIO DE CONTRASEÑA************************
        if(!is_null($request->password) &&
        !is_null($request->password_confirmation) &&
        !is_null($request->current_password))
        {
        $request->validate(
          [
            'current_password' => ['required', new MatchOldPassword],
            'password'         => 'min:4',
            'password_confirmation'         => 'same:password',
          ],
          [
            'password.same' => 'Las contraseñas no coinciden',
            'current_password.required' => 'Debe indicar su contraseña actual',
            'password.required' => 'Debe indicar una contraseña válida',
            'password_confirmation.required' => 'Debe indicar una contraseña válida',
            'password.min' => 'Debe tener al menos 4 caracteres'
          ]
        );
        Auth::user()->password = Hash::make($request->password);
      }
      // CAMBIO DE CONTRASEÑA************************

      Auth::user()->codigo_empresa = $request->codigo_empresa;
      Auth::user()->save();

      return redirect(route('miPerfil'))->with("success", "Su perfil ha sido modificado");
    }

    public function updateAvatar(Request $request) {

      $request->validate([
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
      ],
      [
        'required' => 'Debe subir una imágen válida',
        'image' => 'El archivo debe ser una imagen (jpeg,png,jpg,gif,svg)',
        'max' => 'La imagen es muy grande (Max: 1024kb)',
      ]);

      $avatarName = Auth::user()->id.'_avatar-'.time().'.'.request()->avatar->getClientOriginalExtension();
      $avatar_file = $request->avatar->storeAs('/',$avatarName, ['disk' => 'avatars']);

      Auth::user()->avatar = $avatar_file;
      Auth::user()->save();

      return redirect()->route('miPerfil');
    }

    public function updateLogo(Request $request) {

      $request->validate([
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
      ],
      [
        'required' => 'Debe subir una imágen válida',
        'image' => 'El archivo debe ser una imagen (jpeg,png,jpg,gif,svg)',
        'max' => 'La imagen es muy grande (Max: 1024kb)',
      ]);

      $logoName = Auth::user()->id.'_logo-'.time().'.'.request()->logo->getClientOriginalExtension();
      $logo_file = $request->logo->storeAs('/',$logoName, ['disk' => 'logos']);

      Auth::user()->logo = $logo_file;
      Auth::user()->save();

      return redirect()->route('miPerfil');
    }
  }
