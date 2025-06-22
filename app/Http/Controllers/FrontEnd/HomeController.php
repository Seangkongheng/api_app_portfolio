<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\About\About;
use App\Models\Blog\Blog;
use App\Models\Contact\Contact;
use App\Models\Cv\Cv;
use App\Models\Education\Education;
use App\Models\Experience\Experience;
use App\Models\Favorite\Favorite;
use App\Models\Language\Laguage;
use App\Models\Name\Name;
use App\Models\Project\Category;
use App\Models\Project\Project;
use App\Models\Skill\Skill;
use App\Models\Tool\Tool;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $names = Name::all();
        $experiences = Experience::all();
        $educations = Education::all();
        $blogs = Blog::where('is_public', 1)
            ->orderBy('id', 'desc')
            ->limit(3)
            ->get()
            ->map(function ($blog) {
                $images = json_decode($blog->images, true);
                $blog->image_url = !empty($images) ? asset('blogImages/' . $images[0]) : null;
                return $blog;
            });
        return response()->json([
            'names' => $names,
            'experiences' => $experiences,
            'educations' => $educations,
            'blog' => $blogs
        ]);
    }

    public function blogs()
    {
        $blogs = Blog::where('is_public', 1)
            ->orderBy('id', 'desc')
            ->get()
            ->map(function ($blog) {
                $images = json_decode($blog->images, true);
                $blog->image_url = !empty($images) ? asset('blogImages/' . $images[0]) : null;
                return $blog;
            });
        return response()->json([
            'blog' => $blogs
        ]);
    }

    public function show($id)
    {
        $blog = Blog::where('id', $id)->first();

        if ($blog) {
            Blog::where('id', $id)->increment('view', 1);
        }

        if ($blog) {
            $images = json_decode($blog->images, true);
            $blog->image_url = !empty($images) ? asset('blogImages/' . $images[0]) : null;
            $blog->image_urls = !empty($images) ? array_map(function ($img) {
                return asset('blogImages/' . $img);
            }, array_slice($images, 1)) : [];

            $currentBlog = Blog::findOrFail($id);

            $relatedBlogs = Blog::where('is_public', 1)
                ->where('id', '!=', $id)
                ->where(function ($query) use ($currentBlog) {
                    $query->where('title', 'LIKE', '%' . $currentBlog->title . '%')
                        ->orWhere('description', 'LIKE', '%' . $currentBlog->title . '%');
                })
                ->orderBy('id', 'desc')
                ->get()
                ->map(function ($related) {
                    $images = json_decode($related->images, true);
                    $related->image_url = !empty($images) ? asset('blogImages/' . $images[0]) : null;
                    return $related;
                });
        } else {
            $relatedBlogs = [];
        }

        return response()->json([
            'blog' => $blog,
            'related_blogs' => $relatedBlogs
        ]);
    }
}
