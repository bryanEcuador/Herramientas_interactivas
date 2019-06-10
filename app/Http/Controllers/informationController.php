<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersInformation;
use App\User;
use App\AcademicRecognitions;
use App\AchievementsObtained;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

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
        $information->save();

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {

        dd($request->all());
        //$information =  App\UsersInformation::where('')
        $academic = new AcademicRecognitions();
        $archievements  = new AchievementsObtained();

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

        //
        $information->name = $request->input("nombre");
        $information->age = $request->input("edad");
        $information->skill_analysis = $request->input("analisis");
        $information->skill_logic = $request->input("logica");
        $information->skill_writing = $request->input("redaccion");
        $information->skill_description = $request->input("descripcion");
        $information->language_english = $request->input("ingles");
        $information->language_french = $request->input("frances");
        $information->language_italian = $request->input("italiano");
        $information->physical_disability = $request->input("discapacidad_fisica");
        $information->mental_disability = $request->input("discapacidad_mental");
        $information->achievements_id = $archievements->id;
        $information->recognitions_id = $academic->id;
        $information->user_id = $id;
        $information->save();
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


}
