<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class TestController extends Controller
{


    public function hacerTest($id){

        $id == 7 || $id == 8 || $id == 11 || $id == 12 ? $respuesta = $id : $respuesta = $this->validarTest($id);

        if($respuesta == $id) {
            if($id == 11 || $id == 12) {
                $nombre = 'Test final';
                return view('formularios', compact('id', 'nombre'));
            }

         $test = DB::table('tb_form')->select('type', 'level')->where('id', $id)->get()->toArray();
         if ($test[0]->type != 'sastifaccion') {
             if ($test[0]->level == 1) {
                 $nombre = 'Test de ' . $test[0]->type . ' basico';
             } else if ($test[0]->level == 2) {
                 $nombre = 'Test de ' . $test[0]->type . ' medio';
             } else if ($test[0]->level == 3) {
                 $nombre = 'Test de ' . $test[0]->type . ' avanzado';
             }
         }
         return view('formularios', compact('id', 'nombre'));
     }
        return redirect()->route('inteligencias');
    }

    public  function validarTest($id){
        $puntajeTest = db::table('tb_puntaje_test')->where('usuario_id',\auth()->id())->get();
        $puntajeTest = $puntajeTest->first();
        $testHabilidado = 0;
        if($id >= 1 && $id <= 3 ){
            $testRealizados = DB::table('tb_statistics')->select('form_id')->distinct()
                ->where('user_id',auth()->id())->whereIn('form_id',[1,2,3])->get();



            $filtered = array();
            $array = array();

            if($testRealizados->isEmpty() || $puntajeTest->test_basico_logico <= 7 ){
                $testHabilidado = 1;
            }else{
                $filtered = $testRealizados->filter(function ($value, $key) {
                    return $value;
                });

                foreach ($filtered as $elementos){
                    array_push($array,$elementos->form_id) ;
                }

                if(in_array(3,$array)){
                    if($puntajeTest->test_final_logico <= 7){
                        $testHabilidado = 3;
                    }else{
                        $testHabilidado = 4;
                    }

                }elseif(in_array(2,$array)){
                    if($puntajeTest->test_intermedio_logico <= 7){
                        $testHabilidado = 2;
                    }else{
                        $testHabilidado = 3;
                    }
                }else{
                    if($puntajeTest->test_basico_logico <= 7){
                        $testHabilidado = 1;
                    }else{
                        $testHabilidado = 2;
                    }
                }
            }
        }else if($id >= 4 && $id <= 6 ){
            $testRealizados = DB::table('tb_statistics')->select('form_id')->distinct()
                ->where('user_id',auth()->id())->whereIn('form_id',[4,5,6])->get();

            $filtered = array();
            $array = array();
            $testHabilidado = 0;

            if($testRealizados->isEmpty()){
                $testHabilidado = 4;
            }else{
                $filtered = $testRealizados->filter(function ($value, $key) {
                    return $value;
                });

                foreach ($filtered as $elementos){
                    array_push($array,$elementos->form_id) ;
                }

                if(in_array(6,$array)){

                    if($puntajeTest->test_final_aptitud <= 7){
                        $testHabilidado = 6;
                    }else{
                        $testHabilidado = 7;
                    }
                }elseif(in_array(5,$array)){

                    if($puntajeTest->test_intermedio_aptitud <= 7){
                        $testHabilidado = 5;
                    }else{
                        $testHabilidado = 6;
                    }
                }else{
                    if($puntajeTest->test_basico_aptitud <= 7){
                        $testHabilidado = 4;
                    }else{
                        $testHabilidado = 5;
                    }
                }
            }
        }

        return $testHabilidado;

    }

    public function  guardarIntentosTest($test,$tipo,$puntaje){
         $id = Auth::id();
        // buscar si existe un registro previo

        $existe = DB::table('tb_resultados_Test')->select('id')->where('usuario_id',$id)->get();

        if($existe->isEmpty()){
            // crear registro
           DB::table('tb_resultados_Test')->insert([
                ['usuario_id' => $id , 'test_basico_logico' => 0 , 'test_intermedio_logico' => 0, 'test_final_logico' => 0 ,
                    'test_basico_aptitud' => 0 , 'test_intermedio_aptitud' => 0 , 'test_final_aptitud' => 0 ,
                    'test_aleatorio_logico' => 0 , 'test_aletorio_aptitud' => 0]
            ]);

           $this->guardarResultado('crear',$id,null,null);
        }

        // determinar el campo
        if($tipo == 'logico'){
            if($test == 1){
                $campo = 'test_basico_logico';
            }elseif ($test == 2){
                $campo = 'test_intermedio_logico';
            }elseif ($test == 3){
                $campo = 'test_final_logico';
            }elseif ($test ==11){
                $campo = 'test_aleatorio_logico';
            }
        }elseif ($tipo == 'espacial'){
            if($test == 4){
                $campo = 'test_basico_aptitud';
            }elseif ($test == 5){
                $campo = 'test_intermedio_aptitud';
            }elseif ($test == 6){
                $campo = 'test_final_aptitud';
            }elseif ($test == 12){
                $campo = 'test_aletorio_aptitud';
            }
        }
        // obtener valor del campo
        $resultado = DB::table('tb_resultados_Test')->select($campo)->where('usuario_id',$id)->get();

        $resultado = $resultado->first();
        $valor = $resultado->$campo;
        // actualizar la tabla
        $valor = $valor +1;
        DB::table('tb_resultados_Test')->where('usuario_id',$id)->update([$campo => $valor]);

        $this->guardarResultado('actualizar',$id,$campo,$puntaje);

        return true;

    }

    public function guardarResultado($accion,$id,$campo,$puntaje){
        if($accion == 'crear') {
            // debo crear un resultado
            DB::table('tb_puntaje_test')->insert([
                ['usuario_id' => $id]
            ]);
        }else{
            // actualizar el resultado
            DB::table('tb_puntaje_test')->where('usuario_id',$id)->update([$campo => $puntaje]);
        }
    }

    public function test_logicos(){
        $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
        $testRealizados = DB::table('tb_statistics')->select('form_id')->distinct()
            ->where('user_id',auth()->id())->whereIn('form_id',[1,2,3])->get();
        $filtered = array();
        $array = array();
        $testHabilidado = 0;
        if($testRealizados->isEmpty()){
            $testHabilidado = 1;
        }else{
            $filtered = $testRealizados->filter(function ($value, $key) {
                return $value;
            });

            foreach ($filtered as $elementos){
                array_push($array,$elementos->form_id) ;
            }

            if(in_array(3,$array)){
                $testHabilidado = 4;
            }elseif(in_array(2,$array)){
                $puntaje = db::table('tb_puntaje_test')->select('test_intermedio_logico')->get();
                $puntaje = $puntaje->first();

                if($puntaje->test_intermedio_logico > 7){
                    $testHabilidado = 3;
                }else{
                    $testHabilidado = 2;
                }
            }else{
                $puntaje = db::table('tb_puntaje_test')->select('test_basico_logico')->get();
                $puntaje = $puntaje->first();

                if($puntaje->test_basico_logico > 7){
                    $testHabilidado = 2;
                }else{
                    $testHabilidado = 1;
                }
            }
        }
        return view("logica",compact('estadisticas','testHabilidado'));
    }

    public function test_espacial(){
        $estadisticas = DB::table('table_counter')->where('id','=',1)->get();
        $testRealizados = DB::table('tb_statistics')->select('form_id')->distinct()
            ->where('user_id',auth()->id())->whereIn('form_id',[4,5,6])->get();

        $filtered = array();
        $array = array();
        $testHabilidado = 0;

        if($testRealizados->isEmpty()){
            $testHabilidado = 4;
        }else{
            $filtered = $testRealizados->filter(function ($value, $key) {
                return $value;
            });

            foreach ($filtered as $elementos){
                array_push($array,$elementos->form_id) ;
            }

            if(in_array(6,$array)){
                $puntaje = db::table('tb_puntaje_test')->select('test_final_aptitud')->get();
                $puntaje = $puntaje->first();

                if($puntaje->test_final_aptitud > 7){
                    $testHabilidado = 7;
                }else{
                    $testHabilidado = 6;
                }
            }elseif(in_array(5,$array)){
                $puntaje = db::table('tb_puntaje_test')->select('test_intermedio_aptitud')->get();
                $puntaje = $puntaje->first();

                if($puntaje->test_intermedio_aptitud > 7){
                    $testHabilidado = 6;
                }else{
                    $testHabilidado = 5;
                }
            }else{
                $puntaje = db::table('tb_puntaje_test')->select('test_basico_aptitud')->get();
                $puntaje = $puntaje->first();

                if($puntaje->test_basico_aptitud > 7){
                    $testHabilidado = 5;
                }else{
                    $testHabilidado = 4;
                }
            }
        }
        return view("espacial",compact('estadisticas','testHabilidado'));
    }

    public function mostrarResultados(){
        try {
            return  db::table('tb_resultados_Test')
                ->join('users','users.id','=','tb_resultados_Test.usuario_id')
                ->select('users.name','tb_resultados_Test.*')->get();
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
