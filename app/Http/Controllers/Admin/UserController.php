<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    const PATH_VIEW = 'admin.users.';
    const PATH_UPLOAD = 'users';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::query()->latest('id')->get();

        // dd($data->toArray());

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
    public function store(StoreUserRequest $request)
    {
        // dd($request->toArray());
        $data = $request->except('avatar');
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;


        if($request->hasFile('avatar')){
            $data['avatar'] = Storage::put(self::PATH_UPLOAD, $request->file('avatar'));
        }

        User::query()->create($data);

        return redirect()
            ->route('admin.users.create')
            ->with('success', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::query()->findOrFail($id);
        return view(self::PATH_VIEW . __FUNCTION__, compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::query()->findOrFail($id);

        $data = $request->except('avatar');
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;

        if($request->hasFile('avatar')){
            $data['avatar'] = Storage::put(self::PATH_UPLOAD, $request->file('avatar'));
        }

        $currentAvatar = $user->avatar;

        $user->update($data);

        if($request->hasFile('avatar') && $currentAvatar && Storage::exists($currentAvatar)){
            Storage::delete($currentAvatar);
        }

        return back()->with('success', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = User::query()->findOrFail($id);

        $model->delete();

        if($model->avatar && Storage::exists($model->avatar)){
            Storage::delete($model->avatar);
        }

        return back()->with('success', 'Xóa thành công!');
    }
}
