<?php

namespace App\Http\Controllers;

use App\Models\Acto;
use App\Models\Documentacion;
use App\Models\Inscritos;
use App\Models\Lista_Ponentes;
use App\Models\Tipo_acto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActoController extends Controller
{
    public function index(){

        $id= Auth::user()->Id_Persona;
        $tipo_usuario = Auth::user()->Id_tipo_usuario;
        $query1 = Inscritos::select('id_acto')->where('Id_persona','=', $id)->get();
        $query2 = Lista_Ponentes::select('Id_acto')->where('Id_persona','=', $id)->get();

        $listaActos = Acto::whereNotIn('Id_acto', $query1)->whereNotIn('Id_acto', $query2)->orderBy('Fecha', 'asc')->get();
        $listaActosInscritos = Acto::whereIn('Id_acto', $query1)->orderBy('Fecha', 'asc')->get();
        $listaActosPonentes = Acto::whereIn('Id_acto', $query2)->orderBy('Fecha', 'asc')->get();

        $documents = Documentacion::where('Id_persona', '=', $id)->get();

        if($tipo_usuario == 1){
            return view('menu-admin/adminEvents', compact('listaActos', 'listaActosInscritos', 'listaActosPonentes'));
        }elseif($tipo_usuario == 2){
            return view('menu-usuario/usuario', compact('listaActos', 'listaActosInscritos', 'listaActosPonentes'));
        }else{
            return view('menu-ponente/ponente', compact('listaActos', 'listaActosInscritos', 'listaActosPonentes', 'documents'));
        }

        
    }

    public function showEvent(Request $request){
        $acto = Acto::where('Id_acto', '=', $request->input('id_acto'))->first();
        return view('events/showEvent', compact('acto'));
    }

    public static function datoInscribir($id){
        $user = Auth::user()->Id_Persona;
        $datoIns = Inscritos::where('Id_persona', '=', $user)->where('id_acto', '=', $id)->first();

        return $datoIns;
    }

    public function inscribirDesinscribir(Request $request){
        if($request->input('inscribirDesinscribir') === 'inscribirse'){
            $inscrito = new Inscritos;
            $inscrito->Id_persona = $request->input('id_persona');
            $inscrito->id_acto = $request->input('id_acto');
            $inscrito->Fecha_inscripcion = date('Y-m-d H:i:s');
            $inscrito->save();
            echo "<script>alert('Te has inscrito correctamente')</script>";
        }else{
            $delete = Inscritos::where('Id_persona', '=', $request->input('id_persona'))->where('id_acto', '=', $request->input('id_acto'))->delete();
            echo "<script>alert('Ya no estás inscrito')</script>";
        }


        $acto = Acto::where('Id_acto', '=', $request->input('id_acto'))->first();
        return view('events/showEvent', compact('acto'));
        
    }

    public static function getTipo_acto(){
        $tipos = Tipo_acto::all();
        return $tipos;
    }
}
