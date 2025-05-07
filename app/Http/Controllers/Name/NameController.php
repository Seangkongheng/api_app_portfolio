<?php

namespace App\Http\Controllers\Name;

use App\Http\Controllers\Controller;
use App\Models\Name\Name;
use Exception;
use Illuminate\Http\Request;

class NameController extends Controller
{
    public function index(){
        $names= Name::orderBy('id','desc')->paginate(10);
        return view('admin.name.index',compact('names'));
    }
    public function create(){
        return view('admin.name.createOrEdit');
    }
    public function store(Request $request){

        
        try{
            $request->validate([
                'name'=>'required',
                'description'=>'required'
            ]);
            $objName = new Name();
            $objName->name=$request->name;
            $objName->description=$request->description;
            $objName->save();
            return redirect()->route('name.index')->with('success','Name created');
        }catch(Exception $exception){
            return redirect()->route('name.create')->with('error',$exception->getMessage());
        }
    }

    public function edit($name_id){
        
        $nameEdit=Name::find($name_id);
        return view('admin.name.createOrEdit',compact('nameEdit'));
    }

    public function update(Request $request ,$name_id){
        try{
            $request->validate([
                'name'=>'required',
                'description'=>'required'
            ]);
            $objName = Name::find($name_id);
            $objName->name=$request->name;
            $objName->description=$request->description;
            $objName->save();
            return redirect()->route('name.index')->with('success','Name updated');
        }catch(Exception $exception){
            return redirect()->route('name.create')->with('error',$exception->getMessage());
        }
 
    }

    public function destroy(Request $request){
        try{
            $objName = Name::find($request->name_id);
            $objName->delete();
            return redirect()->route('name.index')->with('success','Name Deleted');
        }catch(Exception $exception){
            return redirect()->route('name.index')->with('error',$exception->getMessage());
        }
    }
}
