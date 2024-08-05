<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    const PATH_VIEW = 'admin.categories.';
    const PATH_UPLOAD = 'categories';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::query()->latest('id')->get();

        // dd($data);

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        // $data = $request->except('slug');

        // dd($request->toArray());

        
        $data = $request->all();

        $data['slug'] = Str::slug($data['name']) ;
        $data['is_active'] ??= 0;

        // dd($request->toArray());

        Category::query()->create($data);

        return redirect()
            ->route('admin.categories.create')
            ->with('success', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {

        $category = Category::query()->findOrFail($id);

        $data = $request->all();

        $data['slug'] = Str::slug($data['name']) ;
        $data['is_active'] ??= 0;

        $category->update($data);

        return back()->with('success', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $category = Category::find($id);
        $category = Category::query()->findOrFail($id);
        
        $category->delete();

        return back();
    }
}
