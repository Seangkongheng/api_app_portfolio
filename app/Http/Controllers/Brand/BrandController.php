<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand\Brand;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $brands=Brand::orderBy('id','desc')->paginate(10);
        return view('admin.brands.index',compact('brands'));
    }
    public function create(){
        return view('admin.brands.createOrEdit');
    }
    public function store(Request $request){
        try{
            $request->validate([
                'logo'=>'required',
            ]);
            $objBrand = new Brand();

            if($request->hasFile('logo')){
                $logo=$request->file('logo');
                $fileName=Carbon::now()->format('d-m-y'). '_'.time().'.'. $logo->getClientOriginalExtension();
                $path=public_path('brandLogo/'.$fileName);
                $logo->move(public_path('brandLogo/'),$fileName);
                $objBrand->logo=$fileName;
            }
            $objBrand->save();
            return redirect()->route('brand.index')->with('success','brand created');
        }catch(Exception $exception){
            return redirect()->route('brand.create')->with('error',$exception->getMessage());
        }
    }

    public function edit($brand_id){
        $brandEdit=Brand::find($brand_id);
        return view('admin.brands.createOrEdit',compact('brandEdit'));
    }

    public function update(Request $request ,$brand_id){
        try{
            $request->validate([
                'logo'=>'required',
            ]);
            $objBrand = Brand::find($brand_id);

            if($objBrand->logo&& file_exists(public_path(('brandLogo/'.$objBrand->loglo)))){
                unlink(public_path('brandLogo/'.$objBrand->logo));
            }
           
                $logo=$request->file('logo');
                $fileName=Carbon::now()->format('d-m-y'). '_'.time().'.'. $logo->getClientOriginalExtension();
                $path=public_path('brandLogo/'.$fileName);
                $logo->move(public_path('brandLogo/'),$fileName);
                $objBrand->logo=$fileName;
          
            $objBrand->save();
            return redirect()->route('brand.index')->with('success','brand created');
        }catch(Exception $exception){
            return redirect()->route('user.create')->with('error',$exception->getMessage());
        }
    }

    public function destroy(Request $request){
        try{
            $objBrand=Brand::find($request->brand_id);

            if($objBrand->logo&& file_exists(public_path(('brandLogo/'.$objBrand->loglo)))){
                unlink(public_path('brandLogo/'.$objBrand->logo));
            }
            $objBrand->delete();
            return redirect()->route('brand.index')->with('success','User Deleted');
        }catch(Exception $exception){
            return redirect()->route('brand.index')->with('error',$exception->getMessage());
        }
    }
}
