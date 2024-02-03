<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Helper\FlashHelper;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{

    use SoftDeletes;

    public function index()
    {

    $user = Auth::user();

    $posts = Post::with('user')->where('user_id', $user->id)->get();

    return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required',
        ]);
    
        // Lưu trữ nội dung được nhập từ CKEditor
        $post = new Post;
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('post.index')->with('success', 'Bài viết đã được tạo thành công.');
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
