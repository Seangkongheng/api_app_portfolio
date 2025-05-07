<?php

namespace App\Http\Controllers\Education;

use App\Http\Controllers\Controller;
use App\Models\Education\Education;
use Exception;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index(){
        $educations=Education::orderBy('id','desc')->paginate(10);
        return view('admin.education.index',compact('educations'));
    }
    public function create(){
        return view('admin.education.createOrEdit');
    }
    public function store(Request $request){
     
        try{
            $request->validate([
                'school'=>'required',
                'description'=>'required',
                'start_year'=>'required',
                'end_year'=>'required',
            ]);
            $objEducation = new Education();
            $objEducation->school=$request->school;
            $objEducation->description=$request->description;
            $objEducation->start_year=$request->start_year;
            $objEducation->end_year=$request->end_year;
            $objEducation->save();
            return redirect()->route('education.index')->with('success','Education created');
        }catch(Exception $exception){
            return redirect()->route('education.create')->with('error',$exception->getMessage());
        }
    }

    public function edit($ex_ID){
        $educationsEdit=Education::find($ex_ID);
        return view('admin.education.createOrEdit',compact('educationsEdit'));
    }

    public function update(Request $request ,$edu_ID){
        try{
            $request->validate([
                'description'=>'required',
            ]);
            $objEducation = Education::find($edu_ID);
            $objEducation->school=$request->school;
            $objEducation->description=$request->description;
            $objEducation->start_year=$request->start_year;
            $objEducation->end_year=$request->end_year;
            $objEducation->save();
            return redirect()->route('education.index')->with('success','Education updated');
        }catch(Exception $exception){
            return redirect()->route('education.create')->with('error',$exception->getMessage());
        }
    }

    public function destroy(Request $request){
        try{
            $objEducation = Education::find($request->edu_ID);
            $objEducation->delete();
            return redirect()->route('education.index')->with('success','Education Deleted');
        }catch(Exception $exception){
            return redirect()->route('education.index')->with('error',$exception->getMessage());
        }
    }
}
