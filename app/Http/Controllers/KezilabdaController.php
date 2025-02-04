<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Csapat;
use App\Models\Csapattag;
use Illuminate\Support\Facades\Validator;

class KezilabdaController extends Controller
{
    public $validacioSzabalyok = [
        "csapat_nev" => "required|min:10|max:255",
        "szekhely" => "required",
        "alapitasi_ev" => "required|integer|min:1901|max:2025",
        "vezeto_edzo" => "required"
    ];

    public $validaciosUzenetek = [
        "csapat_nev.required" => "A csapat név megadása kötelező!",
        "csapat_nev.min" => "A csapat neve minimum 10 karakter",
        "csapat_nev.max" => "A csapat neve maximum 255 karakter lehet",
        "szekhely.required" => "A székhely megadása kötelező",
        "alapitasi_ev.required" => "Az alapítás év megadása kötelező",
        "alapitasi_ev.integer" => "Csak számot adhatsz meg",
        "alapitasi_ev.min" => "Minimum érték: 1901",
        "alapitasi_ev.max" => "Maximum érték: 2025",
        "vezeto_edzo" => "A vezető edző megadása kötelező"
    ];
    
    public function index(){
        $utolso3 = Csapat::orderBy('cs_id','DESC')->limit(3)->get();
        return view('welcome',["utolso3" => $utolso3]);
    }

    public function formCreate(Request $req){
        $req->validate($this->validacioSzabalyok,$this->validaciosUzenetek);

        $csapat1 = new Csapat;
        $csapat1->csapat_nev = trim($req->csapat_nev);
        $csapat1->szekhely = trim($req->szekhely);
        $csapat1->alapitasi_ev = trim($req->alapitasi_ev);
        $csapat1->vezeto_edzo = trim($req->vezeto_edzo);
        $csapat1->save();

        return redirect()->route('fooldal')->with('kesz','1');

    }

    public function csapatTagok(Request $req){
        $csid = $req->csid;
        $csapat = Csapat::find($csid);
        $csapatTagok = Csapattag::where("cs_id",$csid)->orderBy('nev','ASC')->get();

        return view('csapattagok',['csapat'=>$csapat,'csapatTagok' => $csapatTagok]);
    }

    public function getCsapat(Request $req){
        $csid = $req->id;
        $csapat = Csapat::find($csid);
        if($csapat){
            $data['csapat'] = $csapat;
            return response()->json($data,200);
        }else{
            $data['message'] = "Nincs ilyen csapat";
            return response()->json($data,400);
        }
    }

    public function createCsapat(Request $req){
        $validacio = Validator::make($req->all(),$this->validacioSzabalyok,$this->validaciosUzenetek);
        if($validacio->fails()){
            $hibak = $validacio->errors();
            $data['message'] = "Hibás adatok";
            $data['errorList'] = $hibak;
            return response()->json($data,400);
        }else{
            return Csapat::create($req->all());
        }
    }

}
