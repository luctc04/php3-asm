<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{

    const PATH_VIEW = 'admin.posts.';
    const PATH_UPLOAD = 'posts';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()->with(['category', 'author', 'tags'])->latest('id')->get();

        // dd($posts->toArray());
        // dd($posts->first()->category->name);


        return view(self::PATH_VIEW . __FUNCTION__, compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->pluck('name', 'id')->all();
        $authors = Author::query()->pluck('name', 'id')->all();
        $tags = Tag::query()->pluck('name', 'id')->all();

        // dd($authors->toArray());

        return view(self::PATH_VIEW . __FUNCTION__, compact('categories', 'authors', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // dd($request->toArray());
        $dataPost = $request->except('tags');
        $dataPost['is_active'] = isset($dataPost['is_active']) ? 1 : 0;
        $dataPost['is_trending'] = isset($dataPost['is_trending']) ? 1 : 0;
        $dataPost['slug'] = Str::slug($dataPost['title']) . '-' . $dataPost['sku'];
        if ($dataPost['img_thumbnail']) {
            $dataPost['img_thumbnail'] = Storage::put(self::PATH_UPLOAD, $dataPost['img_thumbnail']);
        }
        
        $dataPostTags = $request->tags;
        // dd($dataPostTags);
        // dd($request->toArray());

        try {
            DB::beginTransaction();

            /** @var Post $post */
            $post = Post::create($dataPost);
            $post->tags()->sync($dataPostTags);

            DB::commit();

            return redirect()
                ->route('admin.posts.create')
                ->with('success', 'Thêm thành công!');
        } catch (Exception $exception) {
            DB::rollBack();

            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::query()->with(['category', 'author', 'tags'])->where('id', $id)->first();
        // dd($post->toArray());
        return view(self::PATH_VIEW . __FUNCTION__, compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::query()->pluck('name', 'id')->all();
        $authors = Author::query()->pluck('name', 'id')->all();
        $tags = Tag::query()->pluck('name', 'id')->all();

        $post = Post::query()->with(['category', 'author', 'tags'])->where('id', $id)->first();

        // dd($post->category->id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('post', 'categories', 'authors', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $post = Post::query()->with(['category', 'author', 'tags'])->where('id', $id)->first();

        $dataPost = $request->except('tags');
        $dataPost['is_active'] = isset($dataPost['is_active']) ? 1 : 0;
        $dataPost['is_trending'] = isset($dataPost['is_trending']) ? 1 : 0;
        $dataPost['slug'] = Str::slug($dataPost['title']) . '-' . $dataPost['sku'];

        if (!empty($dataPost['img_thumbnail'])) {
            $dataPost['img_thumbnail'] = Storage::put(self::PATH_UPLOAD, $dataPost['img_thumbnail']);
        }

        $dataPostTags = $request->tags;
        // dd($dataPostTags);
        // dd($request->toArray());
        $postImgThumbnailCurrent = $post->img_thumbnail;

        try {
            DB::beginTransaction();

            // $postImgThumbnailCurrent = $post->img_thumbnail; // Lưu lại giá trị hiện tại để xóa

            /** @var Post $post */

            $post->update($dataPost);
            $post->tags()->sync($dataPostTags);

            DB::commit();

            if (($dataPost['img_thumbnail'] != $postImgThumbnailCurrent) && Storage::exists($postImgThumbnailCurrent)) {
                Storage::delete($postImgThumbnailCurrent);
            }

            return redirect()
                ->route('admin.posts.edit')
                ->with('success', 'Sửa thành công!');
        } catch (Exception $exception) {
            DB::rollBack();
            
            return redirect()->route('admin.posts.index')->with('success', 'Sửa thành công!');;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
