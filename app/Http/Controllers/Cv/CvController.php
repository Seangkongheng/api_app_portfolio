<?php

namespace App\Http\Controllers\Cv;

use App\Http\Controllers\Controller;
use App\Models\Cv\Cv;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class CvController extends Controller
{
    public function index(){
        $cvs=Cv::orderBy('id','desc')->paginate(10);
        return view('admin.cv.index',compact('cvs'));
    }
    public function create(){
        return view('admin.cv.createOrEdit');
    }
    public function store(Request $request){
        try{
            $request->validate([
                'year'=>'required',
                'file'=>'required'
            ]);
            $objCV = new Cv();
            $objCV->year=$request->year;
            if($request->hasFile('file')){
                $image=$request->file('file');
                $fileName=Carbon::now()->format('d-m-y'). '_'.time().'.'. $image->getClientOriginalExtension();
                $path=public_path('CvFile/'.$fileName);
                $image->move(public_path('CvFile/'),$fileName);
                $objCV->file=$fileName;
            }
            $objCV->save();
            return redirect()->route('cv.index')->with('success','Curriculum Vitae created');
        }catch(Exception $exception){
            return redirect()->route('cv.create')->with('error',$exception->getMessage());
        }
    }

    public function edit($cv_id){
        $cvEdit=Cv::find($cv_id);
        return view('admin.cv.createOrEdit',compact('cvEdit'));
    }

    public function update(Request $request ,$cv_id){
        try{
            $request->validate([
                'year'=>'required',
            ]);
            $objCv = Cv::find($cv_id);
            $objCv->year=$request->year;
            
            if($objCv->file&& file_exists(public_path(('CvFile/'.$objCv->file)))){
                unlink(public_path('CvFile/'.$objCv->file));
            }
                $image=$request->file('file');
                $fileName=Carbon::now()->format('d-m-y'). '_'.time().'.'. $image->getClientOriginalExtension();
                $path=public_path('CvFile/'.$fileName);
                $image->move(public_path('CvFile/'),$fileName);
                $objCv->file=$fileName;
            $objCv->save();

            return redirect()->route('cv.index')->with('success','Curriculunm Vitae updated');
        }catch(Exception $exception){
            return redirect()->route('cv.create')->with('error',$exception->getMessage());
        }
    }

    public function destroy(Request $request){
        try{
            $objCv = Cv::find($request->cv_id);
            
            if($objCv->file&& file_exists(public_path(('CvFile/'.$objCv->file)))){
                unlink(public_path('CvFile/'.$objCv->file));
            }
            $objCv->delete();
            return redirect()->route('cv.index')->with('success','Curriculum Vitae  Deleted');
        }catch(Exception $exception){
            return redirect()->route('cv.index')->with('error',$exception->getMessage());
        }
    }
    
}
