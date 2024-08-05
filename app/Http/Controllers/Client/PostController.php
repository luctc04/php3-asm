<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function home()
    {

        // show full bài viết
        $data = Post::query()
            ->with(['category', 'author', 'tags'])
            ->where('is_active', '1')
            ->latest('id')
            ->paginate(5);

        // // 3 bài viết có nhiều lượt xem nhất
        // $view = Post::query()->where('is_active', '1')->orderByDesc('view_count')->limit(3)->get();

        // // 3 bài viết thịnh hành
        // $postTrending = Post::query()->where([['is_active', '1'], ['is_trending', '1']])->orderByDesc('id')->limit(3)->get();

        // // bài viết mới nhất
        // $postNew = Post::query()->with(['category', 'author', 'tags'])->where('is_active', '1')->orderByDesc('id')->first();
        // // dd($postNew->toArray());

        // //  bài viết có nhiều lượt xem nhất
        // $postViewOne = Post::query()->with(['category', 'author', 'tags'])->where('is_active', '1')->orderByDesc('view_count')->first();

        // dd($postViewOne->toArray());
        return view('client.home', compact('data'));
        // return view('client.home', compact('data', 'view', 'postTrending', 'postNew', 'postViewOne'));
    }

    public function post_Detail($slug)
    {
        $post = Post::query()->with(['category', 'author', 'tags'])->where('slug', $slug)->first();
        $post->increment('view_count');
        // dd($post->toArray());
        return view('client.post-detail', compact('post'));
    }

    public function post_Category($slug)
    {
        $category = Category::query()->where('slug', $slug)->first();;
        // dd($category);   

        // lấy ra tổng số bài viết theo danh mục
        $category2 = Category::query()
            ->join('posts', 'categories.id', '=', 'posts.category_id')
            ->select('categories.id', 'name', 'categories.slug', DB::raw('count(posts.category_id) as ct_quantity'))
            ->where('categories.is_active', '1')
            ->groupBy('categories.id')
            ->get();

        // dd($category2->toArray());

        //  lấy ra tất cả bài viết theo danh mục
        $post = Post::query()
            ->with(['category', 'author', 'tags'])
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('*', 'posts.created_at', 'posts.id', 'posts.slug')
            ->orderByDesc('posts.id')
            ->where([
                ['categories.slug', $slug],
                ['posts.is_active', '1']
            ])->paginate(4);

        // lấy ra tất cả tags
        $tags = Tag::get();

        // dd($tag->toArray());

        return view('client.post-category', compact('category', 'post', 'category2', 'tags'));
    }

    public function post_Search(Request $request)
    {
        $search = $request->input('search');

        // Tìm kiếm sản phẩm theo tên
        $posts = Post::query()
            ->with(['category', 'author', 'tags'])
            ->whereAny(['title', 'excerpt', 'content'], 'like', "%{$search}%")
            ->where('is_active', '1')
            ->paginate(4);

        // dd($posts->toArray());

        return view('client.post-search', compact('posts'));
    }


    public function post_Tag($id)
    {
        // lấy ra tất cả bài viết theo tag
        $tag = Tag::query()->findOrFail($id);

        $posts = $tag->posts()->paginate(4);

        // lấy ra tổng số bài viết theo danh mục
        $category2 = Category::query()
            ->join('posts', 'categories.id', '=', 'posts.category_id')
            ->select('categories.id', 'name', 'categories.slug', DB::raw('count(posts.category_id) as ct_quantity'))
            ->where('categories.is_active', '1')
            ->groupBy('categories.id')
            ->get();

        // lấy ra tất cả tags
        $tags = Tag::get();
        // dd($posts->toArray());

        return view('client.post-tag', compact('tag', 'category2', 'tags', 'posts'));
    }
}
