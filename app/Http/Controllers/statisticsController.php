<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class statisticsController extends Controller
{
    // Este metodo se encarga de mostrar la vista principal pasando los datos para usar el componente de VUE
    // que se encarga de armar el formulario con sus respectivas preguntas y respuestas
    public function formularios($id){

       $data = DB::table('tb_questions')->where('form_id',$id)->get();

        return $data;
    }

    public function estadisticas(){


        return view('formularios');
    }

    public function store(Request $request){
        $array = $request->all();
        $formulario =$request->input('formulario');
        $user_id = auth()->id();
        // procesar respuesta
        foreach ($array as $clave => $valor){
            if($clave != '_token' and $clave != 'formulario')
             // guardar datos en tabla
                 DB::table('tb_statistics')->insert([
                     ['form_id' => $formulario, 'question_id' => $clave , 'option' => $valor , 'user_id' => $user_id ],
                 ]);
        }
        if($formulario == 7 || $formulario == 8){
            return redirect()->route('inteligencias');
        }else{
            return redirect()->route(
                'resultados.test', ['id' => $formulario]);
        }
    }

    public function graficos($formulario,$pregunta) {
        $preguntas = array();
        $cantidadOpcion = array();
        // titulo preguta
            $titulo = DB::table('tb_questions')->select('question')->where('id',$pregunta)->get()->toArray();
            $titulo = $titulo[0]->question;

        // total de respuestas
          $total = DB::table('tb_statistics')->where([['form_id',$formulario],['question_id',$pregunta]])->count();
        // array con las opciones
        $datos = DB::table('tb_questions')->where([['form_id',$formulario],['id',$pregunta]])->get()->toArray();

        // existe una opcion y cuantos elementos de la misma
         if($datos[0]->r1 != null){
             $cantidad = DB::table('tb_statistics')->where([['option',$datos[0]->r1] ,['form_id',$formulario],['question_id',$pregunta]])->count();
             $cantidad = ($cantidad * 100) / $total;
             array_push($preguntas,$datos[0]->r1);
             array_push($cantidadOpcion,$cantidad);
         }
        if($datos[0]->r2 != null){
            $cantidad = DB::table('tb_statistics')->where([['option',$datos[0]->r2] ,['form_id',$formulario],['question_id',$pregunta]])->count();
             $cantidad = ($cantidad * 100) / $total;
             array_push($preguntas,$datos[0]->r2);
             array_push($cantidadOpcion,$cantidad);
        }
        if($datos[0]->r3 != null){
            $cantidad = DB::table('tb_statistics')->where([['option',$datos[0]->r3] ,['form_id',$formulario],['question_id',$pregunta]])->count();
             $cantidad = ($cantidad * 100) / $total;
             array_push($preguntas,$datos[0]->r3);
             array_push($cantidadOpcion,$cantidad);
        }
        if($datos[0]->r4 != null){
            $cantidad = DB::table('tb_statistics')->where([['option',$datos[0]->r4] ,['form_id',$formulario],['question_id',$pregunta]])->count();
             $cantidad = ($cantidad * 100) / $total;
             array_push($preguntas,$datos[0]->r4);
             array_push($cantidadOpcion,$cantidad);
        }

        $resultados = array($preguntas,$cantidadOpcion,$titulo);

        return $resultados;
    }

    public  function respuestaCorrecta($formulario){

        $data = DB::table('tb_questions')
            ->join('tb_statistics','tb_questions.id','=','tb_statistics.question_id' )
            ->select('tb_questions.*','tb_statistics.option')
            ->where([
                ['tb_questions.form_id',$formulario],
                ['tb_statistics.user_id',auth()->id()],
            ])->get();

        return $data;

    }
}
