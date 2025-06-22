<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $Blogs = Blog::select('id', 'title', 'description', 'images', 'is_public')->orderBy('id', 'desc')->get();
        return view('admin.blog.index', compact('Blogs'));
    }
    public function create()
    {
        return view('admin.blog.createOrEdit');
    }


    public function show($id)
    {
        $Blog = Blog::where('id', $id)->first();
        return view('admin.blog.show', compact('Blog'));
    }

    public function store(Request $request)
    {
        try {
            $AuthorName = Auth()->user()->name;
            $request->validate([
                'title' => 'required',
                'description' => 'required',
            ]);

            $is_public = 1;

            $is_public = 1;
            if($request->status === "Public"){
                $is_public=1;
            }elseif($request->status === "Unpublic"){
                $is_public =0;
            }



            $fileNames = [];
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $file) {
                    $currentDate = Carbon::now()->format('d-m-Y');
                    $newFileName = $currentDate . '_' . time() . '-' . $file->getClientOriginalName();
                    $file->move(public_path('blogImages/'), $newFileName);
                    $fileNames[] = $newFileName;
                }
            }
            $objBlog = Blog::create([
                'title' => $request->title,
                'description' => $request->description,
                'is_public' => $is_public,
                'author' => $AuthorName,
                'images' => json_encode($fileNames)
            ]);
            return redirect()->route('blog.index')->with('success', 'Blog created');
        } catch (Exception $e) {
            return redirect()->route('blog.create')->with('error', $e->getMessage());
        }
    }


    public function edit($id)
    {
        $BlogEdit = Blog::where('id', $id)->first();
        return view('admin.blog.createOrEdit', compact('BlogEdit'));
    }
    public function destroy(Request $request)
    {
        try {
            $objBlog = Blog::find($request->blog_id);
            if ($objBlog->iamges && file_exists(public_path(('blogImages/' . $objBlog->images)))) {
                unlink(public_path('blogImages/' . $objBlog->images));
            }
            $objBlog->delete();
            return redirect()->route('blog.index')->with('success', 'User Deleted');
        } catch (Exception $exception) {
            return redirect()->route('blog.index')->with('error', $exception->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
            ]);

            $is_public = 1;
            if($request->status === "Public"){
                $is_public=1;
            }elseif($request->status === "Unpublic"){
                $is_public =0;
            }

            $AuthorName = Auth()->user()->name;
            $BlogEdit = Blog::findOrFail($id);

            $fileNames = json_decode($BlogEdit->images, true) ?? [];
            if ($request->hasFile('image')) {
                // Delete old images from the server
                foreach ($fileNames as $oldImage) {
                    $oldImagePath = public_path('blogImages/' . $oldImage);
                    if (file_exists($oldImagePath)) {
                        @unlink($oldImagePath);
                    }
                }
                $fileNames = [];
                foreach ($request->file('image') as $file) {
                    $currentDate = Carbon::now()->format('d-m-Y');
                    $newFileName = $currentDate . '_' . time() . '-' . $file->getClientOriginalName();
                    $file->move(public_path('blogImages/'), $newFileName);
                    $fileNames[] = $newFileName;
                }
            }

            $BlogEdit->update([
                'title' => $request->title,
                'description' => $request->description,
                'is_public' => $is_public,
                'author' => $AuthorName,
                'images' => json_encode($fileNames)
            ]);

            return redirect()->route('blog.index')->with('success', 'Blog updated');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
