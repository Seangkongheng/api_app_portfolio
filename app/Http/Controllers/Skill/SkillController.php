<?php

namespace App\Http\Controllers\Skill;

use App\Http\Controllers\Controller;
use App\Models\Skill\Skill;
use Exception;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(){
        $skills=Skill::orderBy('id','desc')->paginate(10);
        return view('admin.skill.index',compact('skills'));
    }
    public function create(){
        return view('admin.skill.createOrEdit');
    }
    public function store(Request $request){
     
        try{
            $request->validate([
                'title'=>'required',
                'description'=>'required',
              
            ]);
            $objSkill = new Skill();

            $objSkill->title=$request->title;
            $objSkill->description=$request->description;
            $objSkill->save();
            return redirect()->route('skill.index')->with('success','Skill created');
        }catch(Exception $exception){
            return redirect()->route('skill.create')->with('error',$exception->getMessage());
        }
    }

    public function edit($lan_ID){
        $skillEdit=Skill::find($lan_ID);
        return view('admin.skill.createOrEdit',compact('skillEdit'));
    }

    public function update(Request $request ,$skill_ID){
        try{
            $request->validate([
                'title'=>'required',
            ]);
            $objSkill = Skill::find($skill_ID);
            $objSkill->title=$request->title;
            $objSkill->description=$request->description;
            $objSkill->save();
            return redirect()->route('skill.index')->with('success','skill updated');
        }catch(Exception $exception){
            return redirect()->route('skill.create')->with('error',$exception->getMessage());
        }
    }

    public function destroy(Request $request){
        try{
            $objSkill = Skill::find($request->skill_ID);
            $objSkill->delete();
            return redirect()->route('skill.index')->with('success','Skill Deleted');
        }catch(Exception $exception){
            return redirect()->route('skill.index')->with('error',$exception->getMessage());
        }
    }
}
