<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project\Category;
use App\Models\Project\Detail;
use App\Models\Project\Project;
use App\Models\Skill\Skill;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\select;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->paginate(10);
        return view('admin.project.index', compact('projects'));
    }
    public function create()
    {
        $categories = Category::all();
        $skills = Skill::all();
        return view('admin.project.createOrEdit', compact('categories', 'skills'));
    }
    public function store(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required',
                'project_cat_id' => 'required',
                'thumbnail_image' => 'required',
                'description' => 'required',
                'url' => 'required|url'
            ]);
            $authName = Auth()->user()->name;
            $objProject = new Project();
            $objProject->name = $request->name;
            $objProject->save();

            $objProjectDetail = new Detail();

            $images = [];
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $file) {
                    $image = $request->file('image');
                    $fileName = Carbon::now()->format('d-m-y');
                    $newImage = $fileName . '_' . time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path('ProjectImage/'), $newImage);
                    $images[] = $newImage;
                }
            }
            $objProjectDetail->image = json_encode($images);

            if ($request->hasFile('thumbnail_image')) {
                $image = $request->file('thumbnail_image');
                $fileName = Carbon::now()->format('d-m-y');
                $newImage = $fileName . '_' . time() . '_' . $file->getClientOriginalName();
                $image->move(public_path('projectThumnail/'), $newImage);
                $objProjectDetail->thumbnail_image = $newImage;
            }
            $is_public = 1;
            if ($request->status === "Public") {
                $is_public = 1;
            } elseif ($request->status === "Unpublic") {
                $is_public = 0;
            }

            $objProjectDetail->project_id = $objProject->id;
            $objProjectDetail->project_cat_id = $request->project_cat_id;
            $objProjectDetail->skill_id = $request->skill_id;
            $objProjectDetail->description = $request->description;
            $objProjectDetail->url = $request->url;
            $objProjectDetail->author = $authName;
            $objProjectDetail->is_public = $is_public;
            $objProjectDetail->link_web = $request->link_web;

            $objProjectDetail->save();

            return redirect()->route('project.index')->with('success', 'Project created successfully');
        } catch (Exception $exception) {
            return redirect()->route('project.create')->with('error', $exception->getMessage());
        }
    }

    public function edit($project_id)
    {
        $projectEdit = Project::find($project_id);
        $categories = Category::select('id', 'name')->get();
        $skills = Skill::select('id', 'title')->get();
        return view('admin.project.createOrEdit', compact('projectEdit', 'categories', 'skills'));
    }

    public function show($id)
    {
        $project = Project::find($id);
        return view('admin.project.show', compact('project'));
    }

    public function update(Request $request, $id)
    {
        try {
            $is_public = 1;
            if ($request->status === "Public") {
                $is_public = 1;
            } elseif ($request->status === "Unpublic") {
                $is_public = 0;
            }

            $AuthorName = Auth()->user()->name;
            $project = Project::findOrFail($id);
            $project->name = $request->name;
            $project->save();

            $objProjectDetail = Detail::where('project_id', $id)->first();
            $fileNames = json_decode($objProjectDetail->image, true) ?? [];
            if ($request->hasFile('image')) {
                foreach ($fileNames as $oldImage) {
                    $oldImagePath = public_path('ProjectImage/' . $oldImage);
                    if (file_exists($oldImagePath)) {
                        @unlink($oldImagePath);
                    }
                }
                $fileNames = [];
                foreach ($request->file('image') as $file) {
                    $currentDate = Carbon::now()->format('d-m-Y');
                    $newFileName = $currentDate . '_' . time() . '-' . $file->getClientOriginalName();
                    $file->move(public_path('ProjectImage/'), $newFileName);
                    $fileNames[] = $newFileName;
                }
            }
            if ($request->hasFile('thumbnail_image')) {
                if ($objProjectDetail->thumbnail_image && file_exists(public_path('projectThumnail/' . $objProjectDetail->thumbnail_image))) {
                    unlink(public_path('projectThumnail/' . $objProjectDetail->thumbnail_image));
                }
                $logo = $request->file('thumbnail_image');
                $fileName = Carbon::now()->format('d-m-y') . '_' . time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('projectThumnail/'), $fileName);
                $objProjectDetail->thumbnail_image = $fileName;
            }

            $objProjectDetail->project_id = $project->id;
            $objProjectDetail->project_cat_id = $request->project_cat_id;
            $objProjectDetail->skill_id = $request->skill_id;
            $objProjectDetail->description = $request->description;
            $objProjectDetail->url = $request->url;
            $objProjectDetail->author = $AuthorName;
            $objProjectDetail->is_public = $is_public;
            $objProjectDetail->link_web = $request->link_web;
            $objProjectDetail->image = json_encode($fileNames);
            $objProjectDetail->save();

            return redirect()->route('project.index')->with('success', value: 'Project updated');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function destroy(Request $request)
    {
        try {
            $project = Project::find($request->project_id);
            $projectDetail = Detail::where('project_id', $request->project_id)->first();

            if ($projectDetail->image && file_exists(public_path(('ProjectImage/' . $projectDetail->image)))) {
                unlink(public_path('ProjectImage/' . $projectDetail->image));
            }
            if ($projectDetail->thumbnail_image && file_exists(public_path(('projectThumnail/' . $projectDetail->thumbnail_image)))) {
                unlink(public_path('projectThumnail/' . $projectDetail->thumbnail_image));
            }
            $project->delete();
            $projectDetail->delete();
            return redirect()->route('project.index')->with('success', 'User Deleted');
        } catch (Exception $exception) {
            return redirect()->route('project.index')->with('error', $exception->getMessage());
        }
    }
}
