<?php

namespace App\Http\Controllers;

use App\Model\Preguntas;
use Illuminate\Http\Request;
use App\Http\Controllers\StorageController;



class AdministracionController extends Controller
{
    protected $storeController;
    protected $preguntas;

    public function __construct(StorageController $storageController, Preguntas $preguntas)
    {
           $this->storeController = $storageController;
           $this->preguntas = $preguntas;
    }

    public function gestion(){

        $preguntas = Preguntas::all();
        return view('administracion/gestor',compact('preguntas'));
    }

    // insertar las nuevas preguntas al formulario
    public function guardarPreguntas(Request $request){
        try{
            $pregunta = $request->input('pregunta');
            $respuesta = $request->input('correcta');
            $opciones = $request->input('opciones');
            $form = $this->tipoTest($request->input('tipo'). $request->input('nivel'));

            $array  = explode(',',$opciones);
            $cantidad = count($array);
            $preguntas = new Preguntas();
            $preguntas->form_id = $form;
            $preguntas->question = $pregunta;
            $preguntas->correcta = $respuesta;
            $preguntas->r1 = $array[0];
            $preguntas->r2 = $array[1];
            // evalua
            if ($cantidad >= 3){
                $preguntas->r3 = $array[2];
            }
            if ($cantidad >= 4){
                $preguntas->r4 = $array[3];
            }
            if ($cantidad >= 5){
                $preguntas->r5 = $array[4];
            }

            if($request->file()){
                $file = $this->storeController->guardarImagen($request);
                $preguntas->img =  $file;
            }

            $preguntas->save();
            return 1;
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }


    //Determina el número de test de la base de datos
    public function tipoTest($tipo){

        if($tipo == '11' ){
            $tipo = 4;
        }elseif ($tipo == '12') {
            $tipo = 5;
        } elseif ($tipo == '13') {
            $tipo = 6;
        } elseif ($tipo == '21') {
            $tipo = 1;
        } elseif ($tipo == '22') {
            $tipo = 2;
        } elseif ($tipo == '23') {
            $tipo = 3;
        }

        return $tipo;
    }

    public function updateEstadoPregunta($id){
        try{
            $preguntas = Preguntas::where('id',$id);
            $preguntas->estado = 0;
            return 0;
        }catch (\Exception $e){
            return  $e->getMessage();
        }

    }

    public function updatePregunta($id,Request $request){
        if($request->file()){
            $file = $this->storeController->guardarImagen($request);
            Preguntas::where('id',$id)
                ->update(
                    [
                        'question' => $request->input('pregunta'),
                        'r1' => $request->input('r1'),
                        'r2' => $request->input('r2'),
                        'r3' => $request->input('r3'),
                        'r4' => $request->input('r4'),
                        'r5' => $request->input('r5'),
                        'correcta' => $request->input('opcion_correcta'),
                        'estado' => $request->input('estado'),
                    'img' => $file,
                    ]);
        }else{

             
            Preguntas::where('id',$id)
                ->update(
                    [
                        'question' => $request->input('pregunta'),
                        'r1' => $request->input('r1'),
                        'r2' => $request->input('r2'),
                        'r3' => $request->input('r3'),
                        'r4' => $request->input('r4'),
                        'r5' => $request->input('r5'),
                        'correcta' => $request->input('opcion_correcta'),
                      
                         'estado' => $request->input('estado'),
                    ]);

        }

        return 1;
      
    }

    public function editPregunta($id){
        $preguntas = Preguntas::where('id',$id)->get();
        // agregar elementos al array
        $opciones = array();
        if($preguntas[0]->r1 !== null){
            array_push($opciones,$preguntas[0]->r1);
        }
        if($preguntas[0]->r2 !== null){
            array_push($opciones,$preguntas[0]->r2);
        }
        if($preguntas[0]->r3 !== null){
            array_push($opciones,$preguntas[0]->r3);
        }
        if($preguntas[0]->r4 !== null){
            array_push($opciones,$preguntas[0]->r4);
        }
        if($preguntas[0]->r5 !== null){
            array_push($opciones,$preguntas[0]->r5);
        }
        return view('administracion.edicion-pregunta',compact('preguntas','opciones'));
    }

    public function preguntas(){
       dd (Preguntas::all()->toJson());
    }
}
