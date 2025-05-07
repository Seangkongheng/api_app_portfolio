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
                'skill_id' => 'required',
                'image' => 'required',
                'thumbnail_image'=>'required',
                'description' => 'required',
                'url' => 'required|url'
            ]);

        
            $objProject = new Project();
            $objProject->name = $request->name;
            $objProject->save();

            $objProjectDetail = new Detail();

            $images = [];
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $file) {
                    $image = $request->file('image');
                    $fileName = Carbon::now()->format('d-m-y');
                    $newImage = $fileName . '_'.time().'_'. $file->getClientOriginalName();
                    $file->move(public_path('ProjectImage/'), $newImage);
                    $images[] = $newImage;
                }
            }
            $objProjectDetail->image = json_encode($images);
           
            if ($request->hasFile('thumbnail_image')) {
                $image = $request->file('thumbnail_image');
                $fileName = Carbon::now()->format('d-m-y');
                $newImage = $fileName . '_'.time().'_'. $file->getClientOriginalName();
                $image->move(public_path('projectThumnail/'), $newImage);
                $objProjectDetail->thumbnail_image = $newImage;
            }

            $objProjectDetail->project_id = $objProject->id;
            $objProjectDetail->project_cat_id = $request->project_cat_id;
            $objProjectDetail->skill_id = $request->skill_id;
            $objProjectDetail->description = $request->description;
            $objProjectDetail->url = $request->url;
            $objProjectDetail->save();

            return redirect()->route('project.index')->with('success', 'Project created successfully');
        } catch (Exception $exception) {
            // return redirect()->route('project.create')->with('error', $exception->getMessage());
            dd($exception->getMessage());
        }
    }

    public function edit($con_ID)
    {
        $projectEdit = Project::find($con_ID);
        return view('admin.project.createOrEdit', compact('projectEdit'));
    }

    // public function update(Request $request ,$con_ID){
    //     try{
    //         $request->validate([
    //             'label'=>'required',
    //             'icon'=>'required',
    //             'value'=>'required',
    //         ]);
    //         $objContact = Contact::find($con_ID);
    //         $objContact->label=$request->label;
    //         if($objContact->icon&& file_exists(public_path(('conactImage/'.$objContact->icon)))){
    //             unlink(public_path('conactImage/'.$objContact->icon));
    //         }

    //             $logo=$request->file('icon');
    //             $fileName=Carbon::now()->format('d-m-y'). '_'.time().'.'. $logo->getClientOriginalExtension();
    //             $path=public_path('conactImage/'.$fileName);
    //             $logo->move(public_path('conactImage/'),$fileName);
    //             $objContact->icon=$fileName;
    //         $objContact->value=$request->value;
    //         $objContact->save();
    //         return redirect()->route('contact.index')->with('success','Contact created');
    //     }catch(Exception $exception){
    //         return redirect()->route('contact.create')->with('error',$exception->getMessage());
    //     }
    // }

    // public function destroy(Request $request){
    //     try{
    //         $objContact=Contact::find($request->con_ID);

    //         if($objContact->icon&& file_exists(public_path(('conactImage/'.$objContact->icon)))){
    //             unlink(public_path('conactImage/'.$objContact->icon));
    //         }
    //         $objContact->delete();
    //         return redirect()->route('contact.index')->with('success','Contact Deleted');
    //     }catch(Exception $exception){
    //         return redirect()->route('contact.index')->with('error',$exception->getMessage());
    //     }
    // }
}
