<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function home()
    {
        $data = Post::query()->with(['category', 'author', 'tags'])->latest('id')->paginate(4);
        // dd($data->);
        return view('client.home', compact('data'));
    }

    public function post_Detail($id)
    {
        $post = Post::query()->with(['category', 'author', 'tags'])->where('id', $id)->first();
        // dd($post->toArray());
        return view('client.post-detail', compact('post'));
    }

    public function post_Category($id)
    {
        $category = Category::query()->find($id);

        $category2 = Category::query()
            ->join('posts', 'categories.id', '=', 'posts.category_id')
            ->select('categories.id', 'name', DB::raw('count(posts.category_id) as ct_quantity'))
            ->groupBy('categories.id')
            ->get();
        
        // dd($category2->toArray());
        

        $post = Post::query()
            ->with(['category', 'author', 'tags'])
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('*', 'posts.created_at', 'posts.id')
            ->where('categories.id', $id)
            ->paginate(2);
        // dd($category2->toArray());

        return view('client.post-category', compact('category', 'post', 'category2'));
    }

    public function post_Search(Request $request)
    {
        $search = $request->input('search');
        
        // Tìm kiếm sản phẩm theo tên
        $posts = Post::query()
            ->with(['category', 'author', 'tags'])
            ->whereAny(['title', 'excerpt', 'content'], 'like', "%{$search}%")
            ->paginate(4);

        // dd($posts->toArray());
        
        return view('client.post-search', compact('posts'));
    }
}
