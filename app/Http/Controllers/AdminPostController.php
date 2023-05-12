<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{   
    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();
        return request()->validate([
            'title'=>'required|max:255',
            'thumbnail'=>$post->exists ? ['image'] : ['required', 'image'],
            'slug'=>['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt'=>'required|min:3|max:255',
            'body'=>'required|min:7|max:255',
            'category_id'=>'required|exists:categories,id'
        ]);
          
    }

    public function index()
    {
        return view('admin.posts.index',[
            'posts'=>Post::paginate(50)]);
    }

    public function create()
    {

        return view('admin.posts.create');
    }

    public function store(){
        
        
        $attributes = array_merge($this->validatePost(), [
            'user_id'=>auth()->id(),
            'thumbnail'=>request()->file('thumbnail')->store('thumbnails')
        ]);
        
        Post::create($attributes);

        return redirect('/')->with('success', 'Your Post has been created!');

    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post'=>$post]);
    }
    
    public function update(Post $post)
    {
          $attributes = $this->validatePost($post);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');;
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post Deleted.');
    }
}
