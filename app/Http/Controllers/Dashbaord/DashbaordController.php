<?php

namespace App\Http\Controllers\Dashbaord;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\Project\Project;
use App\Models\Skill\Skill;
use Illuminate\Http\Request;

class DashbaordController extends Controller
{
    public function index(){
        $recentProjects= Project::limit(3)->get();
        $projectCount = $recentProjects->count();
        $blogCount = Blog::count();
        $skillCount = Skill::count();
        return view('admin.dashbord.index',compact('recentProjects','projectCount','blogCount','skillCount'));
    }
}
