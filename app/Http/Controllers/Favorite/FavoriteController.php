<?php

namespace App\Http\Controllers\Favorite;

use App\Http\Controllers\Controller;
use App\Models\Favorite\Favorite;
use Exception;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
  
    public function index(){
        $favorits=Favorite::orderBy('id','desc')->paginate(10);
        return view('admin.favorite.index',compact('favorits'));
    }
    public function create(){
        return view('admin.favorite.createOrEdit');
    }
    public function store(Request $request){
        try{
            $request->validate([
                'title'=>'required',
            ]);
            $objFavorite = new Favorite();
            $objFavorite->title=$request->title;
            $objFavorite->save();
            return redirect()->route('favorite.index')->with('success','Favorite created');
        }catch(Exception $exception){
            return redirect()->route('favorite.create')->with('error',$exception->getMessage());
        }
    }

    public function edit($tool_id){
        $favoritEdit=Favorite::find($tool_id);
        return view('admin.favorite.createOrEdit',compact('favoritEdit'));
    }

    public function update(Request $request ,$tool_id){
        try{
            $request->validate([
                'title'=>'required',
            ]);
            $objFavorite = Favorite::find($tool_id);
            $objFavorite->title=$request->title;
            $objFavorite->save();
            return redirect()->route('favorite.index')->with('success','Favorite updated');
        }catch(Exception $exception){
            return redirect()->route('favorite.create')->with('error',$exception->getMessage());
        }
    }

    public function destroy(Request $request){
        try{
            $objFavorite = Favorite::find($request->favorite_id);
            $objFavorite->delete();
            return redirect()->route('favorite.index')->with('success','Favorite Deleted');
        }catch(Exception $exception){
            return redirect()->route('favorite.index')->with('error',$exception->getMessage());
        }
    }
}
