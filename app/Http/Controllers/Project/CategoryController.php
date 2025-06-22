<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project\Category;
use App\Models\Skill\Skill;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::orderBy('id','desc')->paginate(10);
        return view('admin.category.index',compact('categories'));
    }
    public function create(){
        $skills = Skill::select('id','title')->get();
        return view('admin.category.createOrEdit',compact('skills'));
    }
    public function store(Request $request){
        try{
            $request->validate([
                'name'=>'required',
                'image'=>'required'
            ]);
            $objCategory = new Category();
            $objCategory->name=$request->name;
            $objCategory->skill_id=$request->skill_id;
            if($request->hasFile('image')){
                $image=$request->file('image');
                $fileName=Carbon::now()->format('d-m-y'). '_'.time().'.'. $image->getClientOriginalExtension();
                $path=public_path('CategoryImage/'.$fileName);
                $image->move(public_path('CategoryImage/'),$fileName);
                $objCategory->image=$fileName;
            }
            $objCategory->save();
            return redirect()->route('category.index')->with('success','Category created');
        }catch(Exception $exception){
            return redirect()->route('category.create')->with('error',$exception->getMessage());
        }
    }

    public function edit($about_ID){
        $categoryEdit=Category::find($about_ID);
        $skills = Skill::select('id','title')->get();
        return view('admin.category.createOrEdit',compact('categoryEdit','skills'));
    }

    public function update(Request $request ,$category_ID){
        try{
            $request->validate([
                'name'=>'required',
            ]);
            $objCategory = Category::find($category_ID);
            $objCategory->name = $request->name;
            $objCategory->skill_id = $request->skill_id;

            if ($request->hasFile('image')) {
                if ($objCategory->image && file_exists(public_path("CategoryImage/{$objCategory->image}"))) {
                    unlink(public_path("CategoryImage/{$objCategory->image}"));
                }
                $image = $request->file('image');
                $fileName = Carbon::now()->format('d-m-y') . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path("CategoryImage/"), $fileName);
                $objCategory->image = $fileName;
            }

            $objCategory->save();
            return redirect()->route('category.index')->with('success','Category updated');
        }catch(Exception $exception){
            return redirect()->route('category.create')->with('error',$exception->getMessage());
        }
    }

    public function destroy(Request $request){
        try{
            $objCategory = Category::find($request->category_ID);

            if($objCategory->image&& file_exists(public_path(('CategoryImage/'.$objCategory->image)))){
                unlink(public_path('CategoryImage/'.$objCategory->image));
            }
            $objCategory->delete();
            return redirect()->route('category.index')->with('success','Catagory Deleted');
        }catch(Exception $exception){
            return redirect()->route('category.index')->with('error',$exception->getMessage());
        }
    }
}
