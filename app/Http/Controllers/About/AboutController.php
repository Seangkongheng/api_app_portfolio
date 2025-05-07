<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\About\About;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $abouts=About::orderBy('id','desc')->paginate(10);
        return view('admin.about.index',compact('abouts'));
    }
    public function create(){
        return view('admin.about.createOrEdit');
    }
    public function store(Request $request){
        try{
            $request->validate([
                'description'=>'required',
            ]);
            $objAbout = new About();

            $objAbout->description=$request->description;
            if($request->hasFile('image')){
                $image=$request->file('image');
                $fileName=Carbon::now()->format('d-m-y'). '_'.time().'.'. $image->getClientOriginalExtension();
                $path=public_path('aboutImage/'.$fileName);
                $image->move(public_path('aboutImage/'),$fileName);
                $objAbout->image=$fileName;
            }
            $objAbout->save();
            return redirect()->route('about.index')->with('success','About created');
        }catch(Exception $exception){
            return redirect()->route('about.create')->with('error',$exception->getMessage());
        }
    }

    public function edit($about_ID){
        $aboutEdit=About::find($about_ID);
        return view('admin.about.createOrEdit',compact('aboutEdit'));
    }

    public function update(Request $request ,$about_ID){
        try{
            $request->validate([
                'description'=>'required',
            ]);
            $objAbout = About::find($about_ID);

            if($objAbout->image&& file_exists(public_path(('brandLogo/'.$objAbout->image)))){
                unlink(public_path('aboutImage/'.$objAbout->image));
            }
            $image=$request->file('image');
            $fileName=Carbon::now()->format('d-m-y'). '_'.time().'.'. $image->getClientOriginalExtension();
            $path=public_path('aboutImage/'.$fileName);
            $image->move(public_path('aboutImage/'),$fileName);
            $objAbout->image=$fileName;

            $objAbout->description=$request->description;
            $objAbout->save();
            return redirect()->route('about.index')->with('success','About updated');
        }catch(Exception $exception){
            return redirect()->route('about.create')->with('error',$exception->getMessage());
        }
    }

    public function destroy(Request $request){
        try{
            $objAbout = About::find($request->about_ID);
            if($objAbout->image&& file_exists(public_path(('aboutImage/'.$objAbout->image)))){
                unlink(public_path('aboutImage/'.$objAbout->image));
            }
            $objAbout->delete();
            return redirect()->route('about.index')->with('success','about Deleted');
        }catch(Exception $exception){
            return redirect()->route('about.index')->with('error',$exception->getMessage());
        }
    }
}
