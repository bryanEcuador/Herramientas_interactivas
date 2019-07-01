<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersInformation;
//use App\User;
use App\AcademicRecognitions;
use App\AchievementsObtained;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class informationController extends Controller
{


    public function store($id)
    {
        //dd($id);
        $information = new UsersInformation();
        $academic = new AcademicRecognitions();
        $archievements  = new AchievementsObtained();

        $academic->recongnitions1 = null;
        $academic->recongnitions2 = null;
        $academic->recongnitions3 = null;
        $academic->recongnitions4 = null;
        $academic->recongnitions5 = null;
        $academic->save();

        $archievements->achievements1 = null;
        $archievements->achievements2 = null;
        $archievements->achievements3 = null;
        $archievements->achievements4 = null;
        $archievements->achievements5 = null;
        $archievements->save();

        $information->name = null;
        $information->age = null;
        $information->skill_analysis = null;
        $information->skill_logic = null;
        $information->skill_writing = null;
        $information->skill_description = null;
        $information->language_english = null;
        $information->language_french = null;
        $information->language_italian = null;
        $information->physical_disability = null;
        $information->mental_disability = null;
        $information->achievements_id = $archievements->id;
        $information->recognitions_id = $academic->id;
        $information->user_id = $id;
        $information->status = '0';
        $information->save();

    }

    public function update(Request $request)
    {
        try {
            $id = auth()->user()->id;
            $user_information = UsersInformation::where('user_id', $id)->first();
            $archievements = AchievementsObtained::find($user_information->achievements_id);
            $academic = AcademicRecognitions::find($user_information->recognitions_id);

            $user_information->name = $request->input("nombre");
            $user_information->age = $request->input("edad");
            $user_information->skill_analysis = ($request->input("analisis") == 'on') ? 1 : 0;
            $user_information->skill_logic = ($request->input("logica") == 'on') ? 1 : 0;
            $user_information->skill_writing = ($request->input("redaccion") == 'on') ? 1 : 0;
            $user_information->skill_description = ($request->input("descripcion") == 'on') ? 1 : 0;
            $user_information->language_english = ($request->input("ingles") == 'on') ? 1 : 0;
            $user_information->language_french = ($request->input("frances") == 'on') ? 1 : 0;
            $user_information->language_italian = ($request->input("italiano") == 'on') ? 1 : 0;
            $user_information->physical_disability = $request->input("discapacidad_fisica");
            $user_information->mental_disability = $request->input("discapacidad_mental");
            $user_information->save();

            $academic->recongnitions1 = $request->input("reconocimiento1");
            $academic->recongnitions2 = $request->input("reconocimiento2");
            $academic->recongnitions3 = $request->input("reconocimiento3");
            $academic->recongnitions4 = $request->input("reconocimiento4");
            $academic->recongnitions5 = $request->input("reconocimiento5");
            $academic->save();

            $archievements->achievements1 = $request->input("logro1");
            $archievements->achievements2 = $request->input("logro2");
            $archievements->achievements3 = $request->input("logro3");
            $archievements->achievements4 = $request->input("logro4");
            $archievements->achievements5 = $request->input("logro5");
            $archievements->save();

            $porcentaje = $this->contador($user_information);

            $user_information->status = $porcentaje;
            $user_information->save();


            return redirect()->route('information',['mensaje' => true]);
            //return view('actualizacionDatos',compact('user_information','porcentaje','archievements','academic','mensaje'));
        } catch (Exception $e){
            $mensaje = 'Error  al actualizar los datos';
            return view('actualizacionDatos',compact('mensaje'));
        }


    }

    public function registro(Request $request){
        // buscar el user id
       $id = auth()->user()->id;
       $id_information = DB::table('users_information')->where('user_id',$id)->get();
        //  dd($id_information);
        if($id_information->isEmpty()){
          $this->store($id);
          return view("inteligencias");
        }
        return view("inteligencias");
    }

    public function index($mensaje = 0) {
        //dd($mensaje);
        $id = auth()->user()->id;
        $id_information = DB::table('users_information')->where('user_id',$id)->get();
        //  dd($id_information);

        if($id_information->isEmpty()){
            $this->store($id);
        }

        $user_information = UsersInformation::where('user_id',$id)->first();
        $archievements =  AchievementsObtained::find($user_information->achievements_id);
        $academic = AcademicRecognitions::find($user_information->recognitions_id);

        $porcentaje = $this->contador($user_information);
        return view('actualizacionDatos',compact('user_information','porcentaje','archievements','academic','mensaje'));
    }

    public function inteligencias() {
        $user = auth()->user();
        $name = $user->name;
        $id= $user->id;
        $id_information = DB::table('users_information')->where('user_id',$id)->get();
        if($id_information->isEmpty()){
            if($user->name == 'Admin'){
                $status = "100";
            }else{
                $status = 0;
            }
        }else{
            $status = $id_information[0]->status;

        }
        $estadisticas = DB::table('table_counter')->where('id','=',1)->get();

        return view('inteligencias',compact('status','name','estadisticas'));
    }


    public function contador($user_information) {

        $contador = 0;
        ($user_information->id != null)  ? $contador++ : null ;
        ($user_information->name != null)  ? $contador++ : null ;
        ($user_information->age != null)  ? $contador++ : null ;
        //
        ($user_information->achievements_id != null)  ? $contador++ : null ;
        ($user_information->recognitions_id != null)  ? $contador++ : null ;
        ($user_information->user_id != null)  ? $contador++ : null ;
        //

       /* if($user_information->skill_analysis != null or $user_information->skill_logic != null or $user_information->skill_writing != null or $user_information->skill_description != null ){
            $contador++;
        }

        if($user_information->language_english != null or $user_information->language_french != null or $user_information->language_italian != null){
            $contador++;
        }*/

        if($user_information->physical_disability != null or $user_information->mental_disability != null or $user_information->physical_disability == 0 or $user_information->mental_disability == 0){
            $contador++;
        }

        return round( ($contador * 100) / 7,2);
    }


}
