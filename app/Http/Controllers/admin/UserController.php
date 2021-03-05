<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use Auth;
use Session;

class UserController extends Controller
{
    public function index(){
        // dd(Notification::where('level','<=',Auth::user()->level-1)->get());
    	$users = User::where('level','<>',-1)->get();
    	return view('admin.users.index',[
            'users' => $users
        ]);
    }

    //add  utilisateur
    public function create(){
        return view('admin.users.create_edit');
    }
    

    //inserer un utilisateur
    public function store(Request $request){
        
        $this->validate($request, [
            'nom'       => 'required',
            'prenom'    => 'required',
            'telephone' => 'required|min:8|unique:users,telephone',
            'email'     => 'required|email|unique:users,email',
            'adresse'   => '',
            'level'     => 'required',
            'password'  => ['required', 'confirmed', 'min:4'],
            'password_confirmation' => ['required'],
        ]);

        $user=User::create([
            'nom'       => $request->nom,
            'prenom'    => $request->prenom,
            'telephone' => $request->telephone,
            'email'     => $request->email,
            'adresse'   => $request->adresse,
            'level'     => $request->level,
            'password'  => bcrypt($request->password),
        ]);
      

        Session::flash('success', 'Utilisateur enregistré avec succes');
        return redirect()->back();
    }


    //show un utilisateur
    public function edit($id){
        $user=User::findorfail($id);

        return view('admin.users.create_edit',[
            'user'=>$user,
        ]);
    }

    //update un utilisateur
    public function update($id, Request $request){
        $user=User::findorfail($id);

        $this->validate($request, [
            'nom'       => 'required',
            'prenom'    => 'required',
            'telephone' =>'required|min:8',
            'email'     => 'required|email',
            'adresse'   => '',
            'level'     =>'required',
        ]);

      
        $user->update([
            'nom'       => $request->nom,
            'prenom'    => $request->prenom,
            'telephone' => $request->telephone,
            'email'     => $request->email,
            'adresse'   => $request->adresse,
            'level'     => $request->level,
        ]);

        Session::flash('success', 'Utilisateur modifié avec succes');

        return redirect('/admin/user/index'); 
    }


    
    public function delete($id){
        $user=User::findorfail($id)->delete();

        $resultat = ['success' => 'Utilisateur supprimé avec succes'];
        return $resultat;
    }

}
