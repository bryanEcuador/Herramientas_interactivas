<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TestController extends Controller
{


    public function hacerTest($id){
        $id == 7 || $id == 8 ? $respuesta = $id : $respuesta = $this->validarTest($id);

     if($respuesta == $id) {
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
        if($id >= 1 && $id <= 3 ){
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
                    $testHabilidado = 3;
                }else{
                    $testHabilidado = 2;
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
                    $testHabilidado = 7;
                }elseif(in_array(5,$array)){
                    $testHabilidado = 6;
                }else{
                    $testHabilidado = 5;
                }
            }
        }

        return $testHabilidado;

    }

    public function  resultadosTest(){

    }
}
