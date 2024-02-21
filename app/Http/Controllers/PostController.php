<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Str;

class PostController extends Controller
{

    use SoftDeletes;

    public function index()
    {
        $user = Auth::user();

        $posts = Post::with('user')->where('user_id', $user->id)->paginate(5);

        return view('post.index', compact('posts'));
    }


    public function create(Post $post)
    {
        return view('post.create', compact('post'));
    }

    
    public function store(CreatePostRequest $request, Post $post)
    {
        $user_id = Auth::id();
        $slug = Str::slug($request->title);
        $count = 1;
    
        while (Post::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->title) . '-' . $count;
            $count++;
        }

        $post = Post::create([
            'user_id' => $user_id,
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'publish_date' => $request->publish_date,
            'thumbnail' => $request->thumbnail,
            'slug' => $slug,
        ]);

        $post->addMediaFromRequest('thumbnail')
        ->usingName($post->title)
        ->toMediaCollection('thumbnails');
        

        return redirect()->route('post.index')->with('success', 'Tạo bài viết thành công');
    }

    
    public function show(Post $post)
    {   
        return view('post.show', compact('post'));
    }

    
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        
        $post->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            
        ]);

        return redirect()->route('post.index')->with('success', 'Bài viết đã được cập nhật thành công.');
    }


    
    public function delete(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->back()->with('success', 'Bài viết đã được xoá thành công.');
    }

    public function deleteAll($id)
    {   
        $user = User::findOrFail($id);
        $user->posts()->delete();

        return redirect()->back()->with('success', 'Tất cả bài viết đã được xoá thành công.');
    }
}
