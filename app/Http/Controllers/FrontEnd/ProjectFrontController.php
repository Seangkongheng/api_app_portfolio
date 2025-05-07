<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Project\Category;
use App\Models\Project\Detail;
use App\Models\Project\Project;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class ProjectFrontController extends Controller
{
    public function show($category_ID){
        $projects=Detail::where('project_cat_id',$category_ID)->get();
        $category = Category::find($category_ID);
        $category_name = $category ? $category->name : 'Unknown Category';
        return view('projects.detail',compact('projects','category_name'));
    }
    public function index(){
        $categories = Category::all();
        return view('projects.index',compact('categories'));
    }
    public function view($project_id){
        
        $objProject=Detail::where('id',$project_id)->first();
        
        $objProjectName=Project::where('id',$objProject->project_id)->first();
        
        return view('projects.projectDetail',compact('objProject','objProjectName'));
    }
   
}
