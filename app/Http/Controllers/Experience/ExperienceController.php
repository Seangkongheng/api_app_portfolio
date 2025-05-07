<?php

namespace App\Http\Controllers\Experience;

use App\Http\Controllers\Controller;
use App\Models\Experience\Experience;
use Exception;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index(){
        $experiences=Experience::orderBy('id','desc')->paginate(10);
        return view('admin.experience.index',compact('experiences'));
    }
    public function create(){
        return view('admin.experience.createOrEdit');
    }
    public function store(Request $request){
        try{
            $request->validate([
                'about'=>'required',
            ]);
            $objExperience = new Experience();
            $objExperience->position=$request->position;
            $objExperience->company_name=$request->company_name;
            $objExperience->start_year=$request->start_year;
            $objExperience->end_year=$request->end_year;
            $objExperience->about=$request->about;
            
            $objExperience->save();
            return redirect()->route('experience.index')->with('success','Experience created');
        }catch(Exception $exception){
            return redirect()->route('experience.create')->with('error',$exception->getMessage());
        }
    }

    public function edit($ex_ID){
        $ExperienceEdit=Experience::find($ex_ID);
        return view('admin.experience.createOrEdit',compact('ExperienceEdit'));
    }

    public function update(Request $request ,$ex_ID){
        try{
            $request->validate([
                'about'=>'required',
            ]);
            $objExperience = Experience::find($ex_ID);
            $objExperience->position=$request->position;
            $objExperience->company_name=$request->company_name;
            $objExperience->start_year=$request->start_year;
            $objExperience->end_year=$request->end_year;
            $objExperience->about=$request->about;
            $objExperience->save();
            return redirect()->route('experience.index')->with('success','Experience updated');
        }catch(Exception $exception){
            return redirect()->route('experience.create')->with('error',$exception->getMessage());
        }
    }

    public function destroy(Request $request){
        try{
            $objExperience = Experience::find($request->ex_ID);
            $objExperience->delete();
            return redirect()->route('experience.index')->with('success','Experience Deleted');
        }catch(Exception $exception){
            return redirect()->route('experience.index')->with('error',$exception->getMessage());
        }
    }
}
