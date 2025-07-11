<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller
{
    //
    public function home(){
        if(Auth::check()){
            return redirect()->route('posts.index');
        }

        $posts = Post::orderBy('created_at')->where('status', 'published')->limit(10)->get();
        if(!$posts->count()){
            return view('blog.index');
        }
        $categories = Category::all();
        return view('blog.index', compact('posts', 'categories'));
    }
    public function index(){
        $posts = Post::orderBy('created_at')->where('status' , 'published')->paginate(10);
        return view('blog.index', compact('posts'));
    }
    public function show($slug){
        $post = Post::where('slug', $slug)->where('status', 'published')->first();
        if(!$post) {
            return redirect()->route('blog.index');
        }
        $category = Category::where('id', $post->category_id)->first();
        return view('blog.view', compact('post', 'category'));
    }
    public function postsByCategory($slug){
        $category = Category::where('slug', $slug)->first();
        $posts = Post::where('category_id', $category->id)->where('status', 'published')->orderBy('created_at', 'desc')->paginate(10);
        return view('blog.index', compact('posts'));
    }
    public function postsBySearch(Request $request){
        $validated = $request->validate(['search' => 'required']);
        $search = $validated['search'];
        $posts = Post::where('title', 'like', '%' . $search . '%')->where('status', 'published')->orderBy('created_at', 'desc')->paginate(10);
        return view('blog.index', compact('posts', 'search'));
    }

}
