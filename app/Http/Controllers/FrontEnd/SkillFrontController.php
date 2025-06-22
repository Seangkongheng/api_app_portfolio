<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Project\Category;
use App\Models\Project\Detail;
use App\Models\Skill\Skill;
use Illuminate\Http\Request;

class SkillFrontController extends Controller
{
    // public function show($skill_ID){
    //     $projects=Detail::where('skill_id',$skill_ID)->get();
    //     $skill = Skill::find($skill_ID);
    //     $skill_Name = $skill ? $skill->title : 'Unknown Category';
    //     return view('skill.detail',compact('projects','skill_Name'));
    // }

    public function show($skill_id)
    {
        $skill_name = Skill::select('title')->where('id', $skill_id)->first();
        $categories = Category::where('skill_id', $skill_id)->get()->map(function ($name) {
            $name->image_url = $name->image ? asset('CategoryImage/' . $name->image) : null;
            return $name;
        });

        return response()->json([
            'category' => $categories,
            'skill_name' => $skill_name
        ]);
    }

}
