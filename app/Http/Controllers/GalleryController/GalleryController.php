<?php

namespace App\Http\Controllers\GalleryController;

use App\Http\Controllers\Controller;
use App\Models\Gallery\Gallery;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function index(){
        $galleries=Gallery::orderBy('id','desc')->paginate(10);
        return view('admin.gallery.index',compact('galleries'));
    }

    public function create()
    {
        //
        return view("admin.gallery.createOrEdit");
    }

  
    public function store(Request $request)
    {

       try{
            $request->validate([
                'name'=>'required',
                'image*'=>'required'
            ]);
            $fileNames  = [];
            
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $file) {
                    $currentDate = Carbon::now()->format('d-m-Y');
                    $newFileName = $currentDate.'_'. time() . '-' . $file->getClientOriginalName();
                    $file->move(public_path('GalleryImage/'), $newFileName);
                    $fileNames [] = $newFileName;
                }
            }
            $objGallery =Gallery::create([
                'name'=>$request->name,
                'image' => json_encode($fileNames)
            ]);
            return redirect()->route('gallery.index')->with('message','Photo created');
       }catch(Exception $e){
            return redirect()->route('gallery.create')->with('error',$e->getMessage());
       }
    }

   
    public function show(string $id)
    {
        //
    }

  
    public function edit(string $gallery_ID)
    {
        $objGalleriesEdit=Gallery::find($gallery_ID);
        return view("admin.gallery.createOrEdit",compact('objGalleriesEdit'));
    }

 
    public function update(Request $request, string $album_ID)
    {
        $request->validate([
            'name'=>'required',
            'image*'=>'required'
        ]);

  
        // album image update
        $objAlbumImage=Gallery::where('album_id',$album_ID)->first();

        $oldImages = json_decode($objAlbumImage->image_file_name, true) ?? [];
        $image = [];
        if ($request->hasFile('image_file_name')) {
            // Upload new images
            foreach ($request->file('image_file_name') as $file) {
                $currentDate = Carbon::now()->format('d-m-Y');
                $newImageName = $currentDate.'_'. time() . '-' . $file->getClientOriginalName();
                $file->move(public_path('photoPost'), $newImageName);
                $image[] = $newImageName;
            }


        }
        $image =array_merge($image, $oldImages);
        $objAlbumImage->image_file_name = json_encode($image);
        $objAlbumImage->save();

        return redirect()->route('photo.index')->with('message','Attachment updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $objAlbums = Gallery::find($request->album_id);

        if ($objAlbums) {
                // Delete post details
               
                // Delete associated images
                $objAlbumImages = Gallery::where('album_id', $request->album_id)->get();
                foreach ($objAlbumImages as $item) {
                    $imageArray = json_decode($item->image_file_name, true);
                    if (is_array($imageArray)) {
                        foreach ($imageArray as $imageName) {
                            $detailImagePath = public_path('photoPost') . '/' . $imageName;
                            if (File::exists($detailImagePath)) {
                                File::delete($detailImagePath);
                            }
                        }
                    }
                    $item->delete();
                }

                // Delete the main album
                $objAlbums->delete();

                return redirect()->route('photo.index')->with('message', 'Photo deleted');
            } else {
                return redirect()->route('photo.index')->with('error', 'Photo not found');
            }
        } catch (Exception $e) {
            return redirect()->route('photo.index')->with('error', $e->getMessage());
        }
    }



    public function photoDelete(Request $request)
    {
        // Validate request data
        $request->validate([
            'imageName' => 'required|string',
            'imagePostId' => 'required|integer'
        ]);

        $imageName = $request->input('imageName');
        $imagePostId = $request->input('imagePostId');

        // Retrieve the Album_images model
        $albumImage = Gallery::find($imagePostId);

        if (!$albumImage) {
            return response()->json(['error' => 'Album image not found.'], 404);
        }

        // Get the current images from the album
        $images = json_decode($albumImage->image_file_name);

        // Remove the image
        $images = array_filter($images, function($img) use ($imageName) {
            return $img !== $imageName;
        });

        // Update the album record with the remaining images
        $albumImage->image_file_name = json_encode(array_values($images));
        $albumImage->save();

        // Delete the image file from the server
        $imagePath = public_path('photoPost/' . $imageName);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        return response()->json(['success' => 'Image deleted successfully.']);
    }

}

