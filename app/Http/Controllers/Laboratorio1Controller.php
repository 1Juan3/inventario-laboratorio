<?php

namespace App\Http\Controllers;

use App\Models\Laboratorio_1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Laboratorio1Controller extends Controller
{
    public function crearReactivo(Request $request){

        $imagen = $request->file('imagen');
        $pdf = $request->file('ficha_seguridad');
        @dump($imagen);
        if($imagen && $pdf){
        $ruta_imagen = $imagen->storeAs('public/images-reactivos', 'nombre_personalizado.pdf');
        $ruta_ficha = $pdf->storeAs('public/pdf-fds', 'nombre_personalizado.pdf');
        $reactivo = new Laboratorio_1;
        $reactivo->codigo_producto =  $request->input('codigo');
        $reactivo->nombre_reactivo =  $request->input('nombre');
        $reactivo->foto =  $ruta_imagen;
        $reactivo->ficha_seguridad =  $ruta_ficha;
        $reactivo->cantidad =  $request->input('cantidad');
        $reactivo->save();
        session()->flash('status', 'Reactivo generado');
    }else{
        
        session()->flash('status1', 'No se puedo generar el reactivo ');
    }


    return redirect()->route('viewReactivo');
    }
    public function buscarReactivos(Request $request)
    {
        $query = $request->input('query');
        $informacion = Laboratorio_1::where('nombre_reactivo', 'LIKE', "%$query%")
            ->orWhere('codigo_producto', 'LIKE', "%$query%")
            ->orWhere('cantidad', 'LIKE', "%$query%")
            ->get();
    
        return view('tu-vista', compact('informacion'));
    }
     


    public function verReactivos(Request $request){

        $query = trim($request->get('query')) ;
        
        $informacion = DB::table('laboratorio_1')
                         ->select('codigo_producto', 'nombre_reactivo', 'cantidad')
                         ->where('nombre_reactivo', 'LIKE', '%'.$query.'%')
                         ->orWhere('codigo_producto', 'LIKE', '%'.$query.'%')
                         ->orderBy('nombre_reactivo', 'asc')
                         ->paginate(10);
        return view('laboratorio1', ['informacion' =>$informacion]);
    }
}



