<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Notification;
use App\Models\User;
use App\Mail\passwordForgetMail;
use Session;
// use Mail;

class AuthController extends Controller 
{
	protected $redirectTo = '/admin';

    public function login(Request $request){
    	if ($request->isMethod('post')) {

            $this->validate($request, [
                'email'     => 'required|email',
                'password'  => 'required',
                'remenber'  => ''
            ]);

            $login = Auth()->attempt(['email'=> $request->email,'password'=> $request->password], $request->has('remenber'));

            if($login){
                if(Auth::user()->level==0){
                    Auth::logout();
                    Session::flash('error', "Désolé, Vous n'etes pas autorisé a avoir acces cette plateforme.");
                    return back()->withInput($request->only('email'));
                }
                return redirect()->intended('/admin');
            }else{
                Session::flash('error', 'Mot de passe ou Email incorrect');
                return back()->withInput($request->only('email'));
            }

        }else{
            return view('admin.auth.login');
        }
    }

    public function reset(Request $request){

    	if ($request->isMethod('post')) {
            $this->validate($request, [
                'email'   => 'required',
            ]);

            if (User::where('email',$request->email)->exists()) {

                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $newpassword = '';
                for ($i = 0; $i <= 8; $i++) {
                    $index = rand(0, strlen($characters) - 1);
                    $newpassword .= $characters[$index];
                }


                $user = User::where('email',$request->email)->first();
                $user->update([ 'password' => bcrypt($newpassword)]);


                Mail::to($request->email)->send(new passwordForgetMail($newpassword));
                Session::flash('success', 'Un message a été envoyé a votre adresse mail. Veuillez le consulter pour continuer le processus');
                return redirect()->back();
            } else {
                Session::flash('error', 'Email invalide! Veuillez réessayer');
                return redirect()->back();
            }
        }else{
            return view('admin.auth.reset');
        }
    }

    public function register(Request $request){
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'nom' => 'required',
                'prenom' => 'required',
                'telephone'=>'required|min:8|unique:users,telephone',
                'email' => 'required|email|unique:users,email',
                'adresse' => '',
                'password' => ['required', 'confirmed', 'min:4'],
                'password_confirmation' => ['required'],
            ]);

            $user=User::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'adresse' => $request->adresse,
                'level' => 0,
                'password' => bcrypt($request->password),
            ]);

            Notification::new("$request->nom $request->prenom vient de s'enregistrer veuillez verifier son compte et le valider",0);
          
            Session::flash('success', "Votre compte a été enrégistré avec succès. Veuillez contacter un administrateur pour l'actvation pour pouvoir accés à la plateforme");
            return view('admin.auth.login');
        }else{
            return view('admin.auth.register');
        }
    }

    public function changePassword(Request $request){
        if ($request->isMethod('post')) {
            // dd('ed');
            $this->validate($request, [
                'oldpassword'           => 'required',
                'password'              => 'required|confirmed|min:4',
                'password_confirmation' => 'required',
            ]);

            if(Auth()->attempt(['email'=> Auth::user()->email,'password'=> $request->oldpassword])){
                $user = User::findorfail(Auth::user()->id);
                $user->update([ 'password' => bcrypt($request->password)]);
                Session::flash('success', 'Mot de passe modifier avec succés');
                return redirect()->back();
            }else{
                Session::flash('error', 'Mot de passe incorrect');
                return redirect()->back();
            }
        }else{
            return view('admin.auth.change_password');
        }
    }

    public function logout(Request $request){
        auth()->logout();
        Session::flash('success', 'Déconnecter avec succés');
        return redirect('admin/auth/login');
    }

    public function lang($lang){
        session(['lang' => $lang]);
    }
}
