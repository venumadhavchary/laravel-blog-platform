<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag; 


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //descending order and set pagination
        //where users
        $user_id = Auth::id();
        $posts = Post::where('user_id' , $user_id)->orderBy('created_at', 'desc')->paginate(5);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required|string',
            'slug' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published',
            'category_id' => 'required',
            'tags' => 'nullable|array',
        'tags.*' => 'exists:tags,id'
    ]);
     
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('assets/images'), $imageName);
        $validated['image'] = 'assets/images/' . $imageName;
    }
     
    $validated['user_id'] =  Auth::id();
     
    $tags = collect($validated)->pull('tags', []);
     
    $post = Post::create($validated);
      
    $post->tags()->attach($tags);
            
        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
        return view('posts.view', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required|string',
            'slug' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:draft,published',
            'category_id' => 'required',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id'
        ]);
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image && file_exists(public_path('storage/' . $post->image))) {
                unlink(public_path('storage/' . $post->image));
            }
            
            // Store new image
            $imagePath = $request->file('image')->store('posts', 'public');
            $validated['image'] = $imagePath;
        }
        $post->update($validated);
        $post->tags()->sync($request->input('tags', []));
        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
