<?php

namespace ProyectIcfes\Http\Controllers\Auth;
use ProyectIcfes\Rol;
use ProyectIcfes\User;
use ProyectIcfes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller{

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(){

        $this->middleware('guest')->except([
            "showRegistrationForm",
            "register"
        ]);

        $this->middleware("EsAdmin")->only([
            "showRegistrationForm",
            "register"
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/(.*)@unipanamericana.edu.co/i'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \ProyectIcfes\User
     */
    public function createUser(){
        return view('layouts.usuarios.create');
    }


    protected function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 2,
        ]);
        //$user->roles()->attach(2);
        return $user;
    }

    protected function createVisitante(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 3
        ]);
        //$user->roles()->attach(2);
        return $user;
    }

    protected function store(request $request){
        $user = new User();
        $user->fill($request->all());
        $user->password = bcrypt($user->password);
        $user->roles()->attach(2);
        $user->save();
        return redirect('home');
    }

    protected function storeVisitante(request $request){
        $user = new User();
        $user->fill($request->all());
        $user->password = bcrypt($user->password);
        $user->roles()->attach(3);
        $user->save();
        return redirect('login');
    }

    public function showVisitanteRegistrationForm(){
        return view('auth.registerVisitante');
    }
}
