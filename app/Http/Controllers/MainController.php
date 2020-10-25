<?php

namespace App\Http\Controllers;
use App\Models\Ordinateur;
use App\Models\Attribution;
use App\Models\Client;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MainController extends Controller
{
    //
    
    public function data(request $request){      
        


        $datas = Client::select('id','prenom')->where('prenom', 'LIKE', "%{$request->input('term')}%")->get();
           
        $dataModified = array();
        foreach ($datas as $data)
        {
        $dataModified[] = array("value"=>$data->id,"label"=>$data->prenom);
        }

        return response()->json($dataModified);
    }
    public function add_attrib(request $request){
        $attrib= new Attribution;
        $attrib->client_id=$request->user_id;
        $attrib->ordinateur_id=$request->poste_id;
        $attrib->horaire=$request->heure;
        $attrib->date=$request->date;
        $attrib->save();
        echo '<div class="bg-green-300 sm:rounded-lg border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">';
        echo '<div class="flex">';
        echo '<div>';
        echo '<p class="text-sm">Attribution effectuer</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    public function add_client(request $request){
        $client= new Client;
        $client->nom=$request->nom;
        $client->prenom=$request->prenom;
        $client->save();
        $request->user_id= $client->id;
        $this->add_attrib($request);
    }
    public function add_poste(request $request){
        $ordi= new Ordinateur;
        $ordi->nom=$request->nom;
        $ordi->save();
        echo '<div class="bg-green-300 sm:rounded-lg border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">';
echo '<div class="flex">';
echo '<div>';
echo '<p class="text-sm">Nouveau poste ajouter</p>';
echo '</div>';
echo '</div>';
echo '</div>';
    }
    public function vue(){
        $date=Carbon::now()->format('Y-m-d');
        $ordis= Ordinateur::all();
        $poste= Ordinateur::where('id',1)->first();
        $attribs= Attribution::where('date',$date)->where('ordinateur_id',$poste->id)->get();
        return response()->json($attribs);
        return view('dashboard',['date'=>$date,'ordis'=>$ordis, 'poste'=>$poste]);
    }
    public function table($id){
        $poste = Ordinateur::where('id',$id)->first();
        echo '<th>'.$poste->nom.'<input type="hidden" id="poste_id" value="'.$poste->id.'"></th>';
        echo '<tr><td>8h</td><td><button value="8h">attribuer</button></td></tr>';
        echo '<tr><td>9h</td><td><button value="9h">attribuer</button></td></tr>';
        echo '<tr><td>10h</td><td><button value="10h">attribuer</button></td></tr>';
        echo '<tr><td>11h</td><td><button value="11h">attribuer</button></td></tr>';
        echo '<tr><td>13h</td><td><button value="13h">attribuer</button></td></tr>';
        echo '<tr><td>14h</td><td><button value="14h">attribuer</button></td></tr>';
        echo '<tr><td>15h</td><td><button value="15h">attribuer</button></td></tr>';
        echo '<tr><td>16h</td><td><button value="16h">attribuer</button></td></tr>';
              
    }
    public function next($id){
        $poste = Ordinateur::where('id','>',$id)->orderBy('id')->first();
        if($poste){
            $this->table($poste->id);
        }else{
            $this->table($id);
        }
        
    }
    public function previous($id){
        $poste = Ordinateur::where('id','<',$id)->orderBy('id','desc')->first();
        if($poste){
            $this->table($poste->id);
        }else{
            $this->table($id);
        }
        
    }
}
