<?php

namespace App\Http\Controllers\Name;

use App\Http\Controllers\Controller;
use App\Models\Name\Name;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class NameController extends Controller
{
    public function index()
    {
        $names = Name::orderBy('id', 'desc')->paginate(10);
        return view('admin.name.index', compact('names'));
    }
    public function create()
    {
        return view('admin.name.createOrEdit');
    }
    public function store(Request $request)
    {


        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required'
            ]);
            $objName = new Name();
            $objName->name = $request->name;
            $objName->description = $request->description;
            $objName->gender = $request->gender;
            $objName->position = $request->position;
            $objName->email = $request->email;
            $objName->dob = $request->dob;
            $objName->phone = $request->phone;
            $objName->current_address = $request->current_address;
            $objName->pob = $request->pob;

            if ($request->hasFile('profile')) {
                $logo = $request->file('profile');
                $fileName = Carbon::now()->format('d-m-y') . '_' . time() . '.' . $logo->getClientOriginalExtension();
                $path = public_path('brandLogo/' . $fileName);
                $logo->move(public_path('brandLogo/'), $fileName);
                $objName->profile = $fileName;
            }

            $objName->save();
            return redirect()->route('name.index')->with('success', 'Name created');
        } catch (Exception $exception) {
            return redirect()->route('name.create')->with('error', $exception->getMessage());
        }
    }

    public function edit($name_id)
    {

        $nameEdit = Name::find($name_id);
        return view('admin.name.createOrEdit', compact('nameEdit'));
    }

    public function update(Request $request, $name_id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required'
            ]);
            $objName = Name::find($name_id);
            $objName->gender = $request->gender;
            $objName->position = $request->position;
            $objName->email = $request->email;
            $objName->dob = $request->dob;
            $objName->phone = $request->phone;
            $objName->current_address = $request->current_address;
            $objName->pob = $request->pob;
            $objName->name = $request->name;
            $objName->description = $request->description;

            if ($request->hasFile('profile')) {
                if ($objName->profile && file_exists(public_path('brandLogo/' . $objName->profile))) {
                    unlink(public_path('brandLogo/' . $objName->profile));
                }
                $logo = $request->file('profile');
                $fileName = Carbon::now()->format('d-m-y') . '_' . time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('brandLogo/'), $fileName);
                $objName->profile = $fileName;
            }


            $objName->save();
            return redirect()->route('name.index')->with('success', 'Name updated');
        } catch (Exception $exception) {
            return redirect()->route('name.create')->with('error', $exception->getMessage());
        }

    }

    public function show($id){
        $profile= Name::find($id);
        return view('admin.name.show',compact('profile'));
    }

    public function destroy(Request $request)
    {
        try {
            $objName = Name::find($request->name_id);

            if($objName->profile&& file_exists(public_path(('brandLogo/'.$objName->loglo)))){
                unlink(public_path('brandLogo/'.$objName->profile));
            }
            $objName->delete();

            return redirect()->route('name.index')->with('success', 'Name Deleted');
        } catch (Exception $exception) {
            return redirect()->route('name.index')->with('error', $exception->getMessage());
        }
    }
}
