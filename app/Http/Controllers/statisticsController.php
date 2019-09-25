<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TestController;

class statisticsController extends Controller
{
    protected  $TestConroller;
    public function __construct(TestController $testController)
    {
        $this->TestConroller = $testController;
    }


    // Este metodo se encarga de mostrar la vista principal pasando los datos para usar el componente de VUE
    // que se encarga de armar el formulario con sus respectivas preguntas y respuestas
    public function formularios($id){

       if($id == 11){
            // obten todos los registros que sean 1 2 y 3
           $data = DB::table('tb_questions')->whereIn('form_id',[1,2,3])->where('estado',1)->get();
           $data = $data->random(10);
       } elseif ($id == 12){
           $data = DB::table('tb_questions')->whereIn('form_id',[4,5,6])->where('estado', 1)->get();
           $data = $data->random(10);
       } elseif ($id == 13) {
            $data = DB::table('tb_questions')->whereIn('form_id', [1])->where('estado', 1)->get();
            $data = $data->random(10);
        }elseif ($id == 1){
           $data = DB::table('tb_questions')->whereIn('form_id',[1])->where('estado', 1)->get();
           $data = $data->random(10);
       }elseif ($id == 2){
           $data = DB::table('tb_questions')->whereIn('form_id',[2])->where('estado', 1)->get();
           $data = $data->random(10);
       }elseif ($id == 3){
           $data = DB::table('tb_questions')->whereIn('form_id',[3])->where('estado', 1)->get();
           $data = $data->random(10);
       } elseif ($id == 14) {
            $data = DB::table('tb_questions')->whereIn('form_id', [4])->where('estado', 1)->get();
            $data = $data->random(10);
        }elseif ($id == 4){
           $data = DB::table('tb_questions')->whereIn('form_id',[4])->where('estado', 1)->get();
           $data = $data->random(10);
       }elseif ($id == 5){
           $data = DB::table('tb_questions')->whereIn('form_id',[5])->where('estado', 1)->get();
           $data = $data->random(10);
       }elseif ($id == 6){
           $data = DB::table('tb_questions')->whereIn('form_id',[6])->where('estado', 1)->get();
           $data = $data->random(10);
       }else{
           $data = DB::table('tb_questions')->where('form_id',$id)->get();
       }
       return $data;
    }

    public function estadisticas(){


        return view('formularios');
    }

    public function  formularioInicial(Request $request){
        $id = \Auth::id();
        $array = $request->all();
        $puntaje= 0;

        if($request->input('formulario') == 13) {
          $campo = 'test_inicial_logico';
        }else{
            $campo = 'test_inicial_aptitud';
        }
        // recorre el arreglo y guarda ttodos los valores
        foreach ($array as $clave => $valor) {
            if ($clave != '_token' and $clave != 'formulario') {
               $correcta = DB::table('tb_questions')->select('correcta')->where('id',$clave)->get();
               $correcta = $correcta->first();
               if($correcta->correcta== $valor){
                   $puntaje +=1;
               }
            }
        }

        // buscar si existe un registro previo

        $existe = DB::table('tb_resultados_Test')->select('id')->where('usuario_id',$id)->get();

        if($existe->isEmpty()){
            // crear registro
            DB::table('tb_resultados_Test')->insert([
                ['usuario_id' => $id , 'test_basico_logico' => 0 , 'test_intermedio_logico' => 0, 'test_final_logico' => 0 ,
                    'test_basico_aptitud' => 0 , 'test_intermedio_aptitud' => 0 , 'test_final_aptitud' => 0 ,
                    'test_aleatorio_logico' => 0 , 'test_aletorio_aptitud' => 0, 'test_inicial_aptitud' => 1,
                    'test_inicial_logico' => 1   ]
            ]);

            $this->TestConroller->guardarResultado('crear',$id,null,null);
        }
        $this->TestConroller->guardarResultado('update',$id,$campo,$puntaje);

    }

    public function calcularPuntaje(Request $request){
        $array = [];
        $puntaje = 0;
        foreach ($array as $clave => $valor) {
            if ($clave != '_token' and $clave != 'formulario') {
                $correcta = DB::table('tb_questions')->select('correcta')->where('id',$clave)->get();
                $correcta = $correcta->first();
                if($correcta->correcta== $valor){
                    $puntaje +=1;
                }
            }
        }

        return $puntaje;
    }
    /*
     * mover  a controlador de test
     *
     */
    public function store(Request $request){
        $formulario =$request->input('formulario');
        $user_id = auth()->id();

        
        //MFORMULARIOS ALEATORIOS
        if($formulario == 11 || $formulario == 12){
            // guardar intento y calificación
            $tipo = $formulario == 11 ? 'logico' : 'espacial';
            //metodo que me devuelva el puntaje
            $puntaje = $this->calcularPuntaje($request);
            $this->TestConroller->guardarIntentosTest($formulario,$tipo,8);
            return redirect()->route('inteligencias');
        }

        if($formulario == 13 || $formulario == 14 ){
            $this->formularioInicial($request);
            return redirect()->route('inteligencias');
        }

        $array = $request->all();
        //dd($array);
        // recorre el arreglo y guarda ttodos los valores
        foreach ($array as $clave => $valor) {
            if ($clave != '_token' and $clave != 'formulario') {
                // guardar datos en tabla de estadisticas
                DB::table('tb_statistics')->insert([
                    ['form_id' => $formulario, 'question_id' => $clave, 'option' => $valor, 'user_id' => $user_id],
                ]);

            // guardar datoss en la tabla para mostrar los resultados
                DB::table('tb_temp_resultados')->insert([
                ['form_id' => $formulario, 'question_id' => $clave, 'option' => $valor, 'user_id' => $user_id],
                ]);
            }
        }

        if($formulario == 7 || $formulario == 8){
            return redirect()->route('inteligencias');
        }else{
            return redirect()->route(
                'resultados.test', ['id' => $formulario]);
        }

/*
        // validar que ya no este lleno
       $resultado = DB::table('tb_statistics')->where([
            ['form_id',$formulario],
            ['user_id',$user_id]
        ])->get();

       if($resultado->isEmpty()){
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
       }else{
           // actualizar los datos
           foreach ($array as $clave => $valor){
               if($clave != '_token' and $clave != 'formulario') {
                   // actualizar datos en tabla
                   DB::table('tb_statistics')->where([
                       ['form_id', $formulario],
                       ['question_id', $clave],
                       ['user_id', $user_id]
                   ])->update(
                       ['option' => $valor]
                   );
               }
           }
           return redirect()->route(
               'resultados.test', ['id' => $formulario]);
       }*/

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
        $datos_valida = DB::table('tb_questions')->where([['form_id',$formulario],['id',$pregunta]])->get();

        if($datos_valida->isEmpty()){
            return null;
        }

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

        if($datos[0]->r5 != null){
        $cantidad = DB::table('tb_statistics')->where([['option',$datos[0]->r5] ,['form_id',$formulario],['question_id',$pregunta]])->count();
        $cantidad = ($cantidad * 100) / $total;
        array_push($preguntas,$datos[0]->r5);
        array_push($cantidadOpcion,$cantidad);
        }

        $resultados = array($preguntas,$cantidadOpcion,$titulo);

        return $resultados;
    }


    /*
     * mover
     */
    public  function respuestaCorrecta($formulario){
        
        $data = DB::table('tb_questions')
            ->join('tb_temp_resultados','tb_questions.id','=','tb_temp_resultados.question_id' )
            ->select('tb_questions.*','tb_temp_resultados.option')
            ->where([
                ['tb_questions.form_id',$formulario],
                ['tb_temp_resultados.user_id',auth()->id()],
            ])->get();

        return $data;

    }

    public function obtnerResultados(){
        $datos = [];
        try {
            $datos =  db::table('tb_resultados_Test')
                ->join('users','users.id','=','tb_resultados_Test.usuario_id')
                ->select('users.name','tb_resultados_Test.*')->get();
        }catch (\Exception $e) {
            $error = $e->getMessage();
        }
        return $datos;
    }

    public function mostrarResultados(){
        $resultados = $this->obtnerResultados();
        return view('panel-administrativo',compact('resultados')) ;
    }
}
