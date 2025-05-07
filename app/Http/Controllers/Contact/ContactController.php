<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact\Contact;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts=Contact::orderBy('id','desc')->paginate(10);
        return view('admin.contact.index',compact('contacts'));
    }
    public function create(){
        return view('admin.contact.createOrEdit');
    }
    public function store(Request $request){
        
        try{
            $request->validate([
                'label'=>'required',
                'icon'=>'required',
                'value'=>'required',
            ]);
            $objContact = new Contact();
            $objContact->label=$request->label;
            if($request->hasFile('icon')){
                $icon=$request->file('icon');
                $fileName=Carbon::now()->format('d-m-y'). '_'.time().'.'. $icon->getClientOriginalExtension();
                $path=public_path('conactImage/'.$fileName);
                $icon->move(public_path('conactImage/'),$fileName);
                $objContact->icon=$fileName;
            }
            $objContact->value=$request->value;
            $objContact->save();
            return redirect()->route('contact.index')->with('success','Contact created');
        }catch(Exception $exception){
            return redirect()->route('contact.create')->with('error',$exception->getMessage());
        }
    }

    public function edit($con_ID){
        $contactEdit=Contact::find($con_ID);
        return view('admin.contact.createOrEdit',compact('contactEdit'));
    }

    public function update(Request $request ,$con_ID){
        try{
            $request->validate([
                'label'=>'required',
                'icon'=>'required',
                'value'=>'required',
            ]);
            $objContact = Contact::find($con_ID);
            $objContact->label=$request->label;
            if($objContact->icon&& file_exists(public_path(('conactImage/'.$objContact->icon)))){
                unlink(public_path('conactImage/'.$objContact->icon));
            }
           
                $logo=$request->file('icon');
                $fileName=Carbon::now()->format('d-m-y'). '_'.time().'.'. $logo->getClientOriginalExtension();
                $path=public_path('conactImage/'.$fileName);
                $logo->move(public_path('conactImage/'),$fileName);
                $objContact->icon=$fileName;
            $objContact->value=$request->value;
            $objContact->save();
            return redirect()->route('contact.index')->with('success','Contact created');
        }catch(Exception $exception){
            return redirect()->route('contact.create')->with('error',$exception->getMessage());
        }
    }

    public function destroy(Request $request){
        try{
            $objContact=Contact::find($request->con_ID);

            if($objContact->icon&& file_exists(public_path(('conactImage/'.$objContact->icon)))){
                unlink(public_path('conactImage/'.$objContact->icon));
            }
            $objContact->delete();
            return redirect()->route('contact.index')->with('success','Contact Deleted');
        }catch(Exception $exception){
            return redirect()->route('contact.index')->with('error',$exception->getMessage());
        }
    }
}
