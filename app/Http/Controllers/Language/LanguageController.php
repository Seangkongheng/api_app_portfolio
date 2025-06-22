<?php

namespace App\Http\Controllers\Language;

use App\Http\Controllers\Controller;
use App\Models\Language\Laguage;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index(){
        $languages=Laguage::orderBy('id','desc')->paginate(10);
        return view('admin.ProLanguage.index',compact('languages'));
    }
    public function create(){
        return view('admin.ProLanguage.createOrEdit');
    }
    public function store(Request $request){

        try{
            $request->validate([
                'name'=>'required',
                'percen'=>'required',

            ]);
            $objLanugage = new Laguage();

            if($request->hasFile('image')){
                $logo=$request->file('image');
                $fileName=Carbon::now()->format('d-m-y'). '_'.time().'.'. $logo->getClientOriginalExtension();
                $path=public_path('brandLogo/'.$fileName);
                $logo->move(public_path('brandLogo/'),$fileName);
                $objLanugage->image=$fileName;
            }



            $objLanugage->name=$request->name;
            $objLanugage->percen=$request->percen;
            $objLanugage->save();
            return redirect()->route('language.index')->with('success','Skill created');
        }catch(Exception $exception){
            return redirect()->route('language.create')->with('error',$exception->getMessage());
        }
    }

    public function edit($lan_ID){
        $languageEdit=Laguage::find($lan_ID);
        return view('admin.ProLanguage.createOrEdit',compact('languageEdit'));
    }

    public function update(Request $request ,$edu_ID){
        try{
            $request->validate([
                'name'=>'required',
            ]);
            $objLanugage = Laguage::find($edu_ID);

            $objLanugage->name=$request->name;
            $objLanugage->percen=$request->percen;


            if ($request->hasFile('image')) {
                if ($objLanugage->image && file_exists(public_path("brandLogo/{$objLanugage->image}"))) {
                    unlink(public_path("brandLogo/{$objLanugage->image}"));
                }
                $logo = $request->file('image');
                $fileName = Carbon::now()->format('d-m-y') . '_' . time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('brandLogo/'), $fileName);
                $objLanugage->image = $fileName;
            }
            $objLanugage->save();
            return redirect()->route('language.index')->with('success','Language updated');
        }catch(Exception $exception){
            return redirect()->route('language.create')->with('error',$exception->getMessage());
        }
    }

    public function destroy(Request $request){
        try{
            $objLanugage = Laguage::find($request->lan_ID);
            $objLanugage->delete();
            return redirect()->route('language.index')->with('success','Language Deleted');
        }catch(Exception $exception){
            return redirect()->route('language.index')->with('error',$exception->getMessage());
        }
    }
}
