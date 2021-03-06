<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\projet;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(){
        $logs = Log::all();
        return view('admin.logs.index', [
            'logs' => $logs,
        ]);
    }

    public function create(){
        $projets = Projet::all();
    	return view('admin.logs.create_edit',[
            'projets' => $projets
        ]);
    }

    public function store(Request $request){
        //validation des champs
        $this->validate($request, [
            'type' 	        => 'required',
            'date' 	=> 'required',
            'time' 	=> 'required',
            'message' 	    => 'required',
            'projet_id' 	=> 'required',
        ]);

        //Enregistrement du log dans la base de données
        log::create([
            'type'          => $request->type,
            'date_heure'    => $request->date.' '.$request->time,
            'message'       => $request->message,
            'projet_id'     => $request->projet_id,
        ]);

        return redirect()->back()->with('success', 'logs enregistrer avec succes!');
    }

    public function edit($id){
        $log = log::findOrFail($id);
        $projets = Projet::all();
        return view('admin.logs.create_edit', [
            'log' => $log,
            'projets'=> $projets,
        ]);
    }

    public function update(Request $request, $id){
        $item = log::findOrFail($id);
    	$this->validate($request, [
             'type' 	        => 'required',
            'date' 	=> 'required',
            'time' 	=> 'required',
            'message' 	    => 'required',
            'projet_id' 	=> 'required',
        ]);

        $item->update([
        	'type'          => $request->type,
            'date_heure'    => $request->date.' '.$request->time,
            'message'       => $request->message,
            'projet_id'     => $request->projet_id,
        ]);

        return redirect('/admin/log/index')->with('success', 'log modifier avec succes!');
    }

    public function delete($id){
        $item = log::findOrFail($id);
        $item->delete();
        return $resultat = ['success' => 'log supprimer!'];
    }
}
