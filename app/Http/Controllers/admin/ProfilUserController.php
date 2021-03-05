<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;


class ProfilUserController extends Controller
{
    
    public function show(){
        return view('admin.profilUser.show');
    }

    public function edit(Request $request){
        if ($request->isMethod('post')) {

            $user = User::findorfail(Auth::user()->id);

            $this->validate($request, [
                'nom'               => 'required',
                'prenom'            => 'required',
                'email'             => 'required',
                'telephone'         => 'required',
                'adresse'           => 'required',
            ]);


            $user->update([
                'nom'               => $request->nom,
                'prenom'            => $request->prenom,
                'email'             => $request->email,
                'telephone'         => $request->telephone,
                'adresse'           => $request->adresse,
            ]);

            Session::flash('success', 'Profile Modifier acec succés');
            return redirect('/admin/profilUser');

        }else{
            return view('admin.profilUser.edit');
        }
    }

    public function delete()
    {
        $user = User::findorfail(Auth::user()->id);
        $user->update([ 'status' => 0]);
        Auth::logout();
        Session::flash('success', 'Compte supprimé');
        return redirect('admin/auth/login');
    }
}
