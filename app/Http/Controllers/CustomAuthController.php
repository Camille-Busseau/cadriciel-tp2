<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\City;
// use App\Controllers\StudentController;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::selectCity();
        return view('auth.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        // condition si faux, redirect()->back() avec tableau withErrors()->withInputs() (retour vers la page de login via refresh)
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|max:20',
            'phone' => 'required',
            'bday' => 'required',
            'address' => 'required',
            'city_id' => 'required'
        ]);

        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        $newStudent = new Student;
        $newStudent->fill($request->all());
        $newStudent->id = $user->id;
        $newStudent->save();

        return redirect(route('login'))->withSuccess(trans('lang.text_success_user'));
    }

    public function authentication(Request $request){

        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        // pour ne pas recevoir le token, les isoler
        $credentials = $request->only('email', 'password');

        // return $credentials;


        if (!Auth::validate($credentials)) :
            // trans(auth.failed) : /lang/eng/auth (en ce moment, il n'y a qu'une langue, mais si il y en avait plus, cette méthode permettrait la trad dynamique), pour un message vague: auth.failed, pour qqch de spécif à pwd: .password
            return redirect()->back()->withErrors(trans('auth.failed'));
        endif;

        // récupère le user
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        // créer la session
        Auth::login($user);
 
        // se souvient de la page tentative et la charge à la connexion : ne fonctionne pas sans les routes dans web.php
        return redirect()->intended(route('maisonneuve.index'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }

}
