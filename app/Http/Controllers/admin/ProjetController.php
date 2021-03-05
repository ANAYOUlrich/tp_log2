<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\projet;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;

class ProjetController extends Controller
{
    public function index(){
        $projets = projet::all();
        return view('admin.projets.index', [
            'projets' => $projets,
        ]);
    }

    public function create(){
    	return view('admin.projets.create_edit');
    }

    public function store(Request $request){

        //validation des champs
        $this->validate($request, [
            'libelle' 	    => 'required',
            'description' 	=> 'required',
        ]);

        //Enregistrement du projet dans la base de données
        projet::create([
            'libelle'       => $request->libelle,
            'description'   => $request->description,
            'creer_par'    => Auth::user()->id,
        ]);

        return redirect()->back()->with('success', 'Projets enregistrer avec succes!');
    }

    public function edit($id){
    	$projet = projet::findOrFail($id);
        return view('admin.projets.create_edit', [
            'projet' => $projet,
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = projet::findOrFail($id);
    	$this->validate($request, [
            'libelle' 	    => 'required',
            'description' 	=> 'required',
        ]);

        //Modifier de la sociéte dans la base de données
        $item->update([
        	'libelle'       => $request->libelle,
            'description'   => $request->description,
            'modifier_par'  => Auth::user()->id,
        ]);

        return redirect('/admin/projet/index')->with('success', 'Projet modifier avec succes!');
    }

    public function delete($id)
    {
        
        $item = projet::findOrFail($id);
        if(count($item->logs)<=0){
            $item->delete();
            return $resultat = ['success' => 'Projet supprimer!'];
        }
        return $resultat = ['error' => 'Le projet ne peut pas etre supprimer, veuiller supprimer ses logs au prealabre!'];        
    }
}
