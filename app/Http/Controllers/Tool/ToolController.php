<?php

namespace App\Http\Controllers\Tool;

use App\Http\Controllers\Controller;
use App\Models\Tool\Tool;
use Exception;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index(){
        $tools=Tool::orderBy('id','desc')->paginate(10);
        return view('admin.tool.index',compact('tools'));
    }
    public function create(){
        return view('admin.tool.createOrEdit');
    }
    public function store(Request $request){
        try{
            $request->validate([
                'title'=>'required',
            ]);
            $objTool = new Tool();
            $objTool->title=$request->title;
            $objTool->save();
            return redirect()->route('tool.index')->with('success','Tool created');
        }catch(Exception $exception){
            return redirect()->route('tool.create')->with('error',$exception->getMessage());
        }
    }

    public function edit($tool_id){
        $toolEdit=Tool::find($tool_id);
        return view('admin.tool.createOrEdit',compact('toolEdit'));
    }

    public function update(Request $request ,$tool_id){
        try{
            $request->validate([
                'title'=>'required',
            ]);
            $objTool = Tool::find($tool_id);
            $objTool->title=$request->title;
            $objTool->save();
            return redirect()->route('tool.index')->with('success','Tool updated');
        }catch(Exception $exception){
            return redirect()->route('tool.create')->with('error',$exception->getMessage());
        }
    }

    public function destroy(Request $request){
        try{
            $objTool = Tool::find($request->tool_id);
            $objTool->delete();
            return redirect()->route('tool.index')->with('success','Tool Deleted');
        }catch(Exception $exception){
            return redirect()->route('tool.index')->with('error',$exception->getMessage());
        }
    }
}
