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
    // public function show($category_ID){
    //     $projects=Detail::where('project_cat_id',$category_ID)->get();
    //     $category = Category::find($category_ID);
    //     $category_name = $category ? $category->name : 'Unknown Category';
    //     return view('projects.detail',compact('projects','category_name'));
    // }

    public function index($category_ID)
    {
        $projects = Detail::where('project_cat_id', $category_ID)->get()->map(function ($project) {
            $project->image_url = $project->thumbnail_image ? asset('projectThumnail/' . $project->thumbnail_image) : null;
            $projectModel = Project::find($project->project_id);
            $project->name = $projectModel ? $projectModel->name : null;
            return $project;
        });

        $categoryName = Category::select('name')->where('id', $category_ID)->first();
        return response()->json([
            'projects' => $projects,
            'categoryName' => $categoryName
        ]);
    }



    public function show($project_id)
    {
        $project = Detail::where('id', $project_id)->first();

        if ($project) {
            // Decode all images from JSON
            $images = json_decode($project->image, true);

            // Map all image filenames to full URLs
            $project->image_urls = !empty($images)
                ? array_map(function ($img) {
                    return asset('ProjectImage/' . $img);
                }, $images)
                : [];

            // Get project name from related model
            $projectModel = Project::find($project->project_id);
            $project->name = $projectModel ? $projectModel->name : null;
        }

        return response()->json([
            'project' => $project,
        ]);
    }



}
