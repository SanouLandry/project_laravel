<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validate;

class userController extends Controller
{
    
    public function addUser(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'login' => 'required',
            'password' => 'required|min:2',
            'confirm_password' => 'required|min:2',
            'numeroTelephone' => 'required',
            'email' => 'required',
        ]);
        
        $utilisateur = new \App\Models\Utilisateur;
        $utilisateur->idUser=$request->idUser;
        $utilisateur->id=$request->id;
        $utilisateur->idSalaire=0;
        $utilisateur->nom=$request->nom;
        $utilisateur->prenom=$request->prenom;
        $utilisateur->login=$request->login;
        $utilisateur->password=bcrypt($request->password);
        $utilisateur->numeroTelephone=$request->numeroTelephone;
        $utilisateur->email=$request->email;

        if($request->password==$request->confirm_password)
        {
            $utilisateur->save();
            return redirect('/main');
        }
        else{
            return redirect('/main');
        }
       
        
    }

    public function seConnecter(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required|min:2',
        ]);
        $user=DB::table('utilisateurs')
                ->join('profils','utilisateurs.id','=','profils.id')->where('login',$request->input('login'))->first();
        
        $historique= new \App\Models\historiqueconnexion;
        $historique->id=$request->id;
        $historique->idUser=$user->idUser;
        $historique->dateConnexion=date('Y-m-d H:i:s');
        $historique->dateDeConnexion=date('Y-m-d');
        $historique->save();
        if($user)
        {
            if(Hash::check($request->input('password'), $user->password))
            {
                $request->session()->put('utilisateurs', $user);
                return redirect('/main');
            }else{
                return back()->with('status','Identifiant ou mot de passe incorrect');
            }
        }else{
            return back()->with('status','Vous n\'avez pas de compte');
        }
    }
    public function modifierUser(Request $request)
    {
        $datas= new \App\Models\Utilisateur;
        $data=$datas->find($request->id);
        $data->id=$request->id;
        $data->idSalaire=0;
        $data->nom=$request->nom;
        $data->prenom=$request->prenom;
        $data->login=$request->login;
        $data->password=bcrypt($request->password);
        $data->numeroTelephone=$request->numeroTelephone;
        $data->email=$request->email;
        $data->save();
        return redirect('/main');
    }

    public function SeDeconnecter(Request $request)
    {
        $user=new \App\Models\historiqueconnexion;
        $data=$user->find(session('utilisateurs')->id);
        $data->dateDeConnexion=date('Y-m-d H:i:s');
        $data->save();
        return view('layouts/main');
    }
}
