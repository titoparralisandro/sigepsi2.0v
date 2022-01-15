<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Siace;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\RegisterStoreRequest;
use Illuminate\Support\Facades\DB;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function register(RegisterStoreRequest $request)
    {
        return DB::transaction(function ($transaction) use ($request) {

        if ($request->customRadio === 'Estudiante') {

            $student = Siace::getStudentByEmail($request->email);          

            if (is_null($student)) {
                return redirect('/register')->with('error','El correo {{ $request->email }} No se Encuentra Registrado en SIACE.');
            }
            
            $user =  User::create($request->except(['customRadio','password','name'])+ ['password' =>  Hash::make($request->password),'name' => $student->nombres.' '.$student->apellidos]);
            $user->assignRole("Estudiante");

            $person = $user->persona()->create($student->only([
                'cedula',
                'nacionalidad',
                'nombres',
                'apellidos',
                'fec_nac',
                'edo_res',
                'direccion',
                'cod_carrera',
                'trayecto',
                'trimestre',
                'seccion',
                'turno']));

        }else{
            $user =  User::create($request->except(['customRadio','password'])+ ['password' =>  Hash::make($request->password)]);
            $user->assignRole("Comunidad");
        }
        return redirect('/login');
        });
    }
}
